<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\User;
use App\Models\UserDetail;
use Auth;

use Socialite;

class LoginController extends Controller
{


    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider($provider)
    {
        // dd($provider);
        return Socialite::driver($provider)->redirect();
    }

     public function handleProviderCallback($provider)
    {
        try {
            $providerUser = Socialite::with($provider)->user();
        } catch (\Exception $e) {
            return redirect('/login')->with('auth_error','一致するメールアドレスを取得できませんでした');
        }
        
        //もしメールアドレスがあれば
        $query = User::query();
        if($provider_email = $providerUser->getEmail()){
            $user = $query->where('email','=',$provider_email)->first();
            if(empty($user) && $provider_id = $providerUser->getId()){
                $user = $query->where('provider','=',$provider)->where('provider_id','=',$provider_id)->first();
                if(!empty($user)){
                    $user->email = $provider_email;
                }
            } 
        } else {
            if($provider_id = $providerUser->getId()){
                $user = $query->where('provider','=',$provider)->where('provider_id','=',$provider_id)->first();
            } 
        
        }

        if(!empty($user)){
                //過去に保存があれば普通にログインする
                \Slack::send('ユーザーがログインしました');

                Auth::login($user,true);
                return redirect()->route('home');

        } else {
                $data = [
                        'name' => $providerUser->getName(),
                        'email' => $providerUser->getEmail(),    
                        'sns_email' => $providerUser->getEmail(),
                        'email_verified_at' => now(),
                        'provider' => $provider,
                        'provider_id' => $provider_id,
                        'status' => 1,
                        'role' => 1
                    ];
                $user = User::create($data);
                
                $user_detail = new UserDetail;
                $user_detail->user_id = $user->id;
                $user_detail->save();
                
                Auth::login($user,true);
        }
        \Slack::send('Hello World!');
        return redirect()->route('home'); //★★認証後に表示したいページを指定★★
    
    }   
}
