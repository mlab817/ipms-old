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
        $this->withoutExceptionHandling();

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
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testDeleteNep()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
