<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginControllerTest extends TestCase
{
    /**
     * @group login-test
     *
     * @return void
     */
    public function test_it_shows_login_page()
    {
        $response = $this->get(route('login'));

        $response->assertStatus(200);
        $response->assertSee('Sign in');
    }

    /**
     * @group login-test
     *
     * @return void
     */
    public function test_it_logouts_and_redirects_user_if_not_activated()
    {
        $user = User::factory()->state([
            'password_changed_at' => now(),
        ])->create();

        $response = $this->post(route('login'), [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response->assertRedirect();
//        $response->assertRedirect(route('login'));
    }

    /**
     * @group login-test
     *
     * @return void
     */
    public function test_it_logins_user()
    {
        $user = User::factory()->state([
            'activated_at' => now(),
            'password_changed_at' => now(),
        ])->create();

        $response = $this->post(route('login'), [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response->assertStatus(302);
        $this->assertAuthenticatedAs($user);
        $response->assertSee('Dashboard');
    }
}
