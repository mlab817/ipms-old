<?php

namespace Tests\Feature;

use Database\Seeders\OperatingUnitTypesTableSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OperatingUnitTypeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_it_returns_list_of_operating_unit_types()
    {
        $this->seed(OperatingUnitTypesTableSeeder::class);

        $response = $this->getJson(route('api.operating_unit_types.index'));

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
