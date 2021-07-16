<?php

namespace Database\Seeders;

use App\Models\Tracker;
use Illuminate\Database\Seeder;

class TrackersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tracker::factory()->count(50)->create();
    }
}
