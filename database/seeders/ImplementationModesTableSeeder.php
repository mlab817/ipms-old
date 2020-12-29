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
                'id'            => 1,
                'name'          => 'Through Local Funds in accordance with RA 9184 or the Government Procurement Act',
                'uuid'          => Str::uuid(),
                'slug'          => Str::slug('Through Local Funds in accordance with RA 9184 or the Government Procurement Act'),
                'description'   => ''
            ],
            [
                'id'            => 2,
                'name'          => 'Through ODA pursuant to RA 8182 or the ODA Act of 1996',
                'uuid'          => Str::uuid(),
                'slug'          => Str::slug('Through ODA pursuant to RA 8182 or the ODA Act of 1996'),
                'description'   => ''
            ],
            [
                'id'            => 3,
                'name'          => 'Through PPP under the Amended BOT Law and Its IRR',
                'uuid'          => Str::uuid(),
                'slug'          => Str::slug('Through PPP under the Amended BOT Law and Its IRR'),
                'description'   => ''
            ],
            [
                'id'            => 4,
                'name'          => 'Through Joint Venture Arrangement',
                'uuid'          => Str::uuid(),
                'slug'          => Str::slug('Through Joint Venture Arrangement'),
                'description'   => ''
            ],
            [
                'id'            => 5,
                'name'          => 'Others',
                'uuid'          => Str::uuid(),
                'slug'          => Str::slug('Others'),
                'description'   => ''
            ],
            [
                'id'            => 6,
                'name'          => 'Not Applicable',
                'uuid'          => Str::uuid(),
                'slug'          => Str::slug('Not Applicable'),
                'description'   => ''
            ],
        ];

        DB::table('implementation_modes')->insert($seeds);
    }
}
