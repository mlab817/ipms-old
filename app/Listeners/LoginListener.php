<?php

namespace App\Listeners;

use App\Events\AuthenticatedEvent;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LoginListener
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
     * @param AuthenticatedEvent $event
     * @return void
     */
    public function handle(AuthenticatedEvent $event)
    {
        $user = User::find($event->userId);

        $user->logins()->create([
            'ip'        => $event->ip,
            'location'  => json_encode($event->location),
        ]);
    }
}
