<?php

namespace App\Http\Controllers\Shop\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Models\Shop;
use Auth;

class RegisterController extends Controller
{

    use RegistersUsers;

    protected $redirectTo = 'home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    //新規登録ページ（追記)
    public function showRegistrationForm()
    {
        return view('shops/auth/register');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        return Shop::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    //追記（ガードの名前はここでつける)
    protected function guard()
    {
        return Auth::guard('shop');
    }
}
