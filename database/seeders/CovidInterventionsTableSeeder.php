<?php

namespace Database\Seeders;

use App\Models\CovidIntervention;
use Illuminate\Database\Seeder;

class CovidInterventionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeds = [
            'Republic Act 11469 Bayanihan To Heal As One Act',
            'Republic Act 11494 Bayanihan to Recover As One Act',
            'Socioeconomic Strategy Against COVID-19 Pillar I: Emergency support for vulnerable groups',
            'Socioeconomic Strategy Against COVID-19 Pillar II: Marshalling resources to fight COVID-19',
            'Socioeconomic Strategy Against COVID-19 Pillar III: Monetary actions and other financing support',
            'Socioeconomic Strategy Against COVID-19 Pillar IV: An economic recovery program to create jobs and sustain growth',
            'We Recover as One report'
        ];

        foreach ($seeds as $seed) {
            CovidIntervention::create([
                'name' => $seed,
            ]);
        }
    }
}
