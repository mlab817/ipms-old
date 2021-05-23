<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $adminRole = Role::create([
            'name' => 'admin'
        ]);

        $adminRole->givePermissionTo([
            'libraries.view_index',
            'libraries.create',
            'libraries.view',
            'libraries.update',
            'libraries.delete',
            'users.view_index',
            'users.create',
            'users.view',
            'users.update',
            'users.delete',
            'roles.view_index',
            'roles.create',
            'roles.view',
            'roles.update',
            'roles.delete',
            'permissions.view_index',
            'permissions.create',
            'permissions.view',
            'permissions.update',
            'permissions.delete',
            'projects.manage',
            'teams.view_index',
            'teams.create',
            'teams.view',
            'teams.update',
            'teams.delete',
            'audit_logs.view_index',
            'audit_logs.create',
            'audit_logs.view',
            'audit_logs.update',
            'audit_logs.delete',
            'exports.view_index',
        ]);

        $mainPipFocal = Role::create([
            'name' => 'focal.main',
        ]);

        $mainPipFocal->givePermissionTo([
            'projects.create',
            'projects.view_office',
            'projects.update_office',
            'projects.delete_office',
        ]);

        $pipFocal = Role::create([
            'name' => 'focal.alt',
        ]);

        $pipFocal->givePermissionTo([
            'projects.create',
            'projects.view_office',
        ]);

        $mainReviewer = Role::create([
            'name' => 'reviewer.main'
        ]);

        $mainReviewer->givePermissionTo([
            'reviews.create',
            'reviews.view_index',
            'reviews.view_office',
            'reviews.view_any',
            'reviews.update_office',
            'reviews.update_any',
            'reviews.delete_office',
            'reviews.delete_any',
            'projects.view_any',
            'projects.update_any',
            'projects.delete_any',
        ]);

        $reviewer = Role::create([
            'name' => 'reviewer',
        ]);

        $reviewer->givePermissionTo([
            'reviews.create',
            'reviews.view_index',
            'reviews.view_office',
            'reviews.update_office',
            'reviews.delete_office',
            'projects.view_any',
            'projects.update_any',
            'projects.delete_any',
        ]);

        $user = User::updateOrCreate([
            'email' => 'admin@admin.com'
        ], [
            'name'  => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ]);

        $user->assignRole('admin');

        $user = User::updateOrCreate([
            'email' => 'reviewer.main@admin.com'
        ], [
            'name'  => 'reviewer main',
            'email' => 'reviewer.main@admin.com',
            'password' => bcrypt('password'),
        ]);

        $user->assignRole('reviewer.main');

        $user = User::updateOrCreate([
            'email' => 'reviewer@admin.com'
        ], [
            'name'  => 'reviewer',
            'email' => 'reviewer@admin.com',
            'password' => bcrypt('password'),
        ]);

        $user->assignRole('reviewer');

        $user = User::updateOrCreate([
            'email' => 'focal.main@admin.com'
        ], [
            'name'  => 'focal main',
            'email' => 'focal.main@admin.com',
            'password' => bcrypt('password'),
        ]);

        $user->assignRole('focal.main');

        $user = User::updateOrCreate([
            'email' => 'focal.alt@admin.com'
        ], [
            'name'  => 'focal alt',
            'email' => 'focal.alt@admin.com',
            'password' => bcrypt('password'),
        ]);

        $user->assignRole('focal.alt');
    }
}
