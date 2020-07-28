<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();



        Gate::define('normal-user',function($user){
            return $user->role == 1;
        });
 
        Gate::define('update-post',function($user,$post){
            // ポストしたユーザーしかupdateできない
            return $user->id === $post->user_id;
        });


        //ポリシーに書いた
        Gate::define('create-user','App\Policies\PostPolicy@create');

    }
}
