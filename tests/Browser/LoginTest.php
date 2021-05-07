<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     * @throws \Throwable
     */
    public function test_it_shows_login_page()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->assertSee('IPMSv2')
                    ->assertSee('Sign in to start your session');
        });
    }

    /**
     * @throws \Throwable
     */
    public function test_it_interacts_with_login_form()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->type('email', 'admin@admin.com')
                ->type('password', 'password')
                ->check('remember')
                ->screenshot('login-test')
                ->press('Sign In')
                ->assertPathIs('/dashboard');

            $browser->assertAuthenticatedAs(User::find(1));
        });
    }
}
