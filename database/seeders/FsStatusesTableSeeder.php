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
                'uuid'      => Str::uuid(),
                'name'      => 'Ongoing',
                'slug'      => Str::slug('Ongoing'),
            ],
            [
                'id'        => 2,
                'uuid'      => Str::uuid(),
                'name'      => 'Completed',
                'slug'      => Str::slug('Completed'),
            ],
            [
                'id'        => 1,
                'uuid'      => Str::uuid(),
                'name'      => 'For Preparation',
                'slug'      => Str::slug('For Preparation'),
            ],
        ];

        DB::table('fs_statuses')->insert($seeds);
    }
}
