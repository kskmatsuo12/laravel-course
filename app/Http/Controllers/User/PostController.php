<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

use App\Models\Post;

class PostController extends Controller
{
    public function list()
    {
        $posts = Post::all();
        return view('user/posts/create',[ 'posts' => $posts ]);
    }

    public function store(Request $request)
    {
        $post = new Post;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = Auth::id();
        $post->save();
        return redirect()->route('post.list');
    } 
}
