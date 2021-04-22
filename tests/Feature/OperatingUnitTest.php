<?php

namespace Tests\Feature;

use Database\Seeders\OperatingUnitsTableSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OperatingUnitTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_it_returns_list_of_operating_units()
    {
        $this->seed(OperatingUnitsTableSeeder::class);

        $response = $this->getJson(route('api.operating_units.index'));

        $response
            ->assertStatus(200);

        $response->assertJsonStructure(['data' => [
            [
                'id',
                'name',
            ]
        ]]);
    }
}
