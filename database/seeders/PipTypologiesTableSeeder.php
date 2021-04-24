<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PipTypologiesTableSeeder extends Seeder
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
                'name'          => 'Capital Investment Program and Project',
                'slug'          => Str::slug('Capital Investment Program and Project'),
                'description'   => ''
            ],
            [
                'id'            => 2,
                'name'          => 'Technical Assistance Program/Project (such as Research and Development, Institutional Development, Human Resource Capacity Building, or System/Process Improvement PAPs)',
                'slug'          => Str::slug('Technical Assistance Program/Project (such as Research and Development, Institutional Development, Human Resource Capacity Building, or System/Process Improvement PAPs)'),
                'description'   => ''
            ],
            [
                'id'            => 3,
                'name'          => 'Relending Program/Project of GFIs to LGUs and Targets Beneficiary',
                'slug'          => Str::slug('Relending Program/Project of GFIs to LGUs and Targets Beneficiary'),
                'description'   => ''
            ],
            [
                'id'            => 4,
                'name'          => 'Government Facilities',
                'slug'          => Str::slug('Government Facilities'),
                'description'   => ''
            ],
            [
                'id'            => 5,
                'name'          => 'Not Applicable',
                'slug'          => Str::slug('Not Applicable'),
                'description'   => ''
            ],
        ];

        DB::table('pip_typologies')->insert($seeds);
    }
}
