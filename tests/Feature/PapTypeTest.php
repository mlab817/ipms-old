<?php

namespace Tests\Feature;

use Database\Seeders\PapTypesTableSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PapTypeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_it_returns_list_of_pap_types()
    {
        $this->seed(PapTypesTableSeeder::class);

        $response = $this->getJson(route('api.pap_types.index'));

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    [
                        'id',
                        'name',
                        'slug'
                    ]
                ],
            ]);
    }
}
