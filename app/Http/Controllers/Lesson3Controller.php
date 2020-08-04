<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Image;

use Storage;
use Validator;

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

    public function image()
    {
        return view('image');
    }

    public function imagePost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|max:5000' //動画の容量を決める->5MB
        ]);
        //バリデーション:エラー
        if ($validator->fails()) {
            return redirect()->back()
            ->withInput()
            ->withErrors($validator);
        }
 
        $image = $request->file('image');

        $img = Image::make($image);
         
        
        $img->blur(80);
        $save_path = storage_path('app/test/test.jpg');
        $img->save($save_path);     
        dd($img);



        $disk = Storage::disk('local');
        // [Tips]設定をすれば下記に書き換えるだけでS3に保存できる
        // $disk = Storage::disk('s3');
 
        //putはオリジナルの文字列で保存してくれる。
        //(第一引数：保存場所、第二引数：画像ファイル)
        $path = $disk->put('public' ,$image);
        
        //putAsは自分で名前を決められる
        //（第一引数：保存場所、第二引数：画像ファイル、第三引数：ファイル名）
        $path = $disk->putFileAs('public',$image,'なんでも.png');
        dd($path);
        //この$pathをDBに保存してそれを呼び出す。       
    }
 


}
