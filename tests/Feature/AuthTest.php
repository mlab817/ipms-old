<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @group auth-register
     *
     * @return void
     */
    public function test_users_can_register()
    {
        $data = [
            'email' => 'email@example.com',
            'name' => 'Example',
            'password' => 'secret1234',
            'password_confirmation' => 'secret1234',
        ];

        // send data
        $response = $this->json('POST', route('api.register'), $data);

        // assert that status is 200
        $response->assertStatus(200);

        $response->assertJsonStructure(['token']);

        // array should have token
        $this->assertDatabaseHas('users', ['email' => $data['email']]);
    }

    public function test_registered_user_cannot_register()
    {
        $data = User::factory()->state([
            'email' => 'random@email.com'
        ])->create();

        $response = $this->json('POST', route('api.register'), [
            'name'  => 'stupid love',
            'email' => 'random@email.com',
            'password'  => 'password',
            'password_confirmation' => 'password'
        ]);

        $response->assertStatus(422); // invalid entity

        $this->assertArrayHasKey('errors', $response->json());
    }

    /**
     * @group auth-login
     */
    public function test_registered_user_can_login()
    {
        $user = User::factory()->create();

        // attempt login
        $response = $this->json('POST', route('api.authenticate'), [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response->assertStatus(200);

        $this->assertArrayHasKey('token', $response->json());
    }

    /**
     * @group auth-not-registered
     */
    public function test_not_registered_user_cannot_login()
    {
        $response = $this
            ->json('post', route('api.authenticate'), [
                'email' => 'random@email.com',
                'password' => 'password',
            ]);

        $response->assertStatus(401);

        $this->assertArrayHasKey('error', $response->json());
    }

    /**
     * @group auth-get-info
     */
    public function test_logged_in_user_can_retrieve_own_information()
    {
        $this->loginUser();

        $response = $this
            ->json('GET', route('api.me'));

        $response->assertStatus(200);

        $this->assertArrayHasKey('me', $response->json());
    }

    /**
     * @group auth-logout
     */
    public function test_logged_in_user_can_logout()
    {
        $this->loginUser();

        $response = $this
            ->json('POST', route('api.logout'));

        $response->assertStatus(200);

        $this->assertArrayHasKey('message', $response->json());
    }
}
