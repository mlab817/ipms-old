<?php

namespace App\Listeners;

use App\Models\User;
use App\Notifications\LockedOutNotification;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Password;

class LockedOutListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(Lockout $event)
    {
        $user = User::where('email', $event->request->email)->first();

        // generate password reset link token
        $token = Password::getRepository()->create($user);

        if ($user) {
            $user->notify(new LockedOutNotification($token));
        }
    }
}
