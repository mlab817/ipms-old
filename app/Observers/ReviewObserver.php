<?php

namespace App\Observers;

use App\Models\Review;

class ReviewObserver
{
    public function creating(Review $review)
    {
        $review->user()->associate(auth()->user());
    }

    /**
     * Handle the Review "created" event.
     *
     * @param  \App\Models\Review  $review
     * @return void
     */
    public function created(Review $review)
    {
        // refer to project instead of review
        activity()
            ->causedBy(auth()->user())
            ->performedOn($review->project)
            ->log('Created review for project #' . $review->project->id);
    }

    public function updating(Review $review)
    {
        if (is_null($review->user_id)) {
            $review->user_id = auth()->id();
        }
    }

    /**
     * Handle the Review "updated" event.
     *
     * @param  \App\Models\Review  $review
     * @return void
     */
    public function updated(Review $review)
    {
        activity()
            ->causedBy(auth()->user())
            ->performedOn($review->project)
            ->log('Updated review for project #' . $review->project->id);
    }

    /**
     * Handle the Review "deleted" event.
     *
     * @param  \App\Models\Review  $review
     * @return void
     */
    public function deleted(Review $review)
    {
        activity()
            ->causedBy(auth()->user())
            ->performedOn($review->project)
            ->log('Deleted review for project #' . $review->project->id);
    }

    /**
     * Handle the Review "restored" event.
     *
     * @param  \App\Models\Review  $review
     * @return void
     */
    public function restored(Review $review)
    {
        activity()
            ->causedBy(auth()->user())
            ->performedOn($review->project)
            ->log('Restored review for project #' . $review->project->id);
    }

    /**
     * Handle the Review "force deleted" event.
     *
     * @param  \App\Models\Review  $review
     * @return void
     */
    public function forceDeleted(Review $review)
    {
        activity()
            ->causedBy(auth()->user())
            ->performedOn($review->project)
            ->log('Force deleted review for project #' . $review->project->id);
    }
}
