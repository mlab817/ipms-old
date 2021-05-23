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

        $permissionsToSeed = config('ipms.allPermissions');

        foreach ($permissionsToSeed as $item) {
            Permission::create(['name' => $item]);
        }

        Schema::enableForeignKeyConstraints();
    }
}
