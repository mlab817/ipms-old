<?php

namespace Tests\Feature;

use App\Models\FeasibilityStudy;
use App\Models\FsStatus;
use App\Models\RightOfWay;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RowTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testIndexRow()
    {
        $project = $this->createTestProject();
        $row = RightOfWay::factory()->make();
        $project->right_of_way()->save($row);

        $response = $this->json('GET', route('api.projects.row.index', $project->slug))
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

    public function testStoreRow()
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

        $response = $this->json('POST', route('api.projects.row.store', $project->slug), $data)
            ->assertStatus(201)
            ->assertJson([
                'data'  => $data
            ]);

        $response->dump();
    }

    public function testShowRow()
    {
        $project = $this->createTestProject();
        $row = RightOfWay::factory()->make();
        $project->right_of_way()->save($row);

        $response = $this->json('GET', route('api.projects.row.show', [
            'project'   => $project->slug,
            'row'       => $row->uuid,
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
                    'affected_households',
                ],
            ]);

        $response->dump();
    }

    public function testUpdateRow()
    {
        $project = $this->createTestProject();
        $row = RightOfWay::factory()->make();
        $project->right_of_way()->save($row);

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

        $response = $this->json('PUT', route('api.projects.row.update', [
            'project'   => $project->slug,
            'row'       => $row->uuid,
        ]), $data)
            ->assertStatus(200)
            ->assertJson([
                'data' => $data
            ]);

        $response->dump();
    }

    public function testDeleteRap()
    {
        $project = $this->createTestProject();
        $row = RightOfWay::factory()->make();
        $project->right_of_way()->save($row);

        $response = $this->json('DELETE', route('api.projects.row.destroy', [
            'project'   => $project->slug,
            'row'       => $row->uuid,
        ]))
            ->assertStatus(200)
            ->assertJson([
                'message' => 'Success'
            ]);

        $response->dump();
    }
}
