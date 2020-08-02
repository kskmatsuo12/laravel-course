<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\User;
use App\Models\PostLike;

use Storage;
use Image;
use Validator;
use Log;
use Auth;

class Lesson3Controller extends Controller
{
    public function users()
    {
        // $users = User::with(['detail','teams'])->get();

        $users = User::with('teams')->join('user_details as d','d.user_id','=','users.id')
                // ->leftJoin('team_user as tu','tu.user_id','=','users.id')
                // ->leftJoin('teams as t','t.id','=','tu.team_id')
                // ->select('users.id as id','users.name as name','d.address','d.phone')
                // ->groupBy('users.id')
                // ->having(DB::raw('count(users.id),>,0'))
                ->get();
            

        return view('users',['users'=>$users]);
    }

    public function userDetail($id)
    {
        //プライマリーキーでの検索
        //ネストしたリレーション（つまり、リレーション先でリレーションってこと）
        // $user = User::with(['posts','posts.user'])->find($id);
        // $user = User::where('id',$id)->first();
        // $user = User::where('id',$id)->get()[0];


        $user = User::join('posts as p','p.user_id','=','users.id')
                ->select('name','title','users.id as id')
                ->find($id);
        return view('user_detail',['user'=>$user]);
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
    }



    public function image()
    {
        return view('image');
    }

    public function imagePost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|max:5' //動画の容量
        ]);

        //バリデーション:エラー
        if ($validator->fails()) {
            return redirect()->back()
            ->withInput()
            ->withErrors($validator);
        }

        $image = $request->file('image');
        $disk = Storage::disk('local');
        // [Tips]設定をすれば下記に書き換えるだけでS3に保存できる
        // $disk = Storage::disk('s3');

        //putはオリジナルの文字列で保存してくれる。
        //(第一引数：保存場所、第二引数：画像ファイル)
        // $path = $disk->put('test' ,$image);
        
        //putAsは自分で名前を決められる
        //（第一引数：保存場所、第二引数：画像ファイル、第三引数：ファイル名）
        // $path = $disk->putFileAs('test',$image,'なんでも.png');
        //この$pathをDBに保存してそれを呼び出す。

        //ぼかし
        // $img = Image::make($image);  
        // $img->blur(80);
        // $save_path = storage_path('app/test/test.jpg');
        // $img->save($save_path); 
        // dd($img);
        

        //トリミング
        $img = Image::make($image);  
        $save_path = storage_path('app/test/test.jpg');
        //横幅
        $width = 500;
        //縦幅
        $height = 500;
        //左からの座標
        $x = 0;
        //上からの座標
        $y = 0;
        $img->crop($width,$height,$x,$y);
        $img->save($save_path);  
        dd($img);
    }
}
