<?php

namespace App\Listeners;

use App\Models\User;
use App\Notifications\NotifyProjectManagersOfProjectCreatedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class ProjectCreatedListener
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
    public function handle($event)
    {
        $projectManagers = User::projectManager()->get();

        Notification::send($projectManagers, new NotifyProjectManagersOfProjectCreatedNotification($event->project));
    }
}
