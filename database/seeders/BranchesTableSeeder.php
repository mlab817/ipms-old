<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\Project;
use Illuminate\Database\Seeder;

class BranchesTableSeeder extends Seeder
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
                'name' => '2021 Updating of PIP as input to FY 2022 Plan and Budget',
                'label' => 'pip-2021'
            ],
            [
                'name' => '2021 Updating of TRIP as input to FY 2023 Plan and Budget',
                'label' => 'trip-2021',
            ],
        ];

        foreach ($seeds as $seed) {
            Branch::create([
                'name' => $seed['name'],
                'label' => $seed['label']
            ]);
        }

         Project::whereNull('deleted_at')->update([
            'branch_id' => 1,
        ]);
    }
}
