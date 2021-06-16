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
        if ($user->hasPermissionTo('projects.view_office')
            && $project->office_id == $user->office_id
        ) {
            return true;
        }

        if ($project->created_by == $user->id) {
            return true;
        }

        // TODO: this might throw an error
        if ($project = $user->assigned_projects()->find($project->id)) {
            if ($project->pivot->read) {
                return true;
            }
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

        if ($user->hasPermissionTo('projects.update_office')
            && $user->office_id == $project->office_id
        ) {
            return true;
        }

        if ($user->id == $project->created_by) {
            return true;
        }

        if ($user->hasPermissionTo('projects.import')) {
            return true;
        }

        // TODO: this might throw an error
        if ($project = $user->assigned_projects()->find($project->id)) {
            if ($project->pivot->update) {
                return true;
            }
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

        if ($user->hasPermissionTo('projects.delete_office')
            && $user->office_id == $project->office_id
        ) {
            return true;
        }

        // if user is owner of the project
        if ($user->id == $project->created_by) {
            return true;
        }

        // TODO: this might throw an error
        if ($project = $user->assigned_projects()->find($project->id)) {
            if ($project->pivot->delete) {
                return true;
            }
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

        // if user is able to delete any project
        if ($user->hasPermissionTo('projects.delete_any')) {
            return true;
        }

        if ($user->hasPermissionTo('projects.delete_office')
            && $user->office_id == $project->office_id
        ) {
            return true;
        }

        // if user is owner of the project
        if ($user->id == $project->created_by) {
            return true;
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

        // if user is able to delete any project
        if ($user->hasPermissionTo('projects.delete_any')) {
            return true;
        }

        if ($user->hasPermissionTo('projects.delete_office')
            && $user->office_id == $project->office_id
        ) {
            return true;
        }

        // if user is owner of the project
        if ($user->id == $project->created_by) {
            return true;
        }

        return false;
    }

    public function review(User $user, Project $project)
    {
        $userCanReview = $user->can('reviews.create') || ($user->assigned_projects()->where('project_id', $project->id)->first()->pivot->review ?? false);

        if ($userCanReview) {
            return true;
        }

        return $this->deny('User is not assigned to review project');
    }

    public function endorse(User $user, Project $project)
    {
        if (! config('ipms.permissions.projects.endorse')) {
            return $this->deny('Sorry, the System is currently not allowing endorsement of submissions');
        }

        return $user->hasPermissionTo('projects.endorse');
    }

    public function drop(User $user, Project $project)
    {
        if (! config('ipms.permissions.projects.drop')) {
            return $this->deny('Sorry, the System is currently not allowing dropping of submissions');
        }

        return $user->hasPermissionTo('projects.drop');
    }
}
