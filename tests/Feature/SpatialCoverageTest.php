<?php

namespace Tests\Feature;

use Database\Seeders\SpatialCoveragesTableSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SpatialCoverageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_it_returns_list_of_spatial_coverages()
    {
        $this->seed(SpatialCoveragesTableSeeder::class);

        $response = $this->getJson(route('api.spatial_coverages.index'));

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
