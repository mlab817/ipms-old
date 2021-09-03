<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class UpdateProjectUuidSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects = Project::all();

        foreach ($projects as $project) {
            $project->uuid = nanoid();
            $project->save();
        }
    }
}
