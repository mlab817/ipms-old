<?php

namespace Tests\Feature;

use App\Models\OperatingUnit;
use App\Models\OuInfrastructure;
use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class OuInfrastructureTest extends TestCase
{
    use RefreshDatabase;

    public function createTestProject()
    {
        return $project = Event::fakeFor(function () {
            return Project::factory()->create();
        });
    }

    public function testIndexOuInfrastructure()
    {
        $project = $this->createTestProject();
        $ouInfrastructures = OuInfrastructure::factory()->count(2)->make();
        $project->ou_infrastructures()->saveMany($ouInfrastructures);

        $response = $this->json('GET', route('api.projects.ou_infrastructures.index', $project->slug))
            ->assertStatus(200);

        $response->dump();
    }

    public function testShowOuInfrastructure()
    {
        $project = $this->createTestProject();
        $ouInfrastructure = OuInfrastructure::factory()->make();
        $project->ou_infrastructures()->save($ouInfrastructure);

        $response = $this->json('GET', route('api.projects.ou_infrastructures.show', [
            'project' => $project->slug,
            'ouInfrastructure'  => $ouInfrastructure->uuid,
        ]))->assertStatus(200);

        $response->dump();
    }

    public function testStoreOuInfrastructure()
    {
        $this->withoutExceptionHandling();

        $project = $this->createTestProject();

        $data = [
            'ou_id' => OperatingUnit::all()->random()->id,
            'y2016' => 10,
            'y2017' => 20,
            'y2018' => 30,
            'y2019' => 40,
            'y2020' => 50,
            'y2021' => 60,
            'y2022' => 70,
            'y2023' => 80,
            'y2024' => 90,
            'y2025' => 100,
        ];


        $response = $this
            ->json('POST', route('api.projects.ou_infrastructures.store', $project->slug), $data)
            ->assertStatus(201)
            ->assertJson([
                'data'  => $data,
            ]);

        $response->dump();
    }

    public function testUpdateOuInfrastructure()
    {
        $project = $this->createTestProject();
        $ouInfrastructure = OuInfrastructure::factory()->make();
        $project->ou_infrastructures()->save($ouInfrastructure);

        $data = [
            'ou_id' => OperatingUnit::all()->random()->id,
        ];


        $response = $this->json('PUT', route('api.projects.ou_infrastructures.update', [
            'project' => $project->slug,
            'ouInfrastructure'  => $ouInfrastructure->uuid,
        ]), $data)
            ->assertStatus(200)
            ->assertJson([
                'data' => $data
            ]);

        $response->dump();
    }

    public function testDeleteOuInfrastructure()
    {
        $project = $this->createTestProject();
        $ouInfrastructure = OuInfrastructure::factory()->make();
        $project->ou_infrastructures()->save($ouInfrastructure);

        $response = $this->json('DELETE', route('api.projects.ou_infrastructures.destroy',[
            'project'   => $project->slug,
            'ouInfrastructure'  => $ouInfrastructure->uuid,
        ]))->assertStatus(200)
        ->assertJson([
            'message'   => 'Success'
        ]);

        $response->dump();
    }
}
