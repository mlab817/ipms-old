<?php

namespace Tests\Feature;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Database\Seeders\PermissionsTableSeeder;
use Database\Seeders\RolesTableSeeder;
use Database\Seeders\UsersTableSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_it_returns_list_of_users()
    {
        $this->seed(UsersTableSeeder::class);

        $this->seed(PermissionsTableSeeder::class);

        $user = User::factory()->state(['activated_at' => now(), 'password_changed_at' => now()])->create();
        $user->givePermissionTo('users.view_index');

        $response = $this
            ->actingAs($user)
            ->get(route('admin.users.index'));

        $response->assertStatus(200);
    }
}
