<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
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
                    ->assertSee('Sign in to start your session')
                    ->screenshot('login/login-page');
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
                ->screenshot('login/login-page-interaction')
                ->press('Sign In')
                ->assertPathIs('/dashboard')
                ->screenshot('login/login-page-success');

            $browser->assertAuthenticatedAs(User::find(1));
        });
    }

    public function test_it_shows_forgot_password_page()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->clickLink('I forgot my password')
                ->assertPathIs('/password/reset')
                ->screenshot('login/password-reset-page');
        });
    }

    public function test_it_shows_sign_in_via_google_page()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->click('a[href="https://rest.example.com/auth/google"]')
                ->screenshot('login/google-signin-page');
        });
    }
}
