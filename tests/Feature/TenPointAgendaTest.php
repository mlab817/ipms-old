<?php

namespace Tests\Feature;

use Database\Seeders\TenPointAgendasTableSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TenPointAgendaTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_it_returns_list_of_ten_point_agenda()
    {
        $this->seed(TenPointAgendasTableSeeder::class);

        $response = $this->getJson(route('api.ten_point_agenda.index'));

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
