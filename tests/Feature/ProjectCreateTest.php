<?php

namespace Tests\Feature;

use App\Models\ApprovalLevel;
use App\Models\Basis;
use App\Models\CovidIntervention;
use App\Models\FsStatus;
use App\Models\FundingInstitution;
use App\Models\FundingSource;
use App\Models\Gad;
use App\Models\ImplementationMode;
use App\Models\Office;
use App\Models\OperatingUnit;
use App\Models\PapType;
use App\Models\PdpChapter;
use App\Models\PdpIndicator;
use App\Models\Project;
use App\Models\ProjectStatus;
use App\Models\Region;
use App\Models\Sdg;
use App\Models\SpatialCoverage;
use App\Models\TenPointAgenda;
use App\Models\Tier;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use function RingCentral\Psr7\str;

class ProjectCreateTest extends TestCase
{
    use WithFaker;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_it_stores_project_and_redirects_to_show_project()
    {
//        $this->withoutExceptionHandling();
        $data = $this->testProjectData;

        $response = $this
            ->actingAs($this->user)
            ->post(route('projects.store'), $data);

        $response->assertStatus(302);

        $response->assertSessionHasNoErrors();

        $this->assertDatabaseHas('projects', [
            'title' => $data['title']
        ]);

        $project = Project::where('title', $data['title'])->first();

        $response->assertRedirect(route('projects.show', $project));
    }

    public function test_correct_fields_are_required_to_create_project()
    {
        $this
            ->actingAs($this->user)
            ->post(route('projects.store'), [])
            ->assertStatus(302)
            ->assertSessionHas('errors')
            ->assertSessionHasErrors([
                'title',
                'pap_type_id',
                'office_id',
                'title',
                'pap_type_id',
                'regular_program',
                'has_infra',
                'bases',
                'description',
                'expected_outputs',
                'total_project_cost',
                'project_status_id',
                'spatial_coverage_id',
                'regions',
                'rdip',
//                'rdc_endorsement_required',
//                'rdc_endorsed',
//                'rdc_endorsed_date',
                'iccable',
//                'approval_level_id',
//                'approval_date',
//                'gad_id',
                'pdp_chapter_id',
//                'no_pdp_indicator',
                'target_start_year',
                'target_end_year',
                'has_fs',
//                'feasibility_study',
//                'employment_generated',
                'funding_source_id',
                'implementation_mode_id',
//                'other_fs',
                'updates',
                'updates_date',
//                'uacs_code',
                'tier_id',
                'funding_sources',
//                'funding_institution_id',
                'operating_units',
                'pdp_chapters',
//                'prerequisites',
//                'sdgs',
//                'pdp_indicators',
//                'ten_point_agendas',
//                'nep',
//                'allocation',
//                'disbursement',
//                'region_investments',
//                'fs_investments',
//                'has_subprojects',
                'ict',
                'covid',
//                'covid_interventions',
                'research',
            ]);
    }
}
