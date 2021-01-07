<?php

namespace Tests\Feature;

use App\Models\FsInvestment;
use App\Models\FundingSource;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FsInvestmentTest extends TestCase
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
        $factory = FsInvestment::factory()->count(2)->make();
        $project->fs_investments()->saveMany($factory);

        $response = $this
            ->json('GET', route('api.projects.fs_investments.index', $project->slug))
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

    public function test_fs_investments_show()
    {
        $project = $this->createTestProject();
        $factory = FsInvestment::factory()->make();
        $project->fs_investments()->save($factory);

        $response = $this
            ->json('GET', route('api.projects.fs_investments.show', [
                'project'               => $project->slug,
                'fsInvestment'  => $factory->uuid,
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

    public function test_fs_investments_store()
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
            ->json('POST', route('api.projects.fs_investments.store', $project->slug), $data)
            ->assertStatus(201)
            ->assertJson([
                'data' => $data
            ]);

        $response->dump();
    }

    public function test_fs_investments_update()
    {
        $project = $this->createTestProject();
        $factory = FsInvestment::factory()->make();
        $project->fs_investments()->save($factory);

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
            ->json('PUT', route('api.projects.fs_investments.update', [
                'project'               => $project->slug,
                'fsInvestment'  => $factory->uuid,
            ]), $data)
            ->assertStatus(200)
            ->assertJson([
                'data'  => $data
            ]);

        $response->dump();
    }

    public function test_fs_investments_delete()
    {
        $project = $this->createTestProject();
        $factory = FsInvestment::factory()->make();
        $project->fs_investments()->save($factory);

        $response = $this
            ->json('DELETE', route('api.projects.fs_investments.destroy', [
                'project'           => $project->slug,
                'fsInvestment'  => $factory->uuid,
            ]))
            ->assertStatus(200)
            ->assertJson([
                'message'  => 'Success'
            ]);

        $response->dump();
    }
}
