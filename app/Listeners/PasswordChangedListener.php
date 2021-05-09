<?php

namespace App\Listeners;

use App\Events\PasswordChangedEvent;
use App\Notifications\PasswordChangedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PasswordChangedListener
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
    public function handle(PasswordChangedEvent $event)
    {
        $user = $event->user;

        $user->notify(new PasswordChangedNotification($user));
    }
}
