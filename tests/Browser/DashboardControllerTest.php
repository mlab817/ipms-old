<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DashboardControllerTest extends DuskTestCase
{
    /**
     * @group dashboard
     */
    public function test_it_shows_dashboard_to_user()
    {
        $user = User::factory()->state([
            'password_changed_at' => now(),
            'activated_at' => now(),
        ])->create();

        $this->browse(function (Browser $browser) use ($user) {
            $browser
                ->loginAs($user->id)
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
