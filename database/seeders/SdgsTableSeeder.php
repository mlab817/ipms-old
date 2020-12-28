<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SdgsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sdgs = [
            [
                'id'            => 1,
                'name'          => 'No Poverty',
                'description'   => 'End poverty in all its forms everywhere',
            ],
            [
                'id'            => 2,
                'name'          => 'Zero Hunger',
                'description'   => 'End hunger, achieve food security and improved nutrition and promote sustainable agriculture',
            ],
            [
                'id'            => 3,
                'name'          => 'Good Health and Well-Being',
                'description'   => 'Ensure healthy lives and promote well-being for all at all ages',
            ],
            [
                'id'            => 4,
                'name'          => 'Quality Education',
                'description'   => 'Ensure inclusive and equitable quality education and promote lifelong learning opportunities for all',
            ],
        ];

        foreach ($sdgs as $sdg) {
            DB::table('sdgs')->insert([
                'id'            => $sdg['id'],
                'name'          => $sdg['name'],
                'uuid'          => Str::uuid(),
                'slug'          => Str::slug($sdg['name']),
                'description'   => $sdg['description'],
            ]);
        }
    }
}
