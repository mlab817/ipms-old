<?php

namespace Tests\Feature;

use App\Models\Office;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_it_gets_user_profile()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        $profile = Profile::factory()->create([
            'user_id'   => $user->id,
        ]);

        $response = $this->json('GET', route('api.users.profile.show', [
            'user'      => $user->id,
            'profile'   => $profile->id,
        ]))->assertStatus(200);

        $response->dump();
    }

    public function test_it_stores_user_profile()
    {
//        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        $profile = [
            'nickname'  => $this->faker->name,
            'avatar'    => $this->faker->imageUrl(),
            'office_id' => Office::factory()->create()->id,
        ];

        $response = $this->json('POST', route('api.users.profile.store', $user->id), $profile)->assertStatus(201);

        $response->dump();
    }
}
