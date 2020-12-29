<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SpatialCoveragesTableSeeder extends Seeder
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
                'name'          => 'Nationwide',
                'uuid'          => Str::uuid(),
                'slug'          => Str::slug('Nationwide'),
                'description'   => 'If spatial coverage/impact of a program or project covers all regions (in parts or as a whole).',
            ],
            [
                'id'            => 2,
                'name'          => 'Interregional',
                'uuid'          => Str::uuid(),
                'slug'          => Str::slug('Interregional'),
                'description'   => 'If spatial coverage/impact of a program or project pertains to more than one region (in parts or as a whole) but not all regions.',
            ],
            [
                'id'            => 3,
                'name'          => 'Region-Specific',
                'uuid'          => Str::uuid(),
                'slug'          => Str::slug('Region-Specific'),
                'description'   => 'If spatial coverage/impact of a program or a project pertains to one region (in parts or as a whole).',
            ],
            [
                'id'            => 4,
                'name'          => 'Abroad',
                'uuid'          => Str::uuid(),
                'slug'          => Str::slug('Abroad'),
                'description'   => 'If spatial coverage of a program or project is outside the country that will have an impact to Filipinos outside of the country (e.g., Overseas Filipino Workers).',
            ],
        ];

        DB::table('spatial_coverages')->insert($seeds);
    }
}
