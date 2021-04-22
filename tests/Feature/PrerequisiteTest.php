<?php

namespace Tests\Feature;

use Database\Seeders\PrerequisitesTableSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PrerequisiteTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_it_returns_list_of_prerequisites()
    {
        $this->seed(PrerequisitesTableSeeder::class);

        $response = $this->getJson(route('api.prerequisites.index'));

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
