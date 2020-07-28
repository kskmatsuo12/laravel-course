<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;

class PostController extends Controller
{
    public function list()
    {
        $posts = Post::join('users as u','u.id','=','posts.user_id')
                ->where('user_id',Auth::id())
                ->first();
                
        // $posts = Post::all();
        return view('user/posts/list',[ 'posts' => $posts ]);
    } 

    public function create()
    {
        return view('user/posts/create');
    }

    public function store(Request $request)
    {
        //新しいもの作るnew
        $post = new Post;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();
        return view('user/posts/create');
    }
}
