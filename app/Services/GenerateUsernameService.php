<?php

namespace App\Services;

use App\Models\User;

class GenerateUsernameService
{
    public static function generateUsername()
    {
        $users = User::all();

        foreach ($users as $user) {
            $user->username = generate_username($user->email);
            $user->save();
        }
    }
}
