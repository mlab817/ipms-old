<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        Permission::create(['name' => 'projects.create']);
        Permission::create(['name' => 'projects.view_team']);
        Permission::create(['name' => 'projects.view_any']);
        Permission::create(['name' => 'projects.update_own']);
        Permission::create(['name' => 'projects.update_team']);
        Permission::create(['name' => 'projects.update_any']);
        Permission::create(['name' => 'projects.delete_own']);
        Permission::create(['name' => 'projects.delete_team']);
        Permission::create(['name' => 'projects.delete_any']);
    }
}
