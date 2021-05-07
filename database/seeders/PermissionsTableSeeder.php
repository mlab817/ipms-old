<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Permission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Schema::disableForeignKeyConstraints();

        DB::table('permissions')->truncate();

        Permission::create(['name' => 'projects.create']);
        Permission::create(['name' => 'projects.view_index']);
        Permission::create(['name' => 'projects.view_office']);
        Permission::create(['name' => 'projects.view_any']);
        Permission::create(['name' => 'projects.view_own']);
        Permission::create(['name' => 'projects.update']);
        Permission::create(['name' => 'projects.update_own']);
        Permission::create(['name' => 'projects.update_office']);
        Permission::create(['name' => 'projects.update_any']);
        Permission::create(['name' => 'projects.delete']);
        Permission::create(['name' => 'projects.delete_own']);
        Permission::create(['name' => 'projects.delete_office']);
        Permission::create(['name' => 'projects.delete_any']);
        Permission::create(['name' => 'subprojects.create']);
        Permission::create(['name' => 'subprojects.view_index']);
        Permission::create(['name' => 'subprojects.view_office']);
        Permission::create(['name' => 'subprojects.view_any']);
        Permission::create(['name' => 'subprojects.update_own']);
        Permission::create(['name' => 'subprojects.update_office']);
        Permission::create(['name' => 'subprojects.update_any']);
        Permission::create(['name' => 'subprojects.delete_own']);
        Permission::create(['name' => 'subprojects.delete_office']);
        Permission::create(['name' => 'subprojects.delete_any']);
        Permission::create(['name' => 'reviews.create']);
        Permission::create(['name' => 'reviews.view_index']);
        Permission::create(['name' => 'reviews.view_office']);
        Permission::create(['name' => 'reviews.view_any']);
        Permission::create(['name' => 'reviews.update_own']);
        Permission::create(['name' => 'reviews.update_office']);
        Permission::create(['name' => 'reviews.update_any']);
        Permission::create(['name' => 'reviews.delete_own']);
        Permission::create(['name' => 'reviews.delete_office']);
        Permission::create(['name' => 'reviews.delete_any']);
        Permission::create(['name' => 'libraries.create']);
        Permission::create(['name' => 'libraries.view']);
        Permission::create(['name' => 'libraries.update']);
        Permission::create(['name' => 'libraries.delete']);
        Permission::create(['name' => 'libraries.view_index']);
        Permission::create(['name' => 'users.create']);
        Permission::create(['name' => 'users.view']);
        Permission::create(['name' => 'users.update']);
        Permission::create(['name' => 'users.delete']);
        Permission::create(['name' => 'users.view_index']);
        Permission::create(['name' => 'roles.view_index']);
        Permission::create(['name' => 'roles.create']);
        Permission::create(['name' => 'roles.view']);
        Permission::create(['name' => 'roles.update']);
        Permission::create(['name' => 'roles.delete']);
        Permission::create(['name' => 'permissions.view_index']);
        Permission::create(['name' => 'permissions.create']);
        Permission::create(['name' => 'permissions.view']);
        Permission::create(['name' => 'permissions.update']);
        Permission::create(['name' => 'permissions.delete']);
        Permission::create(['name' => 'projects.manage']);
        Permission::create(['name' => 'teams.view_index']);
        Permission::create(['name' => 'teams.create']);
        Permission::create(['name' => 'teams.view']);
        Permission::create(['name' => 'teams.update']);
        Permission::create(['name' => 'teams.delete']);

        Schema::enableForeignKeyConstraints();

        $this->call(AdminUserTableSeeder::class);

        $user = User::find(1);

        $user->givePermissionTo(Permission::all());
    }
}
