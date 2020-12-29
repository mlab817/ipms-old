<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProjectStatusesTableSeeder extends Seeder
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
               'id'             => 1,
               'uuid'           => Str::uuid(),
               'name'           => 'Level 1',
               'slug'           => Str::slug('Level 1'),
               'description'    => '',
            ],
            [
                'id'            => 2,
                'uuid'          => Str::uuid(),
                'name'          => 'Level 2',
                'slug'          => Str::slug('Level 2'),
                'description'   => '',
            ],
            [
                'id'            => 3,
                'uuid'          => Str::uuid(),
                'name'          => 'Level 3',
                'slug'          => Str::slug('Level 3'),
                'description'   => '',
            ],
            [
                'id'            => 4,
                'uuid'          => Str::uuid(),
                'name'          => 'Level 4',
                'slug'          => Str::slug('Level 4'),
                'description'   => '',
            ],
        ];

        DB::table('readiness_levels')->insert($seeds);
    }
}
