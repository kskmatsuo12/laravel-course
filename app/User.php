<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

//作成したメール関数用のファイルを追記
use App\Notifications\CustomVerify;

//API認証
use Laravel\Passport\HasApiTokens;

// class User extends Authenticatable 
class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role','status','provider','provider_id'
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

    // public function sendEmailVerificationNotification()
    // {
    //     $this->notify(new VerifyEmail);
    // }

    public function sendCustomMail($user)
    {
        $this->notify(new CustomVerify($user));
    }

}
