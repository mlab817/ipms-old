<?php

namespace Tests\Feature;

use Database\Seeders\BasesTableSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BasisTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_it_returns_list_of_basis()
    {
        $this->withoutExceptionHandling();

        $this->seed(BasesTableSeeder::class);

        $response = $this->getJson(route('api.bases.index'))
            ->assertStatus(200);

        $response->assertJsonStructure([
            'data' => [
                [
                    'id',
                    'name',
                    'slug',
                ]
            ]
        ]);
    }
}
