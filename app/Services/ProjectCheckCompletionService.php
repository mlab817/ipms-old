<?php

namespace App\Services;

use App\Models\Project;

class ProjectCheckCompletionService
{
    public $project;

    public function __construct(int $projectId)
    {
        $this->project = Project::find($projectId);
    }

    public function calculateChecklistCompliance()
    {
        $project = $this->project;
        // Title is provided
        $project->project_checklists()->updateOrCreate([
            'checklist_id' => 1
        ],[
            'checked' => $project->title ? 1 : 0,
            'comments' => $project->title ? '' : 'PAP title is missing',
        ]);
        // PAP Type is selected
        $project->project_checklists()->updateOrCreate([
            'checklist_id' => 2
        ],[
            'checked' => $project->pap_type_id ? 1 : 0,
            'comments' => $project->pap_type_id ? '' : 'PAP type is not selected',
        ]);
        // Basis for implementation is selected
        $project->project_checklists()->updateOrCreate([
            'checklist_id' => 3,
        ],[
            'checked' => $project->bases->count() > 1 ? 1 : 0,
            'comments' => $project->bases->count() > 1 ? '' : 'No implementation basis is selected',
        ]);

        // TODO: Complete all other checks
        // Description is provided
        $project->project_checklists()->updateOrCreate([],[]);
        // Expected outputs is provided
        $project->project_checklists()->updateOrCreate([],[]);
        // Total Project Cost is provided and consistent with breakdown
        $project->project_checklists()->updateOrCreate([],[]);
        // Spatial Coverage is selected
        $project->project_checklists()->updateOrCreate([],[]);
        // Regions are properly selected
        $project->project_checklists()->updateOrCreate([],[]);
        // Implementation period is provided
        $project->project_checklists()->updateOrCreate([],[]);
        // ICCable fields are complied
        $project->project_checklists()->updateOrCreate([],[]);
        // RDIP fields are complied
        $project->project_checklists()->updateOrCreate([],[]);
        // Preparation details are complete
        $project->project_checklists()->updateOrCreate([],[]);
        // Generated employment is provided
        $project->project_checklists()->updateOrCreate([],[]);
        // PDP information supplied
        $project->project_checklists()->updateOrCreate([],[]);
        // SDGs are selected
        $project->project_checklists()->updateOrCreate([],[]);
        // Ten point agenda are selected
        $project->project_checklists()->updateOrCreate([],[]);
        // Financial information are complete
        $project->project_checklists()->updateOrCreate([],[]);
        // Updates are provided
        $project->project_checklists()->updateOrCreate([],[]);
        // Breakdown of funding source is provided
        $project->project_checklists()->updateOrCreate([],[]);
        // Breakdown by region is provided
        $project->project_checklists()->updateOrCreate([],[]);
        // TRIP information are provided
        $project->project_checklists()->updateOrCreate([],[]);
        // TRIP breakdown of funding source are provided
        $project->project_checklists()->updateOrCreate([],[]);
        // TRIP breakdown of region are provided
        $project->project_checklists()->updateOrCreate([],[]);
        // Financial Accomplishments are provided
        $project->project_checklists()->updateOrCreate([],[]);
    }
}
