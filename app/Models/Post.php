<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // public function user()
    // {
    //     return $this->belongsTo('App\User');
    // }
    public function user()
    {
        return $this->hasOne('App\User','id','user_id');
    }
}
