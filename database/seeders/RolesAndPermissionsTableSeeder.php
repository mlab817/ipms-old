<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'projects.create']);
        Permission::create(['name' => 'projects.view_team']);
        Permission::create(['name' => 'projects.view_any']);
        Permission::create(['name' => 'projects.update_own']);
        Permission::create(['name' => 'projects.update_team']);
        Permission::create(['name' => 'projects.update_any']);
        Permission::create(['name' => 'projects.delete_own']);
        Permission::create(['name' => 'projects.delete_team']);
        Permission::create(['name' => 'projects.delete_any']);

        // create roles and assign created permissions

        $role = Role::create(['name' => 'super-admin'])
            ->givePermissionTo(Permission::all());

        // this can be done as separate statements
        $role = Role::create(['name' => 'admin']);

        // or may be done by chaining
        $role = Role::create(['name' => 'editor'])
            ->givePermissionTo(['projects.update_any']);

        $role = Role::create(['name' => 'contributor'])
            ->givePermissionTo(['projects.create']);


    }
}
