<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ApprovalLevelsTableSeeder extends Seeder
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
                'name'          => 'Yet to be submitted to the NEDA Secretariat',
                'slug'          => Str::slug('Yet to be submitted to the NEDA Secretariat'),
                'description'   => '',
            ],
            [
                'id'            => 2,
                'name'          => 'Under the NEDA Secretariat Review',
                'slug'          => Str::slug('Under the NEDA Secretariat Review'),
                'description'   => '',
            ],
            [
                'id'            => 3,
                'name'          => 'ICC-TB Endorsed',
                'slug'          => Str::slug('ICC-TB Endorsed'),
                'description'   => '',
            ],
            [
                'id'            => 4,
                'name'          => 'ICC-CC Approved',
                'slug'          => Str::slug('ICC-CC Approved'),
                'description'   => '',
            ],
            [
                'id'            => 5,
                'name'          => 'NEDA Board Confirmed',
                'slug'          => Str::slug('NEDA Board Confirmed'),
                'description'   => '',
            ],
            [
                'id'            => 6,
                'name'          => 'Not Applicable',
                'slug'          => Str::slug('Not Applicable'),
                'description'   => '',
            ],
        ];

        DB::table('approval_levels')->insert($seeds);
    }
}
