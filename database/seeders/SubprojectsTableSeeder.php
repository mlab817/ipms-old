<?php

namespace Database\Seeders;

use App\Models\Subproject;
use Illuminate\Database\Seeder;

class SubprojectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subproject::factory()->count(1)->create();
    }
}
