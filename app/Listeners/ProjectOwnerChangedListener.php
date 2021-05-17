<?php

namespace App\Listeners;

use App\Events\ProjectOwnerChangedEvent;
use App\Notifications\ProjectOwnerChangedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class ProjectOwnerChangedListener
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
    public function handle(ProjectOwnerChangedEvent $event)
    {
        Notification::send($event->users, new ProjectOwnerChangedNotification($event->project));
    }
}
