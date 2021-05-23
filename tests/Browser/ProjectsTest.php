<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ProjectsTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_it_shows_own_projects()
    {
        $user = User::find(1);
        $user->givePermissionTo('projects.view_own');

        $this->browse(function (Browser $browser) use ($user) {
            $browser
                    ->loginAs($user->id)
                    ->visit(route('projects.own'))
                    ->assertSee('Own Projects')
                    ->screenshot('projects/index-own');
        });
    }

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_it_shows_office_projects()
    {
        $user = User::find(1);
        $user->givePermissionTo('projects.view_office');

        $this->browse(function (Browser $browser) use ($user) {
            $browser
                ->loginAs($user->id)
                ->visit(route('projects.office'))
                ->assertSee('Office Projects')
                ->screenshot('projects/index-office');
        });
    }
}
