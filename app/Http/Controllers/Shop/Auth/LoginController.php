<?php

namespace App\Http\Controllers\Shop\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

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

    //持たせるガードの名前
    protected function guard()
    {
        return Auth::guard('shop');
    }

    protected function loggedOut(Request $request)
    {
        //
    }

}
