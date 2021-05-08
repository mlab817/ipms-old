<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class RegionsTableSeeder extends Seeder
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
                'name'          => 'Ilocos Region',
                'slug'          => Str::slug('REGION I (ILOCOS REGION)'),
                'label'         => 'Region I',
                'order'         => 3,
            ],
            [
                'id'            => 2,
                'name'          => 'Cagayan Valley)',
                'slug'          => Str::slug('REGION II (CAGAYAN VALLEY)'),
                'label'         => 'Region II',
                'order'         => 4,
            ],
            [
                'id'            => 3,
                'name'          => 'Central Luzon',
                'slug'          => Str::slug('REGION III (CENTRAL LUZON)'),
                'label'         => 'Region III',
                'order'         => 5,
            ],
            [
                'id'            => 40,
                'name'          => 'CALABARZON',
                'slug'          => Str::slug('REGION IV-A (CALABARZON)'),
                'label'         => 'Region IV-A',
                'order'         => 6,
            ],
            [
                'id'            => 5,
                'name'          => 'Bicol Region',
                'slug'          => Str::slug('REGION V (BICOL REGION)'),
                'label'         => 'Region V',
                'order'         => 8,
            ],
            [
                'id'            => 6,
                'name'          => 'Western Visayas',
                'slug'          => Str::slug('REGION VI (WESTERN VISAYAS)'),
                'label'         => 'Region VI',
                'order'         => 9,
            ],
            [
                'id'            => 7,
                'name'          => 'Central Visayas',
                'slug'          => Str::slug('REGION VII (CENTRAL VISAYAS)'),
                'label'         => 'Region VII',
                'order'         => 10,
            ],
            [
                'id'            => 8,
                'name'          => 'Eastern Visayas',
                'slug'          => Str::slug('REGION VIII (EASTERN VISAYAS)'),
                'label'         => 'Region VIII',
                'order'         => 11,
            ],
            [
                'id'            => 9,
                'name'          => 'Zamboanga Peninsula',
                'slug'          => Str::slug('REGION IX (ZAMBOANGA PENINSULA)'),
                'label'         => 'Region IX',
                'order'         => 12,
            ],
            [
                'id'            => 10,
                'name'          => 'Norther Mindanao',
                'slug'          => Str::slug('REGION X (NORTHERN MINDANAO)'),
                'label'         => 'Region X',
                'order'         => 13,
            ],
            [
                'id'            => 11,
                'name'          => 'Davao Region',
                'slug'          => Str::slug('REGION XI (DAVAO REGION)'),
                'label'         => 'Region XI',
                'order'         => 14,
            ],
            [
                'id'            => 12,
                'name'          => 'SOCCSKSARGEN',
                'slug'          => Str::slug('REGION XII (SOCCSKSARGEN)'),
                'label'         => 'Region XII',
                'order'         => 15,
            ],
            [
                'id'            => 16,
                'name'          => 'NATIONAL CAPITAL REGION (NCR)',
                'slug'          => Str::slug('NATIONAL CAPITAL REGION (NCR)'),
                'label'         => 'NCR',
                'order'         => 1,
            ],
            [
                'id'            => 15,
                'name'          => 'Cordillera Administrative Region',
                'slug'          => Str::slug('CORDILLERA ADMINISTRATIVE REGION (CAR)'),
                'label'         => 'CAR',
                'order'         => 2,
            ],
            [
                'id'            => 14,
                'name'          => 'Autonomous Region in Muslim Mindanao',
                'slug'          => Str::slug('AUTONOMOUS REGION IN MUSLIM MINDANAO (ARMM)'),
                'label'         => 'ARMM',
                'order'         => 16,
            ],
            [
                'id'            => 13,
                'name'          => 'CARAGA',
                'slug'          => Str::slug('REGION XIII (Caraga)'),
                'label'         => 'CARAGA',
                'order'         => 16,
            ],
            [
                'id'            => 41,
                'name'          => 'MIMAROPA',
                'slug'          => Str::slug('REGION IV-B (MIMAROPA)'),
                'label'         => 'Region IV-B',
                'order'         => 7,
            ],
            [
                'id'            => 99,
                'name'          => 'No Breakdown',
                'slug'          => Str::slug('NO BREAKDOWN'),
                'label'         => 'NB',
                'order'         => 17,
            ],
            [
                'id'            => 100,
                'name'          => 'Not Applicable',
                'slug'          => Str::slug('Not Applicable'),
                'label'         => 'N/A',
                'order'         => 18,
            ]
        ];

        Schema::disableForeignKeyConstraints();

        DB::table('regions')->truncate();

        DB::table('regions')->insert($seeds);

        Schema::enableForeignKeyConstraints();
    }
}
