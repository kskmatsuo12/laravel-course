<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Log;
use Auth;
use App\Models\PostLike;

class Lesson3Controller extends Controller
{


    public function users()
    {
        // $users = User::with('detail','teams')->get();

        $users = User::with('teams')->join('user_details as d','d.user_id','=','users.id')
                ->select('users.id as id')->get();

        return view('users', ['users'=>$users] );
    }


    public function userDetail($id)
    {
        $user = User::with(['posts','posts.user'])->find($id);
        return view('user_detail', ['user'=>$user]);
    }

    public function like(Request $request)
    {   
        $id = $request->id;
        
        $like = new PostLike;
        $like->post_id = $id;
        $like->user_id = Auth::id();
        $like->save();
 
        Log::info($id);
        //ddで見れない
        //どうやってデバッグするか問題
        //responseというkeyで返している。
        return response()->json(['response' => true],200);
        //ddで見れない
        //どうやってデバッグするか問題
        //responseというkeyで返している。
        // return response()->json(['response' => $id],200);
    }


}
