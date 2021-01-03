<?php

namespace Tests\Feature;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoleTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    const ADMIN_EMAIL = 'admin@example.com';

    public function test_roles_index()
    {
        $roles = Role::factory()->count(5)->create();

        $response = $this
            ->actingAs(User::where('email',self::ADMIN_EMAIL)->first())
            ->json('GET', route('api.roles.index'))
            ->assertStatus(200);

        $response->dump();
    }

    public function test_roles_show()
    {
        $role = Role::factory()->create();

        $response = $this
            ->actingAs(User::where('email',self::ADMIN_EMAIL)->first())
            ->json('GET', route('api.roles.show', $role->id))
            ->assertStatus(200);

        $response->dump();
    }

    public function test_roles_create()
    {
        $data = [
            'role'    => $this->faker->word,
        ];

        $response = $this
            ->actingAs(User::where('email',self::ADMIN_EMAIL)->first())
            ->json('POST', route('api.roles.store'), $data)
            ->assertStatus(200);

        $response->dump();
    }

    public function test_roles_update()
    {
        $role = Role::factory()->create();

        $data = [
            'role'    => $this->faker->word,
        ];

        $response = $this
            ->actingAs(User::where('email',self::ADMIN_EMAIL)->first())
            ->json('PUT', route('api.roles.update', $role->id), $data)
            ->assertStatus(200);

        $response->dump();
    }

    public function test_roles_destroy()
    {
        $role = Role::factory()->create();

        $data = [
            'role'    => $this->faker->word,
        ];

        $response = $this
            ->actingAs(User::where('email',self::ADMIN_EMAIL)->first())
            ->json('DELETE', route('api.roles.destroy', $role->id))
            ->assertStatus(204);

        $response->dump();
    }

    public function test_role_sync_permissions()
    {
        $role = Role::factory()->create();
        $permissions = Permission::factory()->count(1)->create();

        foreach ($permissions as $permission) {
            $permissionNames[] = $permission->name;
        }

        $response = $this
            ->actingAs(User::where('email',self::ADMIN_EMAIL)->first())
            ->json('POST', route('api.roles.syncPermissions', $role->name), [
                'permissions' => $permissionNames
            ])
            ->assertStatus(200);

        $response->dump();
    }
}
