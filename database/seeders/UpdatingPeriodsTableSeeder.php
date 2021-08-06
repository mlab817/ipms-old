<?php

namespace Database\Seeders;

use App\Models\PipolStatus;
use App\Models\Project;
use App\Models\UpdatingPeriod;
use Illuminate\Database\Seeder;

class UpdatingPeriodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeds = [
            '2021 Updating of PIP as input to FY 2022 Plan and Budget',
            '2021 Updating of TRIP as input to FY 2023 Plan and Budget',
        ];

        foreach ($seeds as $seed) {
            UpdatingPeriod::create([
                'name' => $seed
            ]);
        }

         Project::whereNull('deleted_at')->update([
            'updating_period_id' => 1,
        ]);

        $projects = Project::all();

        foreach ($projects as $project) {
            $project->update(['project_id' => $project->id]);
        }
    }
}
