<?php

namespace Tests\Feature;

use App\Models\FsInfrastructure;
use App\Models\FundingSource;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FsInfrastructureTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_fs_infrastructures_index()
    {
        $project = $this->createTestProject();
        $factory = FsInfrastructure::factory()->count(2)->make();
        $project->fs_infrastructures()->saveMany($factory);

        $response = $this
            ->json('GET', route('api.projects.fs_infrastructures.index', $project->slug))
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    [
                        'id',
                        'uuid',
                        'fs_id',
                        'funding_source',
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
                    ]
                ]
            ]);

        $response->dump();
    }

    public function test_fs_infrastructures_show()
    {
        $project = $this->createTestProject();
        $factory = FsInfrastructure::factory()->make();
        $project->fs_infrastructures()->save($factory);

        $response = $this
            ->json('GET', route('api.projects.fs_infrastructures.show', [
                'project'               => $project->slug,
                'fsInfrastructure'  => $factory->uuid,
            ]))
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'uuid',
                    'fs_id',
                    'funding_source',
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
                ]
            ]);

        $response->dump();
    }

    public function test_fs_infrastructures_store()
    {
        $project = $this->createTestProject();

        $data = [
            'fs_id' => FundingSource::factory()->create()->id,
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

        $response = $this
            ->json('POST', route('api.projects.fs_infrastructures.store', $project->slug), $data)
            ->assertStatus(201)
            ->assertJson([
                'data' => $data
            ]);

        $response->dump();
    }

    public function test_fs_infrastructures_update()
    {
        $project = $this->createTestProject();
        $factory = FsInfrastructure::factory()->make();
        $project->fs_infrastructures()->save($factory);

        $data = [
            'fs_id' => FundingSource::factory()->create()->id,
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
            ->json('PUT', route('api.projects.fs_infrastructures.update', [
                'project'               => $project->slug,
                'fsInfrastructure'  => $factory->uuid,
            ]), $data)
            ->assertStatus(200)
            ->assertJson([
                'data'  => $data
            ]);

        $response->dump();
    }

    public function test_fs_infrastructures_delete()
    {
        $project = $this->createTestProject();
        $factory = FsInfrastructure::factory()->make();
        $project->region_infrastructures()->save($factory);

        $response = $this
            ->json('DELETE', route('api.projects.fs_infrastructures.destroy', [
                'project'           => $project->slug,
                'fsInfrastructure'  => $factory->uuid,
            ]))
            ->assertStatus(200)
            ->assertJson([
                'message'  => 'Success'
            ]);

        $response->dump();
    }
}
