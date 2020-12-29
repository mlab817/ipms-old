<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
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
                'uuid'          => Str::uuid(),
                'name'          => 'NG-Local',
                'description'   => '',
                'slug'          => Str::slug('NG-Local'),
            ],
            [
                'id'            => 2,
                'uuid'          => Str::uuid(),
                'name'          => 'NG-ODA Loan',
                'description'   => '',
                'slug'          => Str::slug('NG-ODA Loan'),
            ],
            [
                'id'            => 3,
                'uuid'          => Str::uuid(),
                'name'          => 'NG-ODA Grant',
                'description'   => '',
                'slug'          => Str::slug('NG-ODA Grant'),
            ],
            [
                'id'            => 4,
                'uuid'          => Str::uuid(),
                'name'          => 'GOCC/GFI',
                'description'   => '',
                'slug'          => Str::slug('GOCC/GFI'),
            ],
            [
                'id'            => 5,
                'uuid'          => Str::uuid(),
                'name'          => 'LGU',
                'description'   => '',
                'slug'          => Str::slug('LGU'),
            ],
            [
                'id'            => 6,
                'uuid'          => Str::uuid(),
                'name'          => 'Private Sector',
                'description'   => '',
                'slug'          => Str::slug('Private Sector'),
            ],
            [
                'id'            => 7,
                'uuid'          => Str::uuid(),
                'name'          => 'Others',
                'description'   => '',
                'slug'          => Str::slug('Others'),
            ],
            [
                'id'            => 8,
                'uuid'          => Str::uuid(),
                'name'          => 'TBD',
                'description'   => 'To be determined',
                'slug'          => Str::slug('TBD'),
            ],
        ];
    }
}
