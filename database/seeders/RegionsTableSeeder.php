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
                'name'          => 'REGION I (ILOCOS REGION)',
                'slug'          => Str::slug('REGION I (ILOCOS REGION)'),
                'label'         => 'I',
            ],
            [
                'id'            => 2,
                'name'          => 'REGION II (CAGAYAN VALLEY)',
                'slug'          => Str::slug('REGION II (CAGAYAN VALLEY)'),
                'label'         => 'II',
            ],
            [
                'id'            => 3,
                'name'          => 'REGION III (CENTRAL LUZON)',
                'slug'          => Str::slug('REGION III (CENTRAL LUZON)'),
                'label'         => 'III',
            ],
            [
                'id'            => 40,
                'name'          => 'REGION IV-A (CALABARZON)',
                'slug'          => Str::slug('REGION IV-A (CALABARZON)'),
                'label'         => 'IV-A',
            ],
            [
                'id'            => 5,
                'name'          => 'REGION V (BICOL REGION)',
                'slug'          => Str::slug('REGION V (BICOL REGION)'),
                'label'         => 'V',
            ],
            [
                'id'            => 6,
                'name'          => 'REGION VI (WESTERN VISAYAS)',
                'slug'          => Str::slug('REGION VI (WESTERN VISAYAS)'),
                'label'         => 'VI',
            ],
            [
                'id'            => 7,
                'name'          => 'REGION VII (CENTRAL VISAYAS)',
                'slug'          => Str::slug('REGION VII (CENTRAL VISAYAS)'),
                'label'         => 'VII',
            ],
            [
                'id'            => 8,
                'name'          => 'REGION VIII (EASTERN VISAYAS)',
                'slug'          => Str::slug('REGION VIII (EASTERN VISAYAS)'),
                'label'         => 'VIII',
            ],
            [
                'id'            => 9,
                'name'          => 'REGION IX (ZAMBOANGA PENINSULA)',
                'slug'          => Str::slug('REGION IX (ZAMBOANGA PENINSULA)'),
                'label'         => 'IX',
            ],
            [
                'id'            => 10,
                'name'          => 'REGION X (NORTHERN MINDANAO)',
                'slug'          => Str::slug('REGION X (NORTHERN MINDANAO)'),
                'label'         => 'X',
            ],
            [
                'id'            => 11,
                'name'          => 'REGION XI (DAVAO REGION)',
                'slug'          => Str::slug('REGION XI (DAVAO REGION)'),
                'label'         => 'XI',
            ],
            [
                'id'            => 12,
                'name'          => 'REGION XII (SOCCSKSARGEN)',
                'slug'          => Str::slug('REGION XII (SOCCSKSARGEN)'),
                'label'         => 'XII',
            ],
            [
                'id'            => 16,
                'name'          => 'NATIONAL CAPITAL REGION (NCR)',
                'slug'          => Str::slug('NATIONAL CAPITAL REGION (NCR)'),
                'label'         => 'NCR',
            ],
            [
                'id'            => 15,
                'name'          => 'CORDILLERA ADMINISTRATIVE REGION (CAR)',
                'slug'          => Str::slug('CORDILLERA ADMINISTRATIVE REGION (CAR)'),
                'label'         => 'CAR',
            ],
            [
                'id'            => 14,
                'name'          => 'AUTONOMOUS REGION IN MUSLIM MINDANAO (ARMM)',
                'slug'          => Str::slug('AUTONOMOUS REGION IN MUSLIM MINDANAO (ARMM)'),
                'label'         => 'ARMM',
            ],
            [
                'id'            => 13,
                'name'          => 'REGION XIII (Caraga)',
                'slug'          => Str::slug('REGION XIII (Caraga)'),
                'label'         => 'XIII',
            ],
            [
                'id'            => 41,
                'name'          => 'REGION IV-B (MIMAROPA)',
                'slug'          => Str::slug('REGION IV-B (MIMAROPA)'),
                'label'         => 'IV-B',
            ],
            [
                'id'            => 99,
                'name'          => 'NO BREAKDOWN',
                'slug'          => Str::slug('NO BREAKDOWN'),
                'label'         => 'NB',
            ],
        ];

        Schema::disableForeignKeyConstraints();

        DB::table('regions')->truncate();

        DB::table('regions')->insert($seeds);

        Schema::enableForeignKeyConstraints();
    }
}
