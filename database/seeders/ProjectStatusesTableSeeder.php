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
               'uuid'           => Str::uuid(),
               'name'           => 'Ongoing',
               'slug'           => Str::slug('Ongoing'),
               'description'    => '',
            ],
            [
                'id'            => 2,
                'uuid'          => Str::uuid(),
                'name'          => 'Proposed',
                'slug'          => Str::slug('Proposed'),
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
                'name'          => 'Conceptual Stage',
                'slug'          => Str::slug('Conceptual Stage'),
                'description'   => '',
            ],
            [
                'id'            => 5,
                'uuid'          => Str::uuid(),
                'name'          => 'Approved but not yet ongoing',
                'slug'          => Str::slug('Approved but not yet ongoing'),
                'description'   => '',
            ],
            [
                'id'            => 6,
                'uuid'          => Str::uuid(),
                'name'          => 'Temporarily Stopped',
                'slug'          => Str::slug('Temporarily Stopped'),
                'description'   => '',
            ],
            [
                'id'            => 7,
                'uuid'          => Str::uuid(),
                'name'          => 'Cancelled/Terminated',
                'slug'          => Str::slug('Cancelled/Terminated'),
                'description'   => '',
            ],
            [
                'id'            => 8,
                'uuid'          => Str::uuid(),
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
