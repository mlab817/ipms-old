<?php

namespace Database\Factories;

use App\Models\Allocation;
use App\Models\ApprovalLevel;
use App\Models\Basis;
use App\Models\CipType;
use App\Models\Disbursement;
use App\Models\FeasibilityStudy;
use App\Models\FundingInstitution;
use App\Models\FundingSource;
use App\Models\Gad;
use App\Models\ImplementationMode;
use App\Models\Nep;
use App\Models\Office;
use App\Models\OperatingUnit;
use App\Models\PapType;
use App\Models\PdpChapter;
use App\Models\PipTypology;
use App\Models\PreparationDocument;
use App\Models\Prerequisite;
use App\Models\Project;
use App\Models\ProjectStatus;
use App\Models\ReadinessLevel;
use App\Models\Region;
use App\Models\ResettlementActionPlan;
use App\Models\RightOfWay;
use App\Models\Sdg;
use App\Models\SpatialCoverage;
use App\Models\TenPointAgenda;
use App\Models\Tier;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $title = $this->faker->catchPhrase;

        return [
            'code'                          => $this->faker->isbn13,
            'uuid'                          => Str::uuid(),
            'title'                         => $title,
//            'slug'                          => Str::slug($title),
            'pap_type_id'                   => PapType::all()->random()->id,
            'regular_program'               => $this->faker->boolean,
//            'description'                   => $this->faker->paragraph,
//            'expected_outputs'              => $this->faker->paragraph,
            'spatial_coverage_id'           => SpatialCoverage::all()->random()->id,
            'iccable'                       => $this->faker->boolean,
            'approval_level_id'             => ApprovalLevel::all()->random()->id,
            'approval_date'                 => $this->faker->date(),
            'pip'                           => $this->faker->boolean,
            'pip_typology_id'               => PipTypology::all()->random()->id,
            'research'                      => $this->faker->boolean,
            'cip'                           => $this->faker->boolean,
            'cip_type_id'                   => CipType::all()->random()->id,
            'trip'                          => $this->faker->boolean,
            'rdip'                          => $this->faker->boolean,
            'rdc_endorsement_required'      => $this->faker->boolean,
            'rdc_endorsed'                  => $this->faker->boolean,
            'rdc_endorsed_date'             => $this->faker->date(),
            'other_infrastructure'          => $this->faker->word,
//            'risk'                          => $this->faker->paragraph,
            'pdp_chapter_id'                => PdpChapter::all()->random()->id,
            'no_pdp_indicator'              => $this->faker->boolean,
            'gad_id'                        => Gad::all()->random()->id,
            'target_start_year'             => $this->faker->randomDigit + 2000,
            'target_end_year'               => $this->faker->randomDigit + 2000,
            'preparation_document_id'       => PreparationDocument::all()->random()->id,
            'preparation_document_others'   => $this->faker->word,
            'has_fs'                        => $this->faker->boolean,
            'has_row'                       => $this->faker->boolean,
            'has_rap'                       => $this->faker->boolean,
            'employment_generated'          => $this->faker->word,
            'funding_source_id'             => FundingSource::all()->random()->id,
            'implementation_mode_id'        => ImplementationMode::all()->random()->id,
            'other_fs'                      => $this->faker->word,
            'project_status_id'             => ProjectStatus::all()->random()->id,
            'readiness_level_id'            => ReadinessLevel::all()->random()->id,
//            'updates'                       => $this->faker->paragraph,
//            'updates_date'                  => $this->faker->date(),
            'uacs_code'                     => $this->faker->ean13, // barcode
            'tier_id'                       => Tier::all()->random()->id,
            'total_project_cost'            => $this->faker->randomFloat() * 1000,
            'created_by'                    => User::all()->random()->id,
            'has_subprojects'               => $this->faker->boolean,
            'has_infra'                     => $this->faker->boolean,
            'office_id'                     => Office::all()->random()->id,
        ];
    }
}
