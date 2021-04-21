<?php

namespace Tests\Feature;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PermissionTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    const ADMIN_EMAIL = 'admin@example.com';

    public function test_permissions_index()
    {
        $permissions = Permission::factory()->count(5)->create();

        $response = $this
            ->actingAs(User::where('email', self::ADMIN_EMAIL)->first())
            ->json('GET', route('api.permissions.index'))
            ->assertStatus(200);

        $response->dump();
    }

    public function test_permissions_show()
    {
        $permission = Permission::factory()->create();

        $response = $this
            ->actingAs(User::where('email',self::ADMIN_EMAIL)->first())
            ->json('GET', route('api.permissions.show', $permission->id))
            ->assertStatus(200);

        $response->dump();
    }

    public function test_permissions_create()
    {
        $data = [
            'permission'    => $this->faker->word,
        ];

        $response = $this
            ->actingAs(User::where('email',self::ADMIN_EMAIL)->first())
            ->json('POST', route('api.permissions.store'), $data)
            ->assertStatus(200);

        $response->dump();
    }

    public function test_permissions_update()
    {
        $permission = Permission::factory()->create();

        $data = [
            'permission'    => $this->faker->word,
        ];

        $response = $this
            ->actingAs(User::where('email',self::ADMIN_EMAIL)->first())
            ->json('PUT', route('api.permissions.update', $permission->id), $data)
            ->assertStatus(200);

        $response->dump();
    }

    public function test_permissions_destroy()
    {
        $permission = Permission::factory()->create();

        $response = $this
            ->actingAs(User::where('email',self::ADMIN_EMAIL)->first())
            ->json('DELETE', route('api.permissions.destroy', $permission))
            ->assertStatus(204);

        $response->dump();
    }
}
