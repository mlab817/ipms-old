<?php

namespace App\Providers;

use App\Models\Permission;
use App\Models\Project;
use App\Models\Review;
use App\Models\Role;
use App\Models\Subproject;
use App\Models\User;
use App\Policies\PermissionPolicy;
use App\Policies\ProjectPolicy;
use App\Policies\ReviewPolicy;
use App\Policies\RolePolicy;
use App\Policies\SubprojectPolicy;
use App\Policies\UserPolicy;
use Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Project::class      => ProjectPolicy::class,
        Review::class       => ReviewPolicy::class,
        Subproject::class   => SubprojectPolicy::class,
        User::class         => UserPolicy::class,
        Role::class         => RolePolicy::class,
        Permission::class   => PermissionPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

//        Gate::define('projects.review', function (User $user, Project $project) {
//            // check if user assigned projects contain assigned project
//            $userCanReview = $user->assigned_projects()->where('project_id', $project->id)->first()->pivot->review ?? false;
//
//            if ($userCanReview) {
//                return true;
//            }
//
//            return false;
//        });

        Passport::routes();
    }
}
