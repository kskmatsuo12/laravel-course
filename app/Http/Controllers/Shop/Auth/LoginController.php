<?php

namespace App\Http\Controllers\Shop\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    //ログイン後ここに飛ぶ
    protected $redirectTo = '/shop/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //ログインフォームのviews
    public function showLoginForm()
    {
        return view('shops/auth/login');
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/shop/register');
    }

    //持たせるガードの名前
    protected function guard()
    {
        return Auth::guard('shop');
    }
}
