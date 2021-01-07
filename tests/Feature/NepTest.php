<?php

namespace Tests\Feature;

use App\Models\Nep;
use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class NepTest extends TestCase
{
    use RefreshDatabase;

    const CONTRIBUTOR_EMAIL = 'contributor@example.com';

    public function createTestProject()
    {
        return $project = Event::fakeFor(function() {
            return Project::factory()
                ->create();
        });
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndexNep()
    {
        $project = $this->createTestProject();
        $nep = Nep::factory()->make();
        $project->nep()->save($nep);

        $response = $this
            ->actingAs(User::where('email', self::CONTRIBUTOR_EMAIL)->first())
            ->json('get', route('api.projects.nep.index', $project->slug))
            ->assertStatus(200);

        $response->dump();
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testStoreNep()
    {
        $project = $this->createTestProject();
        $nep = Nep::factory()->make()->toArray();

        $response = $this
            ->json('POST', route('api.projects.nep.store', $project->slug), $nep)
            ->assertStatus(201);

        $response->dump();

//        $response->assertStatus(500);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUpdateNep()
    {
        $project = $this->createTestProject();
        $project->nep()->save(Nep::factory()->make());

        $nep = [
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

        $response = $this->json('PUT', route('api.projects.nep.update', $project->slug), $nep)
            ->assertStatus(200);

        $response->dump();
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testDeleteNep()
    {
        $project = $this->createTestProject();
        $nep = Nep::factory()->make();
        $project->nep()->save(Nep::factory()->make());

        $response = $this->json('DELETE', route('api.projects.nep.destroy', [
            'project' => $project->slug,
            'nep' => $nep->uuid, ]))
            ->assertStatus(200)
            ->assertJson([
                'message' => 'Success'
            ]);

        $response->dump();
    }
}
