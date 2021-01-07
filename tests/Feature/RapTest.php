<?php

namespace Tests\Feature;

use App\Models\ResettlementActionPlan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RapTest extends TestCase
{
    use RefreshDatabase;

    public function testIndexRap()
    {
        $project = $this->createTestProject();
        $rap = ResettlementActionPlan::factory()->make();
        $project->resettlement_action_plan()->save($rap);

        $response = $this->json('GET', route('api.projects.rap.index', $project->slug))
            ->assertStatus(200);

        $response->dump();
    }

    public function testStoreRap()
    {
        $project = $this->createTestProject();

        $data = [
            'y2016' => 20,
            'y2017' => 30,
            'y2018' => 40,
            'y2019' => 50,
            'y2020' => 60,
            'y2021' => 70,
            'y2022' => 80,
            'y2023' => 90,
            'y2024' => 100,
            'y2025' => 110,
        ];

        $response = $this->json('POST', route('api.projects.rap.index', $project->slug), $data)
            ->assertStatus(201)
            ->assertJson([
                'data'  => $data
            ]);

        $response->dump();
    }

    public function testShowRap()
    {
        $project = $this->createTestProject();
        $rap = ResettlementActionPlan::factory()->make();
        $project->resettlement_action_plan()->save($rap);

        $response = $this->json('GET', route('api.projects.rap.show', [
            'project'   => $project->slug,
            'rap'       => $rap->uuid,
        ]))->assertStatus(200);

        $response->dump();
    }

    public function testUpdateRap()
    {
        $project = $this->createTestProject();
        $rap = ResettlementActionPlan::factory()->make();
        $project->resettlement_action_plan()->save($rap);

        $data = [
            'y2016' => 20,
            'y2017' => 30,
            'y2018' => 40,
            'y2019' => 50,
            'y2020' => 60,
            'y2021' => 70,
            'y2022' => 80,
            'y2023' => 90,
            'y2024' => 100,
            'y2025' => 110,
        ];

        $response = $this->json('PUT', route('api.projects.rap.update', [
            'project'   => $project->slug,
            'rap'       => $rap->uuid,
        ]), $data)->assertStatus(200);

        $response->dump();
    }

    public function testDeleteRap()
    {
        $project = $this->createTestProject();
        $rap = ResettlementActionPlan::factory()->make();
        $project->resettlement_action_plan()->save($rap);

        $response = $this->json('DELETE', route('api.projects.rap.destroy', [
            'project'   => $project->slug,
            'rap'       => $rap->uuid,
        ]))
            ->assertStatus(200)
            ->assertJson([
                'data' => 'Success'
            ]);

        $response->dump();
    }
}
