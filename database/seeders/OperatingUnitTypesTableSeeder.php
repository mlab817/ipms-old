<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OperatingUnitTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeds = [
            [
                'id'                => 1,
                'uuid'              => Str::uuid(),
                'name'              => 'Central Office',
                'slug'              => Str::slug('Central Office'),
            ],
            [
                'id'                => 2,
                'uuid'              => Str::uuid(),
                'name'              => 'Bureaus',
                'slug'              => Str::slug('Bureaus'),
            ],
            [
                'id'                => 3,
                'uuid'              => Str::uuid(),
                'name'              => 'Regional Field Offices',
                'slug'              => Str::slug('Regional Field Offices'),
            ],
            [
                'id'                => 4,
                'uuid'              => Str::uuid(),
                'name'              => 'Attached Agencies',
                'slug'              => Str::slug('Attached Agencies'),
            ],
            [
                'id'                => 5,
                'uuid'              => Str::uuid(),
                'name'              => 'Attached Corporations',
                'slug'              => Str::slug('Attached Corporations'),
            ],
        ];

        DB::table('operating_unit_types')->insert($seeds);
    }
}
