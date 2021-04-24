<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CipTypesTableSeeder extends Seeder
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
                'name'          => 'Locally-funded major capital programs/projects with total project cost of at least PhP2.5 billion',
                'slug'          => Str::slug('Locally-funded major capital programs/projects with total project cost of at least PhP2.5 billion'),
                'description'   => ''
            ],
            [
                'id'            => 2,
                'name'          => 'ODA-assisted grant with total project cost of at least PhP2.5 billion',
                'slug'          => Str::slug('ODA-assisted grant with total project cost of at least PhP2.5 billion'),
                'description'   => ''
            ],
            [
                'id'            => 3,
                'name'          => 'ODA-assisted loan regardless of amount that requires national government guarantee',
                'slug'          => Str::slug('ODA-assisted loan regardless of amount that requires national government guarantee'),
                'description'   => ''
            ],
            [
                'id'            => 4,
                'name'          => 'Relending activities to LGUs and other target beneficiaries with total project cost of at least PhP 2.5 billion',
                'slug'          => Str::slug('Relending activities to LGUs and other target beneficiaries with total project cost of at least PhP 2.5 billion'),
                'description'   => ''
            ],
            [
                'id'            => 5,
                'name'          => 'Solicited national PPP projects',
                'slug'          => Str::slug('Solicited national PPP projects'),
                'description'   => ''
            ],
            [
                'id'            => 6,
                'name'          => 'Joint Venture (JV) Agreement with government contribution amounting of at least PhP150 million',
                'slug'          => Str::slug('Joint Venture (JV) Agreement with government contribution amounting of at least PhP150 million'),
                'description'   => ''
            ],
            [
                'id'            => 7,
                'name'          => 'Administrative buildings with total project cost of at least PhP1 billion',
                'slug'          => Str::slug('Administrative buildings with total project cost of at least PhP1 billion'),
                'description'   => ''
            ],
            [
                'id'            => 8,
                'name'          => 'Not Applicable',
                'slug'          => Str::slug('Not Applicable'),
                'description'   => ''
            ],
        ];

        DB::table('cip_types')->insert($seeds);
    }
}
