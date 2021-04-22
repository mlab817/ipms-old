<?php

namespace Tests\Feature;

use Database\Seeders\CipTypesTableSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CipTypeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_it_returns_a_list_of_cip_types()
    {
        $this->seed(CipTypesTableSeeder::class);

        $response = $this->getJson(route('api.cip_types.index'));

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
