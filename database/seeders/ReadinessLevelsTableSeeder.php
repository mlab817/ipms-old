<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ReadinessLevelsTableSeeder extends Seeder
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
                'name'          => 'Level 1 CIP',
                'slug'          => Str::slug('Level 1 CIP'),
                'description'   => 'With approval of appropriate approving body but not yet ongoing.'
            ],
            [
                'id'            => 2,
                'uuid'          => Str::uuid(),
                'name'          => 'Level 2 CIP',
                'slug'          => Str::slug('Level 2 CIP'),
                'description'   => 'With project preparation document completed, for ICC processing in 2018 and/or 2019,  included in the NEP for FY 2019 or for inclusion in NEP for FY 2020.'
            ],
            [
                'id'            => 3,
                'uuid'          => Str::uuid(),
                'name'          => 'Level 3 CIP',
                'slug'          => Str::slug('Level 3 CIP'),
                'description'   => 'With project preparation document currently being prepared and to be completed in 2019, for ICC processing in 2020 and/or for inclusion in the NEP for FY 2021.'
            ],
            [
                'id'            => 4,
                'uuid'          => Str::uuid(),
                'name'          => 'Level 4 CIP',
                'slug'          => Str::slug('Level 4 CIP'),
                'description'   => 'With project preparation document for completion in 2020, for ICC processing in 2021 and/or for inclusion in the NEP for FY 2022.'
            ],
            [
                'id'            => 5,
                'uuid'          => Str::uuid(),
                'name'          => 'Level 1 Non-CIP',
                'slug'          => Str::slug('Level 1 Non-CIP'),
                'description'   => 'With NEDA Board and/or ICC project approval but not yet ongoing.'
            ],
            [
                'id'            => 6,
                'uuid'          => Str::uuid(),
                'name'          => 'Level 2 Non-CIP',
                'slug'          => Str::slug('Level 2 Non-CIP'),
                'description'   => 'With project preparation document completed, for ICC processing in 2018 and/or 2019,  included in the NEP for FY 2019 or for inclusion in NEP for FY 2020.'
            ],
            [
                'id'            => 7,
                'uuid'          => Str::uuid(),
                'name'          => 'Level 3 Non-CIP',
                'slug'          => Str::slug('Level 3 Non-CIP'),
                'description'   => 'With project preparation document currently being prepared and to be completed in 2019, for ICC processing in 2020 and/or for inclusion in the NEP for FY 2021.'
            ],
            [
                'id'            => 8,
                'uuid'          => Str::uuid(),
                'name'          => 'Level 4 Non-CIP',
                'slug'          => Str::slug('Level 4 Non-CIP'),
                'description'   => 'With project preparation document for completion in 2020, for ICC processing in 2021 and/or for inclusion in the NEP for FY 2022.'
            ],
        ];

        DB::table('readiness_levels')->insert($seeds);
    }
}
