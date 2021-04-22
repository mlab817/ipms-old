<?php

namespace Tests\Feature;

use Database\Seeders\FundingSourcesTableSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FundingSourceTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_it_returns_list_of_funding_sources()
    {
        $this->seed(FundingSourcesTableSeeder::class);

        $response = $this->getJson(route('api.funding_sources.index'));

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
