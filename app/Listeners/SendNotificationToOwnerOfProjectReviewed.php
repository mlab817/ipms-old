<?php

namespace App\Listeners;

use App\Events\ProjectReviewedEvent;
use App\Notifications\NotifyOwnerOfProjectReviewed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendNotificationToOwnerOfProjectReviewed
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
     * @param object $event
     * @return void
     */
    public function handle(ProjectReviewedEvent $event)
    {
        $user = $event->project->creator;

        $user->notify(new NotifyOwnerOfProjectReviewed($event->project));
    }
}
