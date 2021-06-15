<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubmissionStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeds = [
            'Draft',
            'Endorsed',
            'Dropped',
        ];

        foreach ($seeds as $item) {
            DB::table('submission_statuses')->insert([
                'name' => $item,
            ]);
        }
    }
}
