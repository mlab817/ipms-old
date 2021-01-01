<?php

namespace App\Policies;

use App\Models\Project;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
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
    public function view(?User $user, Project $project): bool
    {
        return true;
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
