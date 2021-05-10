<?php

namespace App\Listeners;

use App\Events\ProjectReviewedEvent;
use App\Notifications\ProjectReviewedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ProjectReviewedListener
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
     * @param ProjectReviewedEvent $event
     * @return void
     */
    public function handle(ProjectReviewedEvent $event)
    {
        // get review from event
        $review = $event->review;

        // get user to notify
        $user = $review->project->creator;

        // send notification
        $user->notify(new ProjectReviewedNotification($review));
    }
}
