<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ImplementationModesTableSeeder extends Seeder
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
                'id'            => 74,
                'name'          => 'Through Local Funds in accordance with RA 9184 or the Government Procurement Act',
                'slug'          => Str::slug('Through Local Funds in accordance with RA 9184 or the Government Procurement Act'),
                'description'   => ''
            ],
            [
                'id'            => 75,
                'name'          => 'Through ODA pursuant to RA 8182 or the ODA Act of 1996',
                'slug'          => Str::slug('Through ODA pursuant to RA 8182 or the ODA Act of 1996'),
                'description'   => ''
            ],
            [
                'id'            => 76,
                'name'          => 'Through PPP under the Amended BOT Law and Its IRR',
                'slug'          => Str::slug('Through PPP under the Amended BOT Law and Its IRR'),
                'description'   => ''
            ],
            [
                'id'            => 77,
                'name'          => 'Through Joint Venture Arrangement',
                'slug'          => Str::slug('Through Joint Venture Arrangement'),
                'description'   => ''
            ],
            [
                'id'            => 78,
                'name'          => 'Others',
                'slug'          => Str::slug('Others'),
                'description'   => ''
            ],
            [
                'id'            => 79,
                'name'          => 'Not Applicable',
                'slug'          => Str::slug('Not Applicable'),
                'description'   => ''
            ],
        ];

        DB::table('implementation_modes')->insert($seeds);
    }
}
