<?php

namespace Tests\Feature;

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
        $data = [
            'title' => 'New Project',
        ];

        $response = $this->json('POST', route('api.projects.create'), $data);

        $response->assertStatus(200);
    }
}
