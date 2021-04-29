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
        $user = User::find(1);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/login')
                ->type('email', $user->email)
                ->type('password', 'password')
                ->check('remember')
                ->screenshot('login-test')
                ->press('Login');

            $browser->assertAuthenticatedAs($user);
        });
    }
}
