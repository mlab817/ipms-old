<?php

namespace Database\Seeders;

use App\Models\PipolStatus;
use Illuminate\Database\Seeder;

class PipolStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeds = [
            'Encoded',
            'Endorsed',
        ];

        foreach ($seeds as $seed) {
            PipolStatus::create([
                'name' => $seed
            ]);
        }
    }
}
