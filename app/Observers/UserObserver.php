<?php

namespace App\Observers;

use App\Models\User;

class UserObserver
{
    /**
     * Triggered when creating a user to add avatar to their User model
     *
     * @param User $user
     */
    public function creating(User $user)
    {
        // if no avatar is set
        if (! $user->avatar) {
            $user->avatar = 'https://robohash.org/' . md5($user->email) . '?set=set5';
        }
    }

    public function updating(User $user)
    {
        // if no avatar is set
        if (! $user->avatar) {
            $user->avatar = 'https://robohash.org/' . md5($user->email) . '?set=set5';
        }
    }
}
