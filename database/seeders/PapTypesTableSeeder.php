<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PapTypesTableSeeder extends Seeder
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
                'id'            => 1,
                'name'          => 'Program',
                'uuid'          => Str::uuid(),
                'slug'          => Str::slug('Program'),
                'description'   => 'A program is a group of activities and projects that contribute to a common particular outcome. A program should have the following: (a) unique expected results or outcomes; (b) a clear target population or client group external to the agency; (c) a defined method of intervention to achieve the desired result; and (d) a clear management structure that defines accountability.',
            ],
            [
                'id'            => 2,
                'name'          => 'Project',
                'uuid'          => Str::uuid(),
                'slug'          => Str::slug('Project'),
                'description'   => 'A project is a special undertaking carried out within a definite time frame and intended to result in some pre -determined measure of goods and services.',
            ],
            [
                'id'            => 3,
                'name'          => 'Activity',
                'uuid'          => Str::uuid(),
                'slug'          => Str::slug('Activity'),
                'description'   => '',
            ],
            [
                'id'            => 4,
                'name'          => 'Subproject',
                'uuid'          => Str::uuid(),
                'slug'          => Str::slug('Subproject'),
                'description'   => '',
            ],
        ];

        DB::table('pap_types')->insert($seeds);
    }
}
