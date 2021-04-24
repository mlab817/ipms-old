<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FundingInstitutionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeds = [
            'Australia',
            'Austria',
            'China',
            'Japan',
            'Japan International Cooperation Agency',
            'Korea',
            'Korea International Cooperation Agency',
            'Korea Eximbank Resident Mission / Economic Development Cooperation Fund',
            'New Zealand',
            'Saudi Arabia',
            'Saudi Fund for Development',
            'Belgium',
            'Canada',
            'Denmark',
            'European Union',
            'European Investment Bank',
            'France',
            'French Development Agency Philippine',
            'Germany',
            'Germany Agency for International Cooperation',
            'German Development Bank',
            'Federal Ministry for Economic Cooperation and Development',
            'Hungary',
            'Italy',
            'Netherlands',
            'Norway',
            'Nordic Investment Bank',
            'Poland',
            'Spain',
            'Agencia Espanola de Cooperation International para el Desarollo',
            'Sweden / Swedish International Development Cooperation Agency',
            'Switzerland',
            'United Kingdom',
            'United States',
            'United States Agency for International Development',
            'Asian Development Bank',
            'World Bank',
            'United Nations Coordination Office',
            'Food and Agriculture Organization',
            'United Nations Development Programme',
            'United Nations Industrial Development Organization',
            'United Nations Population Fund',
            'International Fund for Agricultural Development',
            'International Labor Organization',
            'United Nations Children\'s Fund',
            'International Atomic Energy Agency',
            'OPEC Fund for International Development',
            'World Food Programme',
            'World Health Organization',
            'To be determined',
            'Others',
        ];

        foreach ($seeds as $seed) {
            DB::table('funding_institutions')->insert([
                'name'          => $seed,
                'slug'          => Str::slug($seed),
            ]);
        }
    }
}
