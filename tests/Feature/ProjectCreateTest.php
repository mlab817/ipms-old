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

    public function getTestData()
    {
        $region_investments = [];
        foreach (Region::all() as $item) {
            array_push($region_investments, [
                'region_id' => $item->id,
                'y2016'                 => $this->faker->numberBetween(0, 1000) * 1000,
                'y2017'                 => $this->faker->numberBetween(0, 1000) * 1000,
                'y2018'                 => $this->faker->numberBetween(0, 1000) * 1000,
                'y2019'                 => $this->faker->numberBetween(0, 1000) * 1000,
                'y2020'                 => $this->faker->numberBetween(0, 1000) * 1000,
                'y2021'                 => $this->faker->numberBetween(0, 1000) * 1000,
                'y2022'                 => $this->faker->numberBetween(0, 1000) * 1000,
                'y2023'                 => $this->faker->numberBetween(0, 1000) * 1000,
                'y2024'                 => $this->faker->numberBetween(0, 1000) * 1000,
                'y2025'                 => $this->faker->numberBetween(0, 1000) * 1000,
            ]);
        }
        $fs_investments = [];
        foreach (FundingSource::all() as $item) {
            array_push($fs_investments, [
                'fs_id'                 => $item->id,
                'y2016'                 => $this->faker->numberBetween(0, 1000) * 1000,
                'y2017'                 => $this->faker->numberBetween(0, 1000) * 1000,
                'y2018'                 => $this->faker->numberBetween(0, 1000) * 1000,
                'y2019'                 => $this->faker->numberBetween(0, 1000) * 1000,
                'y2020'                 => $this->faker->numberBetween(0, 1000) * 1000,
                'y2021'                 => $this->faker->numberBetween(0, 1000) * 1000,
                'y2022'                 => $this->faker->numberBetween(0, 1000) * 1000,
                'y2023'                 => $this->faker->numberBetween(0, 1000) * 1000,
                'y2024'                 => $this->faker->numberBetween(0, 1000) * 1000,
                'y2025'                 => $this->faker->numberBetween(0, 1000) * 1000,
            ]);
        }
        return [
            'office_id'                 => Office::all()->random()->id,
            'title'                     => substr($this->faker->paragraph, 0, 255),
            'pap_type_id'               => PapType::all()->random()->id,
            'regular_program'           => $this->faker->boolean,
            'has_infra'                 => $this->faker->boolean,
            'bases'                     => Basis::all()->random(3)->pluck('id'),
            'description'               => $this->faker->paragraph,
            'expected_outputs'          => $this->faker->paragraph,
            'total_project_cost'        => $this->faker->randomFloat() * 1000,
            'project_status_id'         => ProjectStatus::all()->random()->id,
            'spatial_coverage_id'       => SpatialCoverage::all()->random()->id,
            'regions'                   => Region::all()->random(2)->pluck('id'),
            'rdip'                      => $this->faker->boolean,
            'rdc_endorsement_required'  => $this->faker->boolean,
            'rdc_endorsed'              => $this->faker->boolean,
            'rdc_endorsed_date'         => $this->faker->date('Y-m-d'),
            'iccable'                   => $this->faker->boolean,
            'approval_level_id'         => ApprovalLevel::all()->random()->id,
            'approval_date'             => $this->faker->date('Y-m-d'),
            'gad_id'                    => Gad::all()->random()->id,
            'pdp_chapter_id'            => PdpChapter::all()->random()->id,
            'no_pdp_indicator'          => $this->faker->boolean,
            'target_start_year'         => $this->faker->numberBetween(2016,2020),
            'target_end_year'           => $this->faker->numberBetween(2020,2023),
            'has_fs'                    => $this->faker->boolean,
            'feasibility_study'         => [
                'fs_status_id'          => FsStatus::all()->random()->id,
                'needs_assistance'      => $this->faker->boolean,
                'y2016'                 => $this->faker->numberBetween(0, 1000) * 1000,
                'y2017'                 => $this->faker->numberBetween(0, 1000) * 1000,
                'y2018'                 => $this->faker->numberBetween(0, 1000) * 1000,
                'y2019'                 => $this->faker->numberBetween(0, 1000) * 1000,
                'y2020'                 => $this->faker->numberBetween(0, 1000) * 1000,
                'y2021'                 => $this->faker->numberBetween(0, 1000) * 1000,
                'y2022'                 => $this->faker->numberBetween(0, 1000) * 1000,
                'y2023'                 => $this->faker->numberBetween(0, 1000) * 1000,
                'y2024'                 => $this->faker->numberBetween(0, 1000) * 1000,
                'y2025'                 => $this->faker->numberBetween(0, 1000) * 1000,
                'completion_date'       => $this->faker->date('Y-m-d'),
            ],
            'employment_generated'      => (string) $this->faker->randomDigit,
            'funding_source_id'         => FundingSource::all()->random()->id,
            'implementation_mode_id'    => ImplementationMode::all()->random()->id,
            'other_fs'                  => $this->faker->sentence,
            'updates'                   => $this->faker->paragraph,
            'updates_date'              => $this->faker->date('Y-m-d'),
            'uacs_code'                 => $this->faker->isbn10,
            'tier_id'                   => Tier::all()->random()->id,
            'funding_sources'           => FundingSource::all()->random(2)->pluck('id'),
            'funding_institution_id'    => FundingInstitution::all()->random()->id,
            'operating_units'           => OperatingUnit::all()->random(10)->pluck('id'),
            'pdp_chapters'              => PdpChapter::all()->random(2)->pluck('id'),
            'sdgs'                      => Sdg::all()->random(2)->pluck('id'),
            'pdp_indicators'            => PdpIndicator::all()->random(2)->pluck('id'),
            'ten_point_agendas'         => TenPointAgenda::all()->random(2)->pluck('id'),
            'nep'              => [
                'y2016'                 => $this->faker->numberBetween(0, 10000) * 1000,
                'y2017'                 => $this->faker->numberBetween(0, 10000) * 1000,
                'y2018'                 => $this->faker->numberBetween(0, 10000) * 1000,
                'y2019'                 => $this->faker->numberBetween(0, 10000) * 1000,
                'y2020'                 => $this->faker->numberBetween(0, 10000) * 1000,
                'y2021'                 => $this->faker->numberBetween(0, 10000) * 1000,
                'y2022'                 => $this->faker->numberBetween(0, 10000) * 1000,
                'y2023'                 => $this->faker->numberBetween(0, 10000) * 1000,
            ],
            'allocation'              => [
                'y2016'                 => $this->faker->numberBetween(0, 10000) * 1000,
                'y2017'                 => $this->faker->numberBetween(0, 10000) * 1000,
                'y2018'                 => $this->faker->numberBetween(0, 10000) * 1000,
                'y2019'                 => $this->faker->numberBetween(0, 10000) * 1000,
                'y2020'                 => $this->faker->numberBetween(0, 10000) * 1000,
                'y2021'                 => $this->faker->numberBetween(0, 10000) * 1000,
                'y2022'                 => $this->faker->numberBetween(0, 10000) * 1000,
                'y2023'                 => $this->faker->numberBetween(0, 10000) * 1000,
            ],
            'disbursement'              => [
                'y2016'                 => $this->faker->numberBetween(0, 10000) * 1000,
                'y2017'                 => $this->faker->numberBetween(0, 10000) * 1000,
                'y2018'                 => $this->faker->numberBetween(0, 10000) * 1000,
                'y2019'                 => $this->faker->numberBetween(0, 10000) * 1000,
                'y2020'                 => $this->faker->numberBetween(0, 10000) * 1000,
                'y2021'                 => $this->faker->numberBetween(0, 10000) * 1000,
                'y2022'                 => $this->faker->numberBetween(0, 10000) * 1000,
                'y2023'                 => $this->faker->numberBetween(0, 10000) * 1000,
            ],
            'region_investments'        => $region_investments,
            'fs_investments'            => $fs_investments,
            'has_subprojects'           => $this->faker->boolean,
            'ict'                       => $this->faker->boolean,
            'covid'                     => $this->faker->boolean,
            'covid_interventions'       => CovidIntervention::all()->random(2)->pluck('id'),
            'research'                  => $this->faker->boolean,
        ];
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_it_stores_project_and_redirects_to_show_project()
    {
//        $this->withoutExceptionHandling();
        $data = $this->getTestData();

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
