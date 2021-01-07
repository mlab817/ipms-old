<?php

namespace Tests\Feature;

use App\Models\OperatingUnit;
use App\Models\OuInvestment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OuInvestmentTest extends TestCase
{
    use RefreshDatabase;

    public function testIndexOuInvestment()
    {
        $project = $this->createTestProject();
        $project->ou_investments()->save(OuInvestment::factory()->make());

        $response = $this->json('GET', route('api.projects.ou_investments.index', $project->slug))
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    [
                        'id',
                        'y2016',
                        'y2017',
                        'y2018',
                        'y2019',
                        'y2020',
                        'y2021',
                        'y2022',
                        'y2023',
                        'y2024',
                        'y2025',
                        'links',
                    ]
                ]
            ]);

        $response->dump();
    }

    public function testShowOuInvestment()
    {
        $project = $this->createTestProject();
        $ouInvestment = OuInvestment::factory()->make();
        $project->ou_investments()->save($ouInvestment);

        $response = $this->json('GET', route('api.projects.ou_investments.show', [
            'project' => $project->slug,
            'ouInvestment'  => $ouInvestment->uuid,
        ]))
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'y2016',
                    'y2017',
                    'y2018',
                    'y2019',
                    'y2020',
                    'y2021',
                    'y2022',
                    'y2023',
                    'y2024',
                    'y2025',
                    'links',
                ]
            ]);

        $response->dump();
    }

    public function testStoreOuInvestment()
    {
        $project = $this->createTestProject();
        $data = [
            'ou_id' => OperatingUnit::factory()->create()->id,
            'y2016' => 1000,
            'y2017' => 1001,
            'y2018' => 1002,
            'y2019' => 1003,
            'y2020' => 1004,
            'y2021' => 1005,
            'y2022' => 1006,
            'y2023' => 1007,
            'y2024' => 1008,
            'y2025' => 1009,
        ];

        $response = $this->json('POST', route('api.projects.ou_investments.store', [
            'project' => $project->slug,
        ]), $data)
            ->assertStatus(201)
            ->assertJson([
                'data' => $data
            ]);

        $response->dump();
    }

    public function testUpdateOuInvestment()
    {
        $project = $this->createTestProject();
        $ouInvestment = OuInvestment::factory()->make();
        $project->ou_investments()->save($ouInvestment);

        $data = [
            'ou_id' => OperatingUnit::factory()->create()->id,
            'y2016' => 1000,
            'y2017' => 1001,
            'y2018' => 1002,
            'y2019' => 1003,
            'y2020' => 1004,
            'y2021' => 1005,
            'y2022' => 1006,
            'y2023' => 1007,
            'y2024' => 1008,
            'y2025' => 1009,
        ];

        $response = $this->json('PUT', route('api.projects.ou_investments.update', [
            'project'       => $project->slug,
            'ouInvestment'  => $ouInvestment->uuid,
        ]), $data)
            ->assertStatus(200)
            ->assertJson([
                'data' => $data
            ]);

        $response->dump();
    }

    public function testDeleteOuInvestment()
    {
        $project = $this->createTestProject();
        $ouInvestment = OuInvestment::factory()->make();
        $project->ou_investments()->save($ouInvestment);

        $data = [
            'ou_id' => OperatingUnit::factory()->create()->id,
            'y2016' => 1000,
            'y2017' => 1001,
            'y2018' => 1002,
            'y2019' => 1003,
            'y2020' => 1004,
            'y2021' => 1005,
            'y2022' => 1006,
            'y2023' => 1007,
            'y2024' => 1008,
            'y2025' => 1009,
        ];

        $response = $this->json('DELETE', route('api.projects.ou_investments.destroy', [
            'project'       => $project->slug,
            'ouInvestment'  => $ouInvestment->uuid,
        ]), $data)
            ->assertStatus(200)
            ->assertJson([
                'message' => 'Success'
            ]);

        $response->dump();
    }
}
