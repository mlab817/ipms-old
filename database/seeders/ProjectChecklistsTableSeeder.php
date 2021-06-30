<?php

namespace Database\Seeders;

use App\Models\Checklist;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProjectChecklistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects = Project::all();
        $checklists = Checklist::all();

        foreach ($projects as $project) {
            foreach ($checklists as $checklist) {
                $project->project_checklists()->create([
                    'checklist_id'  => $checklist->id,
                    'checked'       => random_int(0,1),
                ]);
            }
        }
    }
}
