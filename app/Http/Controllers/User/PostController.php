<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Jobs\TestJob;

use App\Models\Post;
use Auth;

class PostController extends Controller
{
    public function list()
    {
        // $posts = Post::join('users as u','u.id','=','posts.user_id')
        //         ->where('user_id',Auth::id())
        //         ->get();
        $posts = Post::all();
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
        $user_id = Auth::id();
        TestJob::dispatch($title,$content,$user_id);
        //こんな風に配列で渡す書き方もできる,Jobの方の受け方も変わる。わかりやすい方で。
        // TestJob::dispatch(array('title'=>$title,'content'=>$content,'user_id'=>$user_id));

        return redirect()->route('post.list');
    }
}
