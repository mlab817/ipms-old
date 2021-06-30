<?php

namespace Tests\Feature;

use App\Services\ProjectCheckCompletionService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Project;
use Tests\TestCase;

class CalculateChecklistComplianceServiceTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_it_checks_compliance()
    {
        $project = Project::factory()->create();

        (new ProjectCheckCompletionService($project->id))->calculateChecklistCompliance();

        $this->assertDatabaseHas('project_checklists',[
            'project_id'    => $project->id,
            'checklist_id'  => 1,
            'checked'       => 1,
            'comments'      => '',
        ]);
        $this->assertDatabaseHas('project_checklists',[
            'project_id'    => $project->id,
            'checklist_id'  => 2, // description
            'checked'       => 1,
            'comments'      => '',
        ]);
        $this->assertDatabaseHas('project_checklists',[
            'project_id'    => $project->id,
            'checklist_id'  => 3, // bases
            'checked'       => 0,
            'comments'      => 'No implementation basis is selected',
        ]);
    }
}
