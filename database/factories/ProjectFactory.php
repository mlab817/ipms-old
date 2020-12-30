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
use App\Models\OperatingUnit;
use App\Models\PapType;
use App\Models\PdpChapter;
use App\Models\Prerequisite;
use App\Models\Project;
use App\Models\ProjectStatus;
use App\Models\Region;
use App\Models\ResettlementActionPlan;
use App\Models\RightOfWay;
use App\Models\Sdg;
use App\Models\SpatialCoverage;
use App\Models\TenPointAgenda;
use App\Models\Tier;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'title'                     => $this->faker->title,
            'pap_type_id'               => PapType::all()->random()->id,
            'cip_type_id'               => CipType::all()->random()->id,
            'funding_source_id'         => FundingSource::all()->random()->id,
            'gad_id'                    => Gad::all()->random()->id,
            'iccable'                   => $this->faker->boolean,
            'implementation_mode_id'    => ImplementationMode::all()->random()->id,
            'pdp_chapter_id'            => PdpChapter::all()->random()->id,
            'project_status_id'         => ProjectStatus::all()->random()->id,
            'spatial_coverage_id'       => SpatialCoverage::all()->random()->id,
            'tier_id'                   => Tier::all()->random()->id,
            'approval_level_id'         => ApprovalLevel::all()->random()->id,
            'risk'                      => $this->faker->paragraph,
            'uacs_code'                 => $this->faker->ean13, // barcode
            'updates'                   => $this->faker->paragraph,
            'updates_date'              => $this->faker->date(),
            'regions'                   => Region::all()->random(5)->pluck('id'),
            'bases'                     => Basis::all()->random(2)->pluck('id'),
            'funding_sources'           => FundingSource::all()->random(2)->pluck('id'),
            'funding_institutions'      => FundingInstitution::all()->random(1)->pluck('id'),
            'implementing_agencies'     => OperatingUnit::all()->random(2)->pluck('id'),
            'pdp_chapters'              => PdpChapter::all()->random(3)->pluck('id'),
            'prerequisites'             => Prerequisite::all()->random(2)->pluck('id'),
            'sdgs'                      => Sdg::all()->random(4)->pluck('id'),
            'ten_point_agendas'         => TenPointAgenda::all()->random(3)->pluck('id'),
//            'allocation'                => Allocation::factory(),
//            'disbursement'              => Disbursement::factory(),
//            'feasibility_study'         => FeasibilityStudy::factory(),
//            'nep'                       => Nep::factory(),
//            'resettlement_action_plan'  => ResettlementActionPlan::factory(),
//            'right_of_way'              => RightOfWay::factory(),
        ];
    }
}
