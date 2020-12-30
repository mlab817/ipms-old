<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PrerequisitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeds = [
            'Pre-Feasibility Study/Business Case',
            'Feasibility Study',
            'Level of Approval',
            'Right-of-Way Acquisition',
            'Resettlement Action Plan',
            'Environmental Compliance Certificate',
            'RDC Endorsement',
            'Detailed Engineering Design',
            'Other Pre-Investment Activities',
        ];

        foreach ($seeds as $seed) {
            DB::table('prerequisites')->insert([
                'uuid'          => Str::uuid(),
                'name'          => $seed,
                'slug'          => Str::slug($seed),
            ]);
        }
    }
}
