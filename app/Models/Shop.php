<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

// class Shop extends Model
class Shop extends Authenticatable
{
    protected $fillable = [
        'name', 'email', 'password',
    ];
}
