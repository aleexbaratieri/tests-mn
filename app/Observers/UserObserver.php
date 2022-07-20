<?php

namespace App\Observers;

use App\Models\User;
use Illuminate\Support\Str;

class UserObserver
{

    public function creating(User $user)
    {
        if(!$user->password) {
            $user->password = Str::random(12);
        }
        
        $user->password = bcrypt($user->password);
    }
}
