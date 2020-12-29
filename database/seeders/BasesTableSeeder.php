<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BasesTableSeeder extends Seeder
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
                'name'          => 'National Expenditure Program (NEP)',
                'uuid'          => Str::uuid(),
                'slug'          => Str::slug('National Expenditure Program (NEP)'),
                'description'   => ''
            ],
            [
                'id'            => 2,
                'name'          => 'General Appropriations Act (GAA)',
                'uuid'          => Str::uuid(),
                'slug'          => Str::slug('General Appropriations Act (GAA)'),
                'description'   => ''
            ],
            [
                'id'            => 3,
                'name'          => 'Multi-Year Obligational Authority (MYOA)/Multi-Year Contracting Authority(MYCA)',
                'uuid'          => Str::uuid(),
                'slug'          => Str::slug('Multi-Year Obligational Authority (MYOA)/Multi-Year Contracting Authority(MYCA)'),
                'description'   => ''
            ],
            [
                'id'            => 4,
                'name'          => 'List of Regional Development Council-endorsed projects',
                'uuid'          => Str::uuid(),
                'slug'          => Str::slug('List of Regional Development Council-endorsed projects'),
                'description'   => ''
            ],
            [
                'id'            => 5,
                'name'          => 'Signed Agreements (e.g. Peace agreements)',
                'uuid'          => Str::uuid(),
                'slug'          => Str::slug('Signed Agreements (e.g. Peace agreements)'),
                'description'   => ''
            ],
            [
                'id'            => 6,
                'name'          => 'Existing laws, rules or regulations.',
                'uuid'          => Str::uuid(),
                'slug'          => Str::slug('Existing laws, rules or regulations.'),
                'description'   => ''
            ],
            [
                'id'            => 7,
                'name'          => 'Regular program (e.g. part of PAMANA, HFEP, etc.)',
                'uuid'          => Str::uuid(),
                'slug'          => Str::slug('Regular program (e.g. part of PAMANA, HFEP, etc.)'),
                'description'   => ''
            ],
        ];

        DB::table('bases')->insert($seeds);
    }
}
