<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

//ここと
use Illuminate\Foundation\Auth\User as Authenticatable;

//ここ書き換えた
class Shop extends Authenticatable
{
    protected $fillable = [
        'name', 'email', 'password',
    ];
}
