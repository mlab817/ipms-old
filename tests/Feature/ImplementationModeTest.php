<?php

namespace Tests\Feature;

use Database\Seeders\ImplementationModesTableSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ImplementationModeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_it_returns_list_of_implementation_modes()
    {
        $this->seed(ImplementationModesTableSeeder::class);

        $response = $this->getJson(route('api.implementation_modes.index'));

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
