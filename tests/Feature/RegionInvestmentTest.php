<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\Region;
use App\Models\RegionInvestment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegionInvestmentTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_returns_project_region_investments()
    {
        $project = Project::factory()
            ->has(RegionInvestment::factory()->count(2),'region_investments')
            ->create();

        $response = $this->get(route('api.projects.region_investments.index',$project->slug))
            ->assertStatus(200);

        $response->dump();
    }

    public function test_it_gets_project_region_investments_by_uuid()
    {
        $project = Project::factory()->create();
        $regionInvestment = RegionInvestment::factory()->create([
            'project_id' => $project->id,
        ]);

        $response = $this->json('GET', route('api.projects.region_investments.show',[
            'project' => $project->slug,
            'region_investment' => $regionInvestment->uuid,
        ]))
            ->assertStatus(200);


        $response->dump();
    }

    public function test_it_updates_project_region_investments_by_uuid()
    {
        $project = Project::factory()->create();
        $regionInvestment = RegionInvestment::factory()->create([
            'project_id' => $project->id,
        ]);

        $updatedData = [
            'y2016' => 900000,
            'y2017' => 1000000,
            'y2018' => 1200000,
            'y2019' => 1400000,
            'y2020' => 1600000,
            'y2021' => 1700000,
            'y2022' => 1800000,
            'y2023' => 1900000,
            'y2024' => 2000000,
            'y2025' => 2100000,
        ];

        $response = $this->json('PUT', route('api.projects.region_investments.update',[
            'project' => $project->slug,
            'region_investment' => $regionInvestment->uuid,
        ]), $updatedData)->assertStatus(200);


        $response->dump();
    }

    public function test_it_stores_project_region_investments()
    {
        $project = Project::factory()->create();
        $regionInvestment = [
            'region_id' => Region::all()->random()->id,
        ];

        $response = $this->json('POST', route('api.projects.region_investments.store',[
            'project' => $project->slug,
        ]), $regionInvestment)->assertStatus(201);


        $response->dump();
    }

    public function test_it_deletes_project_region_investments_by_uuid()
    {
        $project = Project::factory()->create();
        $regionInvestment = RegionInvestment::factory()->create([
            'project_id' => $project->id,
        ]);

        $response = $this->json('DELETE', route('api.projects.region_investments.destroy',[
            'project' => $project->slug,
            'region_investment' => $regionInvestment->uuid,
        ]))->assertStatus(204);


        $response->dump();
    }
}
