<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DashboardTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_it_shows_dashboard_to_user()
    {
        $this->browse(function (Browser $browser) {
            $browser
                    ->loginAs(1)
                    ->visit(route('dashboard'))
                    ->assertSee('Dashboard')
                    ->assertSee('PIP')
                    ->assertSee('TRIP')
                    ->assertSee('Projects')
                    ->assertSee('Users')
                    ->assertSee('Overall Status')
                    ->assertSee('Latest Projects')
                    ->screenshot('dashboard/dashboard-page');
        });
    }
}
