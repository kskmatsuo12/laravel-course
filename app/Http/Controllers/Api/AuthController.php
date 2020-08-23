<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Hash;
use App\User;
use GuzzleHttp\Client;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'email|required',
            'password' => 'required|confirmed'
        ]);

        $validatedData['password'] = Hash::make($request->password);

        $user = User::create($validatedData);

        $http = new \GuzzleHttp\Client([
            'base_uri' => config('app.url')
        ]);

         try {
            $response = $http->request('POST',config('services.passport.login_endpoint'), [
                'form_params' => [
                    'grant_type' => 'password',
                    'client_id' => config('services.passport.client_id'),
                    'client_secret' => config('services.passport.client_secret'),
                    'username' => $request->email,
                    'password' => $request->password,
                ],
            ]);
            return json_decode((string) $response->getBody(), true);
        } catch(\GuzzleHttp\Exception\BadResponseException $e) {
            if($e->getCode() == 400){
                return response()->json('メールとパスワードを入力してください',$e->getCode());
            } else if($e->getCode()==401){
                return response()->json('認証キーが正しくありません。もう一度試してください。',$e->getCode());
            }
            
            return response()->json('サーバーエラー',$e->getCode());

        }
    }
 
    public function login(Request $request){
        $http = new \GuzzleHttp\Client([
            'base_uri' => config('app.url')
        ]);
         try {
            $response = $http->request('POST',config('services.passport.login_endpoint'), [
                'form_params' => [
                    'grant_type' => 'password',
                    'client_id' => config('services.passport.client_id'),
                    'client_secret' => config('services.passport.client_secret'),
                    'username' => $request->username,
                    'password' => $request->password,
                ],
            ]);
            return json_decode((string) $response->getBody(), true);
        } catch(\GuzzleHttp\Exception\BadResponseException $e) {
            if($e->getCode() == 400){
                return response()->json('メールとパスワードを入力してください',$e->getCode());
            } else if($e->getCode()==401){
                return response()->json('認証キーが正しくありません。もう一度試してください。',$e->getCode());
            }
            
            return response()->json('サーバーエラー',$e->getCode());
        }   
    }

    public function logout()
    {
        auth()->user()->tokens->each(function($token, $key){
            $token->delete();
        });

        return response()->json('ログアウトしました');
    }

    public function test()
    {
        return response('test');
    }
}
