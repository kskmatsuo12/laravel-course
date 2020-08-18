<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;
use Auth;

use App\Jobs\TestJob;

class PostController extends Controller
{
    public function list()
    {
        $posts = Post::join('users as u','u.id','=','posts.user_id')
                ->where('user_id',Auth::id())
                ->get();

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
        // $post = new Post;
        // $post->title = $request->title;
        // $post->content = $request->content;
        // $post->save();
        $title = $request->title;
        $content = $request->content;
        $uid = Auth::id();

        TestJob::dispatch($title,$content,$uid);
        //TestJob::dispatch(array('title'=>$title,'content'=>$content,'user_id'=>$user_id));
        return view('user/posts/create');
    }
}
