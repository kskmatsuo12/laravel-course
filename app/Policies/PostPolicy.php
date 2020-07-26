<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;
    public function __construct()
    {
        
    }

    public function create(User $user)
    {
        return $user->role === 1;
    }
}
