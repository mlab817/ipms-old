<?php

namespace Tests\Feature;

use Database\Seeders\InfrastructureSectorsTableSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InfrastructureSectorTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_it_returns_list_of_infrastructure_sectors()
    {
        $this->seed(InfrastructureSectorsTableSeeder::class);

        $response = $this->getJson(route('api.infrastructure_sectors.index'));

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
