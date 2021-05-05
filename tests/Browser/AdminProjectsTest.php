<?php

namespace Tests\Browser;

use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AdminProjectsTest extends DuskTestCase
{
    use DatabaseTransactions;

    public function test_it_shows_manage_projects_page()
    {
        $this->browse(function (Browser $browser) {
            $browser
                    ->loginAs(1)
                    ->visit(route('admin.projects.index'))
                    ->assertSee('Projects')
                    ->screenshot('admin/projects-index');
        });
    }

    public function test_it_shows_manage_projects_user_access_page()
    {
        $this->browse(function (Browser $browser) {
            $project = Project::find(1);

            $browser
                ->loginAs(1)
                ->visit(route('admin.projects.users.index', $project->uuid))
                ->assertSee('Manage Access')
                ->screenshot('admin/projects-users-index');
        });
    }

    public function test_it_shows_manage_projects_user_add_access_page()
    {
        $this->browse(function (Browser $browser) {
            $project = Project::find(1);

            $browser
                ->loginAs(1)
                ->visit(route('admin.projects.users.create', [
                    'project' => $project->uuid
                ]))
                ->assertSee('Add User Access to Project')
                ->screenshot('admin/projects-users-add');
        });
    }

    public function test_it_shows_manage_projects_user_edit_access_page()
    {
        $this->browse(function (Browser $browser) {
            $project = Project::find(1);
            $user = User::find(1);
            $project->users()->sync($user->id);
            $browser
                ->loginAs(1)
                ->visit(route('admin.projects.users.edit', [
                    'project' => $project->uuid,
                    'user' => $user,
                ]))
                ->assertSee('Edit User Access to Project')
                ->screenshot('admin/projects-users-edit');
        });
    }
}
