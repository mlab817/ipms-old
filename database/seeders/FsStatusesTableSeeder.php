<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FsStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ongoing
        // completed
        // for preparation
        $seeds = [
            [
                'id'        => 1,
                'name'      => 'Ongoing',
                'slug'      => Str::slug('Ongoing'),
            ],
            [
                'id'        => 2,
                'name'      => 'Completed',
                'slug'      => Str::slug('Completed'),
            ],
            [
                'id'        => 3,
                'name'      => 'For Preparation',
                'slug'      => Str::slug('For Preparation'),
            ],
            [
                'id'        => 4,
                'name'      => 'Not Applicable',
                'slug'      => Str::slug('Not Applicable'),
            ],
        ];

        DB::table('fs_statuses')->insert($seeds);
    }
}
