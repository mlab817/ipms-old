<?php

namespace Tests\Feature;

use Database\Seeders\PdpChaptersTableSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PdpChapterTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_it_returns_list_of_pdp_chapters()
    {
        $this->seed(PdpChaptersTableSeeder::class);

        $response = $this->getJson(route('api.pdp_chapters.index'));

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
