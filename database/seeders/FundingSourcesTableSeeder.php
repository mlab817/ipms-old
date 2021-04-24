<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FundingSourcesTableSeeder extends Seeder
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
                'name'          => 'NG-Local',
                'description'   => '',
                'slug'          => Str::slug('NG-Local'),
            ],
            [
                'id'            => 2,
                'name'          => 'NG-ODA Loan',
                'description'   => '',
                'slug'          => Str::slug('NG-ODA Loan'),
            ],
            [
                'id'            => 3,
                'name'          => 'NG-ODA Grant',
                'description'   => '',
                'slug'          => Str::slug('NG-ODA Grant'),
            ],
            [
                'id'            => 4,
                'name'          => 'GOCC/GFI',
                'description'   => '',
                'slug'          => Str::slug('GOCC/GFI'),
            ],
            [
                'id'            => 5,
                'name'          => 'LGU',
                'description'   => '',
                'slug'          => Str::slug('LGU'),
            ],
            [
                'id'            => 6,
                'name'          => 'Private Sector',
                'description'   => '',
                'slug'          => Str::slug('Private Sector'),
            ],
            [
                'id'            => 7,
                'name'          => 'Others',
                'description'   => '',
                'slug'          => Str::slug('Others'),
            ],
            [
                'id'            => 8,
                'name'          => 'TBD',
                'description'   => 'To be determined',
                'slug'          => Str::slug('TBD'),
            ],
        ];

        DB::table('funding_sources')->insert($seeds);
    }
}
