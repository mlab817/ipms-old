<?php

namespace Tests\Feature;

use Database\Seeders\ApprovalLevelsTableSeeder;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApprovalLevelTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_it_returns_list_of_approval_levels()
    {
        $this->seed(ApprovalLevelsTableSeeder::class);

        $response = $this->getJson(route('api.approval_levels.index'));

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
