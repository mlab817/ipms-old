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
               'name'           => 'Proposed',
               'slug'           => Str::slug('Proposed'),
               'description'    => '',
            ],
            [
                'id'            => 2,
                'uuid'          => Str::uuid(),
                'name'          => 'Ongoing',
                'slug'          => Str::slug('Ongoing'),
                'description'   => '',
            ],
            [
                'id'            => 3,
                'uuid'          => Str::uuid(),
                'name'          => 'Completed',
                'slug'          => Str::slug('Completed'),
                'description'   => '',
            ],
            [
                'id'            => 4,
                'uuid'          => Str::uuid(),
                'name'          => 'Dropped',
                'slug'          => Str::slug('Dropped'),
                'description'   => '',
            ],
        ];

        DB::table('project_statuses')->insert($seeds);
    }
}
