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
     * A basic feature test example.
     *
     * @return void
     */
    public function testRegister()
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

        // array should have token
        $this->assertArrayHasKey('token', $response->json());
    }

    public function testAuthenticate()
    {
        $data = [
            'email' => 'email@example.com',
            'name' => 'Example',
            'password' => 'secret1234',
        ];

        // create user
        $user = User::create([
            'email' => $data['email'],
            'name' => $data['name'],
            'password' => bcrypt($data['password']),
        ]);

        // attempt login
        $response = $this->json('POST', route('api.authenticate'), [
            'email' => $data['email'],
            'password' => $data['password'],
        ]);

        $response->assertStatus(200);

        $this->assertArrayHasKey('token', $response->json());
    }

    public function testMe()
    {
        $user = User::factory()->create();

        $token = auth()->login($user);

        $response = $this->withHeaders([
            'Authorization' => 'Bearer {$token}'
        ])->json('GET', route('api.me'));

        $response->assertStatus(200);

        $this->assertArrayHasKey('me', $response->json());
    }

    public function testLogout()
    {
        $user = User::factory()->create();

        $token = auth()->login($user);

        $response = $this->withHeaders([
            'Authorization' => 'Bearer {$token}',
        ])->json('GET', route('api.logout'));

        $response->assertStatus(200);

        $this->assertArrayHasKey('message', $response->json());
    }
}
