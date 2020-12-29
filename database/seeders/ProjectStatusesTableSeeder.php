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
        DB::table('project_statuses')->insert([
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
                'name'          => 'Completed',
                'slug'          => Str::slug('Completed'),
                'description'   => '',
            ],
        ]);
    }
}
