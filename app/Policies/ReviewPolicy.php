<?php

namespace App\Policies;

use App\Models\Project;
use App\Models\Review;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Request;

class ReviewPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        if ($user->can('reviews.view_index')) {
            return true;
        }

        return $this->deny('You do not have this permission: reviews.view_index');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Review  $review
     * @return mixed
     */
    public function view(User $user, Review $review)
    {
        if ($user->can('reviews.view_any')) {
            return true;
        }

        if ($review->user->id == $user->id) {
            return true;
        }

        return $this->deny('You need the permission reviews.view_any or be the owner of the review.');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user, Project $project)
    {
        if ($user->can('reviews.create')) {
            return true;
        };

        return $this->deny('You need the permission reviews.create.');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Review  $review
     * @return mixed
     */
    public function update(User $user, Review $review)
    {
        if ($user->can('reviews.update_any')) {
            return true;
        }

        if ($review->user->id == $user->id) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Review  $review
     * @return mixed
     */
    public function delete(User $user, Review $review)
    {
        if ($user->can('reviews.delete_any')) {
            return true;
        }

        if ($review->user->id == $user->id) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Review  $review
     * @return mixed
     */
    public function restore(User $user, Review $review)
    {
        if ($user->can('reviews.delete_any')) {
            return true;
        }

        if ($review->user()->id == $user->id) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Review  $review
     * @return mixed
     */
    public function forceDelete(User $user, Review $review)
    {
        if ($user->can('reviews.delete_any')) {
            return true;
        }

        if ($review->user()->id == $user->id) {
            return true;
        }

        return false;
    }
}
