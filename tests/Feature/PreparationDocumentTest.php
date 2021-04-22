<?php

namespace Tests\Feature;

use Database\Seeders\PreparationDocumentsTableSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PreparationDocumentTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_it_returns_list_of_preparation_documents()
    {
        $this->seed(PreparationDocumentsTableSeeder::class);

        $response = $this->getJson(route('api.preparation_documents.index'));

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
