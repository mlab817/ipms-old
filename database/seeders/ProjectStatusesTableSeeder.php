<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
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
               'name'           => 'Ongoing',
               'slug'           => Str::slug('Ongoing'),
               'description'    => '',
            ],
            [
                'id'            => 2,
                'name'          => 'Proposed',
                'slug'          => Str::slug('Proposed'),
                'description'   => '',
            ],
            [
                'id'            => 3,
                'name'          => 'Completed',
                'slug'          => Str::slug('Completed'),
                'description'   => '',
            ],
            [
                'id'            => 4,
                'name'          => 'Conceptual Stage',
                'slug'          => Str::slug('Conceptual Stage'),
                'description'   => '',
            ],
            [
                'id'            => 5,
                'name'          => 'Approved but not yet ongoing',
                'slug'          => Str::slug('Approved but not yet ongoing'),
                'description'   => '',
            ],
            [
                'id'            => 6,
                'name'          => 'Temporarily Stopped',
                'slug'          => Str::slug('Temporarily Stopped'),
                'description'   => '',
            ],
            [
                'id'            => 7,
                'name'          => 'Cancelled/Terminated',
                'slug'          => Str::slug('Cancelled/Terminated'),
                'description'   => '',
            ],
            [
                'id'            => 8,
                'name'          => 'Dropped from pipeline',
                'slug'          => Str::slug('Dropped from pipeline'),
                'description'   => '',
            ],
        ];

        Schema::disableForeignKeyConstraints();

        DB::table('project_statuses')->truncate();

        DB::table('project_statuses')->insert($seeds);

        Schema::enableForeignKeyConstraints();
    }
}
