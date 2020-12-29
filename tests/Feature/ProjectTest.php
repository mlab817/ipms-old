<?php

namespace Tests\Feature;

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_it_creates_project()
    {
        $data = Project::factory()->count(1)->make();

        $response = $this->json('POST', route('api.projects.create'), $data);

        $response->assertStatus(200);
    }
}
