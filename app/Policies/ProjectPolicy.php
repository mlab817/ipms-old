<?php

namespace App\Policies;

use App\Models\Project;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Log;

class ProjectPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view index.
     *
     * @param User|null $user
     * @return mixed
     */
    public function viewAny(?User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User|null $user
     * @param Project $project
     * @return mixed
     */
    public function view(User $user, Project $project): bool
    {
        // if the user has permission to view any project
        if ($user->hasPermissionTo('projects.view_any')) {
            return true;
        }

        // if user has permission to view office
        // and his office is same as the office of the project
        if ($project->office_id == $user->office_id) {
            return true;
        }

        // if the user can view own and is the owner
        if ($project->created_by == $user->id) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return mixed
     */
    public function create(User $user)
    {
        if (! config('ipms.permissions.projects.create')) {
            return $this->deny('Sorry, the System is currently not accepting new submissions');
        }

        Log::info($user->hasPermissionTo('projects.create'));

        return $user->hasPermissionTo('projects.create');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Project $project
     * @return mixed
     */
    public function update(User $user, Project $project)
    {
        if (! config('ipms.permissions.projects.update')) {
            return $this->deny('Sorry, the System is currently not accepting update to submissions');
        }

        if ($user->hasPermissionTo('projects.update_any')) {
            return true;
        }

        if ($user->id == $project->created_by) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Project $project
     * @return mixed
     */
    public function delete(User $user, Project $project)
    {
        // check global permissions first
        if (! config('ipms.permissions.projects.delete')) {
            return $this->deny('Sorry, the System is currently not deleting submissions');
        }

        // if user is able to delete any project
        if ($user->hasPermissionTo('projects.delete_any')) {
            return true;
        }

        // if user is owner of the project
        if ($user->id == $project->created_by) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param Project $project
     * @return mixed
     */
    public function restore(User $user, Project $project)
    {
        // check global permissions first
        if (! config('ipms.permissions.projects.restore')) {
            return $this->deny('Sorry, the System is currently not restoring deleted submissions');
        }

        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param Project $project
     * @return mixed
     */
    public function forceDelete(User $user, Project $project)
    {
        // check global permissions first
        if (! config('ipms.permissions.projects.forceDelete')) {
            return $this->deny('Sorry, the System is currently not allowing permanent deletion of submissions');
        }

        return false;
    }
}
