<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class SidebarTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_it_shows_correct_sidebar_for_admin()
    {
        $this->browse(function (Browser $browser) {
            $browser
                    ->loginAs(1)
                    ->visit('/dashboard')
                    ->assertSee('Dashboard')
                    ->assertSee('Admin')
                    ->assertSee('Manage Projects')
                    ->assertSee('Manage Users')
                    ->assertSee('Manage Teams')
                    ->assertSee('Manage Libraries')
                    ->assertSee('Audit Logs')
                    ->assertSee('Settings')
                    ->assertSee('Logout')
                    ->screenshot('sidebar/admin-sidebar');
        });
    }

    public function test_it_shows_correct_sidebar_for_encoder()
    {
        $user = User::find(4);
        $user->activate();
        $user->password_changed_at = now();
        $user->save();

        $this->browse(function (Browser $browser) {
            $browser
                ->loginAs(4)
                ->visit('/dashboard')
                ->assertSee('Dashboard')
                ->assertSee('focal main')
                ->assertSee('Create New PAP')
                ->assertSee('View My Office PAPs')
                ->assertSee('View Own PAPs')
                ->assertSee('Settings')
                ->assertSee('Logout')
                ->screenshot('sidebar/encoder-sidebar');
        });
    }

    public function test_it_shows_correct_sidebar_for_reviewer()
    {
        $user = User::find(2);
        $user->activate();
        $user->password_changed_at = now();
        $user->save();

        $this->browse(function (Browser $browser) {
            $browser
                ->loginAs(2)
                ->visit('/dashboard')
                ->assertSee('Dashboard')
                ->assertSee('reviewer main')
                ->assertSee('Review PAPs')
                ->assertSee('Settings')
                ->assertSee('Logout')
                ->screenshot('sidebar/reviewer-sidebar');
        });
    }
}
