<?php

namespace Tests\Feature;

use Database\Seeders\PdpIndicatorsTableSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PdpIndicatorTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_it_returns_list_of_pdp_indicators()
    {
        $this->seed(PdpIndicatorsTableSeeder::class);

        $response = $this->getJson(route('api.pdp_indicators.index'));

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
