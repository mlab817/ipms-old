<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_projects_index()
    {
        $response = $this
            ->actingAs($this->user)
            ->get(route('projects.index'));

        $response->assertStatus(200);

        $response->assertSee('Projects');
    }

    public function test_projects_create()
    {
        $this->user->givePermissionTo('projects.create');

        $response = $this
            ->actingAs($this->user)
            ->get(route('projects.create'));

        $response->assertStatus(200);

        $response->assertSee('Add New PAP');
    }

    public function test_projects_store_validate()
    {
        $this->user->givePermissionTo('projects.create');

        $response = $this
            ->actingAs($this->user)
            ->post(route('projects.store'), []);

        $response->assertStatus(302);

        $response->assertSessionHas('errors');
        $response->assertSessionHasErrors([
            'office_id',
            'title',
            'pap_type_id',
            'has_infra',
//            'has_subprojects',
            'regular_program',
            'description',
            'bases',
            'expected_outputs',
            'total_project_cost',
            'project_status_id',
            'operating_units',
            'research',
            'ict',
            'covid',
//            'covid_interventions',
            'spatial_coverage_id',
            'regions',
            'target_start_year',
            'target_end_year',
            'iccable',
//            'approval_level_id',
//            'approval_level_date',
//            'gad_id',
            'rdip',
//            'rdc_endorsement_required',
//            'rdc_endorsed',
//            'rdc_endorsed_date',
            'preparation_document_id',
            'has_fs',
//            'feasibility_study',
        ]);
    }
}
