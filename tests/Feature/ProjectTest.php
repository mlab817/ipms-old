<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_it_creates_project()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $data = Project::factory()->make();

        $user = User::factory()->create();
        $user->assignRole('contributor');

        $response = $this
            ->actingAs($user)
            ->json('POST', route('api.projects.store'), $data->getAttributes());

        $response->assertStatus(201);

        $response->dump();
    }
}
