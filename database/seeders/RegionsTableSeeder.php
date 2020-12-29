<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
                'uuid'          => Str::uuid(),
                'name'          => 'REGION I (ILOCOS REGION)',
                'slug'          => Str::slug('REGION I (ILOCOS REGION)'),
            ],
            [
                'id'            => 2,
                'uuid'          => Str::uuid(),
                'name'          => 'REGION II (CAGAYAN VALLEY)',
                'slug'          => Str::slug('REGION II (CAGAYAN VALLEY)'),
            ],
            [
                'id'            => 3,
                'uuid'          => Str::uuid(),
                'name'          => 'REGION III (CENTRAL LUZON)',
                'slug'          => Str::slug('REGION III (CENTRAL LUZON)'),
            ],
            [
                'id'            => 4,
                'uuid'          => Str::uuid(),
                'name'          => 'REGION IV-A (CALABARZON)',
                'slug'          => Str::slug('REGION IV-A (CALABARZON)'),
            ],
            [
                'id'            => 5,
                'uuid'          => Str::uuid(),
                'name'          => 'REGION V (BICOL REGION)',
                'slug'          => Str::slug('REGION V (BICOL REGION)'),
            ],
            [
                'id'            => 6,
                'uuid'          => Str::uuid(),
                'name'          => 'REGION VI (WESTERN VISAYAS)',
                'slug'          => Str::slug('REGION VI (WESTERN VISAYAS)'),
            ],
            [
                'id'            => 7,
                'uuid'          => Str::uuid(),
                'name'          => 'REGION VII (CENTRAL VISAYAS)',
                'slug'          => Str::slug('REGION VII (CENTRAL VISAYAS)'),
            ],
            [
                'id'            => 8,
                'uuid'          => Str::uuid(),
                'name'          => 'REGION VIII (EASTERN VISAYAS)',
                'slug'          => Str::slug('REGION VIII (EASTERN VISAYAS)'),
            ],
            [
                'id'            => 9,
                'uuid'          => Str::uuid(),
                'name'          => 'REGION IX (ZAMBOANGA PENINSULA)',
                'slug'          => Str::slug('REGION IX (ZAMBOANGA PENINSULA)'),
            ],
            [
                'id'            => 10,
                'uuid'          => Str::uuid(),
                'name'          => 'REGION X (NORTHERN MINDANAO)',
                'slug'          => Str::slug('REGION X (NORTHERN MINDANAO)'),
            ],
            [
                'id'            => 11,
                'uuid'          => Str::uuid(),
                'name'          => 'REGION XI (DAVAO REGION)',
                'slug'          => Str::slug('REGION XI (DAVAO REGION)'),
            ],
            [
                'id'            => 12,
                'uuid'          => Str::uuid(),
                'name'          => 'REGION XII (SOCCSKSARGEN)',
                'slug'          => Str::slug('REGION XII (SOCCSKSARGEN)'),
            ],
            [
                'id'            => 13,
                'uuid'          => Str::uuid(),
                'name'          => 'NATIONAL CAPITAL REGION (NCR)',
                'slug'          => Str::slug('NATIONAL CAPITAL REGION (NCR)'),
            ],
            [
                'id'            => 14,
                'uuid'          => Str::uuid(),
                'name'          => 'CORDILLERA ADMINISTRATIVE REGION (CAR)',
                'slug'          => Str::slug('CORDILLERA ADMINISTRATIVE REGION (CAR)'),
            ],
            [
                'id'            => 15,
                'uuid'          => Str::uuid(),
                'name'          => 'AUTONOMOUS REGION IN MUSLIM MINDANAO (ARMM)',
                'slug'          => Str::slug('AUTONOMOUS REGION IN MUSLIM MINDANAO (ARMM)'),
            ],
            [
                'id'            => 16,
                'uuid'          => Str::uuid(),
                'name'          => 'REGION XIII (Caraga)',
                'slug'          => Str::slug('REGION XIII (Caraga)'),
            ],
            [
                'id'            => 17,
                'uuid'          => Str::uuid(),
                'name'          => 'REGION IV-B (MIMAROPA)',
                'slug'          => Str::slug('REGION IV-B (MIMAROPA)'),
            ],
        ];

        DB::table('regions')->insert($seeds);
    }
}
