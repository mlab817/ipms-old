<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TiersTableSeeder extends Seeder
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
                'name'          => 'Tier 1 (Ongoing)',
                'uuid'          => Str::uuid(),
                'slug'          => Str::slug('Tier 1 (Ongoing)'),
                'description'   => ''
            ],
            [
                'id'            => 2,
                'name'          => 'Tier 2 (New)',
                'uuid'          => Str::uuid(),
                'slug'          => Str::slug('Tier 2 (New)'),
                'description'   => ''
            ],
            [
                'id'            => 3,
                'name'          => 'Tier 2 (Expanded)',
                'uuid'          => Str::uuid(),
                'slug'          => Str::slug('Tier 2 (Expanded)'),
                'description'   => ''
            ],
            [
                'id'            => 4,
                'name'          => 'Not Applicable',
                'uuid'          => Str::uuid(),
                'slug'          => Str::slug('Not Applicable'),
                'description'   => ''
            ],
        ];

        DB::table('tiers')->insert($seeds);
    }
}
