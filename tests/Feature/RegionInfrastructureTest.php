<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\RegionInfrastructure;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegionInfrastructureTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_region_infrastructures_index()
    {
        $project = Project::factory()->has(RegionInfrastructure::factory()->count(2),'region_infrastructures')->create();

        $response = $this
            ->json('GET', route('api.projects.region_infrastructures.index', $project->slug))
            ->assertStatus(200);

        $response->dump();
    }
}
