<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;
use Auth;

class PostController extends Controller
{
    public function list()
    {
        // $posts = Post::join('users as u','u.id','=','posts.user_id')
        //         ->get();
        // $posts = Post::leftJoin('users as u','u.id','=','posts.user_id')
        //         ->get();
        // $posts = Post::rightJoin('users as u','u.id','=','posts.user_id')
        //         ->get();

        //ユーザーに紐づくpostsが全部取れました。
        //これはUserモデルにpostsっていう関数を定義してる
        // $posts = Auth::user()->posts;
        $posts = Post::get();

        //ポストに紐づくuser情報
        //Postモデルにuserっていう関数を書いてる
        $user = Post::find(5)->user;

        //ユーザーに紐づくdetail情報
        //Userモデルに書いてる
        $user_detail = Auth::user()->detail;
        // dd($user);
        return view('user/posts/list',[ 'posts' => $posts ]);
    } 

    public function create()
    {
        return view('user/posts/create');
    }

    public function store(Request $request)
    {
        //新しいもの作るnew
        if(Auth::user()->can('create-user')){
            $post = new Post;
            $post->title = $request->title;
            $post->content = $request->content;
            $post->user_id = Auth::id();
            $post->save();
            return view('user/posts/create');
        } else {
            dd('dekinai');
        }
    }
}
