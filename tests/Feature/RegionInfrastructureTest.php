<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\Region;
use App\Models\RegionInfrastructure;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class RegionInfrastructureTest extends TestCase
{
    use RefreshDatabase;

    public function createTestProject()
    {
        return $project = Event::fakeFor(function() {
            return Project::factory()->create();
        });
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_region_infrastructures_index()
    {
        $project = $this->createTestProject();
        $regionInfrastructures = RegionInfrastructure::factory()->count(2)->make();
        $project->region_infrastructures()->saveMany($regionInfrastructures);

        $response = $this
            ->json('GET', route('api.projects.region_infrastructures.index', $project->slug))
            ->assertStatus(200);

        $response->dump();
    }

    public function test_region_infrastructures_show()
    {
        $project = $this->createTestProject();
        $regionInfrastructure = RegionInfrastructure::factory()->make();
        $project->region_infrastructures()->save($regionInfrastructure);

        $response = $this
            ->json('GET', route('api.projects.region_infrastructures.show', [
                'project'               => $project->slug,
                'regionInfrastructure'  => $regionInfrastructure->uuid,
            ]))
            ->assertStatus(200);

        $response->dump();
    }

    public function test_region_infrastructures_store()
    {
        $project = $this->createTestProject();

        $data = [
            'region_id' => Region::all()->random()->id,
        ];

        $response = $this
            ->json('POST', route('api.projects.region_infrastructures.store', $project->slug), $data)
            ->assertStatus(201)
            ->assertJson([
                'data'  => $data
            ]);

        $response->dump();
    }

    public function test_region_infrastructures_update()
    {
        $project = $this->createTestProject();
        $regionInfrastructure = RegionInfrastructure::factory()->make();
        $project->region_infrastructures()->save($regionInfrastructure);

        $data = [
            'region_id' => Region::all()->random()->id,
            'y2016'     => 900000,
            'y2017'     => 1000000,
            'y2018'     => 1200000,
            'y2019'     => 1400000,
            'y2020'     => 1600000,
            'y2021'     => 1700000,
            'y2022'     => 1800000,
            'y2023'     => 1900000,
            'y2024'     => 2000000,
            'y2025'     => 2100000,
        ];

        $response = $this
            ->json('PUT', route('api.projects.region_infrastructures.update', [
                'project'               => $project->slug,
                'regionInfrastructure'  => $regionInfrastructure->uuid,
            ]), $data)
            ->assertStatus(200)
            ->assertJson([
                'data'  => $data
            ]);

        $response->dump();
    }

    public function test_region_infrastructures_delete()
    {
        $project = $this->createTestProject();
        $regionInfrastructure = RegionInfrastructure::factory()->make();
        $project->region_infrastructures()->save($regionInfrastructure);

        $response = $this
            ->json('DELETE', route('api.projects.region_infrastructures.update', [
                'project'               => $project->slug,
                'regionInfrastructure'  => $regionInfrastructure->uuid,
            ]))
            ->assertStatus(200)
            ->assertJson([
                'message'  => 'Success'
            ]);

        $response->dump();
    }
}
