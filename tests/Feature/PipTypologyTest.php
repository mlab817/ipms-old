<?php

namespace Tests\Feature;

use Database\Seeders\PipTypologiesTableSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PipTypologyTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_it_returns_list_of_pip_typologies()
    {
        $this->seed(PipTypologiesTableSeeder::class);

        $response = $this->getJson(route('api.pip_typologies.index'));

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
