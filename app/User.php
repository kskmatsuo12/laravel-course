<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    //ユーザー詳細とのリレーション
    public function detail()
    {
        return $this->hasOne('App\Models\UserDetail');
    }

    //多対多
    public function teams()
    {
        return $this->belongsToMany('App\Models\Team');
    }

    //１対多
    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }


}
