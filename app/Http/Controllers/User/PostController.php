<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;

class PostController extends Controller
{
    public function list()
    {
        $posts = Post::all();
        return view('user/posts/list',[ 'posts' => $posts ]);
    } 
}
