<?php

namespace Database\Seeders;

use App\Models\ProjectNotification;
use Illuminate\Database\Seeder;

class ProjectNotificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProjectNotification::factory()->count(100)->create();
    }
}
