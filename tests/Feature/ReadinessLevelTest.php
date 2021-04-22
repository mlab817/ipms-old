<?php

namespace Tests\Feature;

use Database\Seeders\ReadinessLevelsTableSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReadinessLevelTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_it_returns_list_of_readiness_levels()
    {
        $this->withoutExceptionHandling();

        $this->seed(ReadinessLevelsTableSeeder::class);

        $response = $this->getJson(route('api.readiness_levels.index'));

        $response
            ->assertStatus(200);

        $response->assertJsonStructure(['data' => [
            [
                'id',
                'name',
                'slug',
            ]
        ]]);
    }
}
