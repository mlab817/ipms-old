<?php

namespace App\Http\Controllers;

use App\Models\ApprovalLevel;
use App\Models\Basis;
use App\Models\CipType;
use App\Models\CovidIntervention;
use App\Models\FsStatus;
use App\Models\FundingInstitution;
use App\Models\FundingSource;
use App\Models\Gad;
use App\Models\ImplementationMode;
use App\Models\InfrastructureSector;
use App\Models\InfrastructureSubsector;
use App\Models\OperatingUnitType;
use App\Models\PapType;
use App\Models\PdpChapter;
use App\Models\PipTypology;
use App\Models\PreparationDocument;
use App\Models\Prerequisite;
use Illuminate\Http\Request;

class CreateLabelController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'labelType' => 'required|in:'. implode(',',array_keys($this->labelTypes)),
        ]);

        $this->labelTypes[$request->labelType]::updateOrCreate([
                'id' => $request->id
            ],
            [
                'name' => $request->name,
                'description' => $request->description,
        ]);

        return back();
    }

    protected $labelTypes = [
        'approval_levels'               => ApprovalLevel::class,
        'bases'                         => Basis::class,
        'cip_types'                     => CipType::class,
        'covid_interventions'           => CovidIntervention::class,
        'fs_statuses'                   => FsStatus::class,
        'funding_institutions'          => FundingInstitution::class,
        'funding_sources'               => FundingSource::class,
        'gads'                          => Gad::class,
        'implementation_modes'          => ImplementationMode::class,
        'infrastructure_sector'         => InfrastructureSector::class,
        'infrastructure_subsectors'     => InfrastructureSubsector::class,
//        'offices'                       => Office::class,
//        'operating_units'               => OperatingUnit::class,
        'operating_unit_types'          => OperatingUnitType::class,
        'pap_types'                     => PapType::class,
        'pdp_chapters'                  => PdpChapter::class,
        'pip_typologies'                => PipTypology::class,
        'preparation_documents'         => PreparationDocument::class,
        'prerequisites'                 => Prerequisite::class,
    ];

}
