<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;

class AuthController extends Controller
{
    public function login()
    {
        $http = new \GuzzleHttp\Client([
            //localhostない動かない
            'base_uri' => config('app.url')
            ]);
            
            $response = $http->request('POST',config('services.passport.login_endpoint'), [
                // $response = $http->request('POST','/○auth/login', [
                    'form_params' => [
                        'grant_type' => 'password',
                        'client_id' => '2',
                        'client_secret' => config('services.passport.client_secret'),
                        'username' => 'user0@test.com',
                        'password' => 1,
                    ],
            ]);

        return json_decode((string) $response->getBody(), true);

    }
}
