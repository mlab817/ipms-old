<?php

namespace Tests\Feature;

use App\Models\Disbursement;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DisbursementTest extends TestCase
{
    use RefreshDatabase;

    public function testIndexDisbursement()
    {
        $project = $this->createTestProject();
        $factory = Disbursement::factory()->make();
        $project->disbursement()->save($factory);

        $response = $this->json('GET', route('api.projects.disbursement.index', $project->slug))
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'uuid',
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
                ],
            ]);

        $response->dump();
    }

    public function testStoreDisbursement()
    {
        $project = $this->createTestProject();

        $data = [
            'y2016'             => 20,
            'y2017'             => 30,
            'y2018'             => 40,
            'y2019'             => 50,
            'y2020'             => 60,
            'y2021'             => 70,
            'y2022'             => 80,
            'y2023'             => 90,
            'y2024'             => 100,
            'y2025'             => 110,
        ];

        $response = $this->json('POST', route('api.projects.disbursement.store', $project->slug), $data)
            ->assertStatus(201)
            ->assertJson([
                'data'  => $data
            ]);

        $response->dump();
    }

    public function testShowDisbursement()
    {
        $project = $this->createTestProject();
        $factory = Disbursement::factory()->make();
        $project->disbursement()->save($factory);

        $response = $this->json('GET', route('api.projects.disbursement.show', [
            'project'           => $project->slug,
            'disbursement'      => $factory->uuid,
        ]))
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'uuid',
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
                ],
            ]);

        $response->dump();
    }

    public function testUpdateDisbursement()
    {
        $project = $this->createTestProject();
        $factory = Disbursement::factory()->make();
        $project->disbursement()->save($factory);

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

        $response = $this->json('PUT', route('api.projects.disbursement.update', [
            'project'   => $project->slug,
            'disbursement'       => $factory->uuid,
        ]), $data)
            ->assertStatus(200)
            ->assertJson([
                'data' => $data
            ]);

        $response->dump();
    }

    public function testDeleteDisbursement()
    {
        $project = $this->createTestProject();
        $factory = Disbursement::factory()->make();
        $project->disbursement()->save($factory);

        $response = $this->json('DELETE', route('api.projects.disbursement.destroy', [
            'project'   => $project->slug,
            'disbursement'       => $factory->uuid,
        ]))
            ->assertStatus(200)
            ->assertJson([
                'message' => 'Success'
            ]);

        $response->dump();
    }
}
