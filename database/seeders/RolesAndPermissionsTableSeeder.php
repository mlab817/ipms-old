<?php

namespace Database\Seeders;

use App\Models\User;
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
        $role = Role::create(['name' => 'admin'])
            ->givePermissionTo([
                'projects.delete_any',
                'projects.update_any',
                'projects.view_any'
            ]);

        // or may be done by chaining
        $role = Role::create(['name' => 'editor'])
            ->givePermissionTo(['projects.update_any']);

        $role = Role::create(['name' => 'contributor'])
            ->givePermissionTo(['projects.create']);

        // create users and assign role
//        $admin = User::create([
//            'name'      => 'admin',
//            'email'     => 'admin@example.com',
//            'password'  => bcrypt('password'),
//        ]);

//        $admin->assignRole('admin');

//        $contributor = User::create([
//            'name'      => 'contributor',
//            'email'     => 'contributor@example.com',
//            'password'  => bcrypt('password'),
//        ]);
//
//        $contributor->assignRole('contributor');
//
//        $editor = User::create([
//            'name'      => 'Editor',
//            'email'     => 'editor@example.com',
//            'password'  => bcrypt('password'),
//        ]);
//
//        $editor->assignRole('editor');

    }
}
