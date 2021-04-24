<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class GadsTableSeeder extends Seeder
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
                'name'          => 'GAD is invisible',
                'slug'          => Str::slug('GAD is invisible'),
                'description'   => ''
            ],
            [
                'id'            => 2,
                'name'          => 'Program/Project has promising GAD prospects',
                'slug'          => Str::slug('Program/Project has promising GAD prospects'),
                'description'   => ''
            ],
            [
                'id'            => 3,
                'name'          => 'Program/Project is gender-sensitive',
                'slug'          => Str::slug('Program/Project is gender-sensitive'),
                'description'   => ''
            ],
            [
                'id'            => 4,
                'name'          => 'Program/Project is gender-responsive',
                'slug'          => Str::slug('Program/Project is gender-responsive'),
                'description'   => ''
            ],
            [
                'id'            => 5,
                'name'          => 'Not Applicable',
                'slug'          => Str::slug('Not Applicable'),
                'description'   => ''
            ],
        ];

        DB::table('gads')->insert($seeds);
    }
}
