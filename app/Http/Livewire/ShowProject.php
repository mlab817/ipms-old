<?php

namespace App\Http\Livewire;

use App\Models\ApprovalLevel;
use App\Models\Basis;
use App\Models\CovidIntervention;
use App\Models\FsStatus;
use App\Models\Gad;
use App\Models\Office;
use App\Models\PapType;
use App\Models\PdpChapter;
use App\Models\PreparationDocument;
use App\Models\Project;
use App\Models\ProjectStatus;
use App\Models\Region;
use App\Models\SpatialCoverage;
use Livewire\Component;

class ShowProject extends Component
{
    public $projectId;

    public $project;

    public $officeId;

    public $papTypeId;

    public $regularProgram;

    public $hasInfra;

    public $projectBases = [];

    public $description;

    public $expectedOutputs;

    public $totalProjectCost;

    public $projectStatus;

    public $research;

    public $ict;

    public $covid;

    public $covidInterventions;

    public $spatialCoverage;

    public $regions;

    public $targetStartYear;

    public $targetEndYear;

    public $iccable;

    public $approvalLevel;

    public $approvalDate;

    public $gad;

    public $rdip;

    public $rdcEndorsementRequired;

    public $rdcEndorsed;

    public $rdcEndorsedDate;

    public $preparationDocument;

    public $hasFs;

    public $fsStatus;

    public $needAssistance;

    public $fsY2017;

    public $fsY2018;

    public $fsY2019;

    public $fsY2020;

    public $fsY2021;

    public $fsY2022;

    public $fsTotal;

    public $employmentGenerated;

    public $pdpChapter;

    public $pdpChapters = [];

    public $sdgs = [];

    public $tenPointAgendas = [];

    public $fundingSource;

    public $fundingSources = [];

    public $fundingInstitution;

    public $implementationMode;

    public $tier;

    public $uacsCode;

    public $updates;

    public $updatesDate;

    public $fsInvestments = [];

    public $regionInvestments = [];

    public $nep = [];

    public $gaa = [];

    public $disbursement = [];

    public $booleanOptions = [
        '0' => 'No',
        '1' => 'Yes',
    ];

    protected $rules = [
        'projectBases.*'        => 'nullable|array|exists:bases,id',
        'covidInterventions.*'  => 'nullable|array|exists:covid_interventions,id',
        'regions.*'             => 'nullable|array|exists:regions,id',
        'pdpChapters.*'         => 'nullable|array|exists:pdp_chapters,id'
    ];

    public function mount(Project $project)
    {
        $this->project = $project;
        $this->projectId = $project->id;
        $this->officeId = $project->office_id;
        $this->papTypeId = $project->pap_type_id;
        $this->regularProgram = $project->regular_program;
        $this->hasInfra = $project->has_infra;
        $this->projectBases    = array_map('intval',$project->bases()->pluck('id')->toArray() ?? []);
        $this->description = $project->description->description ?? '';
        $this->expectedOutputs = $project->expected_output->expected_outputs ?? '';
        $this->totalProjectCost = $project->total_project_cost;
        $this->projectStatus = $project->project_status_id;
        $this->research = $project->research;
        $this->ict = $project->ict;
        $this->covid = $project->covid;
        $this->covidInterventions    = array_map('intval',$project->covid_interventions()->pluck('id')->toArray() ?? []);
        $this->spatialCoverage = $project->spatial_coverage_id;
        $this->regions    = array_map('intval',$project->regions()->pluck('id')->toArray() ?? []);
        $this->targetStartYear = $project->target_start_year;
        $this->targetEndYear = $project->target_end_year;
        $this->iccable = $project->iccable;
        $this->approvalLevel = $project->approval_level_id;
        $this->approvalDate = $project->approval_date;
        $this->gad = $project->gad_id;
        $this->rdip = $project->rdip;
        $this->rdcEndorsementRequired = $project->rdc_endorsement_required;
        $this->rdcEndorsed = $project->rdc_endorsed;
        $this->rdcEndorsedDate = $project->rdc_endorsed_date;
        $this->preparationDocument = $project->preparation_document_id;
        $this->hasFs = $project->has_fs;
        $this->fsStatus = $project->feasibility_study->fs_status_id ?? null;
        $this->needAssistance = $project->feasibility_study->need_assistance ?? false;
        $this->fsY2017 = $project->feasibility_study->y2017 ?? 0;
        $this->fsY2018 = $project->feasibility_study->y2018 ?? 0;
        $this->fsY2019 = $project->feasibility_study->y2019 ?? 0;
        $this->fsY2020 = $project->feasibility_study->y2020 ?? 0;
        $this->fsY2021 = $project->feasibility_study->y2021 ?? 0;
        $this->fsY2022 = $project->feasibility_study->y2022 ?? 0;
        $this->employmentGenerated = $project->employment_generated;
        $this->pdpChapter = $project->pdp_chapter_id;
        $this->pdpChapters = array_map('intval', $project->pdp_chapters()->pluck('id')->toArray() ?? []);
    }

    public function updateOffice()
    {
        $project = $this->project;
        $project->office_id = $this->officeId;
        $project->save();
    }

    public function updatePapType()
    {
        $project = $this->project;
        $project->pap_type_id = $this->papTypeId;
        if ($project->pap_type_id == 2) {
            $project->regular_program = false;
        } else {
            $project->regular_program = $this->regularProgram;
        }

        $project->save();
    }

    public function updateHasInfra()
    {
        $project = $this->project;
        $project->has_infra = $this->hasInfra;
        $project->save();
    }

    public function updateProjectBases()
    {
        $project = $this->project;
        $project->bases()->sync(array_diff($this->projectBases,[false]));
    }

    public function updateDescription()
    {
        $project = $this->project;
        $project->description()->updateOrCreate([
            'project_id' => $project->id,
        ],
        [
            'description' => $this->description
        ]);
    }

    public function updateExpectedOutputs()
    {

    }

    public function updateTotalProjectCost()
    {
        $project = $this->project;
        $project->total_project_cost = $this->totalProjectCost;
        $project->save();
    }

    public function updateProjectStatus()
    {
        $project = $this->project;
        $project->project_status_id = $this->projectStatus;
        $project->save();
    }

    public function updateResearch()
    {
        $project = $this->project;
        $project->research = $this->research;
        $project->save();
    }

    public function updateIct()
    {
        $project = $this->project;
        $project->ict = $this->ict;
        $project->save();
    }

    public function updateCovid()
    {
        $project = $this->project;
        $project->covid = $this->covid;
        $project->save();
    }

    public function updateCovidInterventions()
    {
        $project = $this->project;
        $project->covid_interventions()->sync(array_diff($this->covidInterventions,[false]));
    }

    public function updateSpatialCoverage()
    {
        $project = $this->project;
        $project->spatial_coverage_id = $this->spatialCoverage;
        $project->save();
    }

    public function updateRegions()
    {
        $project = $this->project;
//        dd($this->regions);
        $project->regions()->sync(array_diff($this->regions,[false]));
    }

    public function updateTargetStartYear()
    {
        $project = $this->project;
        $project->target_start_year = $this->targetStartYear;
        $project->save();
    }

    public function updateTargetEndYear()
    {
        $project = $this->project;
        $project->target_end_year = $this->targetEndYear;
        $project->save();
    }

    public function updateIccable()
    {
        $project = $this->project;
        $project->iccable = $this->iccable;
        $project->save();
    }

    public function updateApprovalLevel()
    {
        $project = $this->project;
        $project->approval_level_id = $this->approvalLevel;
        $project->save();
    }

    public function updateApprovalDate()
    {
        $project = $this->project;
        $project->approval_date = $this->approvalDate;
        $project->save();
    }

    public function updateGad()
    {
        $project = $this->project;
        $project->gad_id = $this->gad;
        $project->save();
    }

    public function updateRdip()
    {
        $project = $this->project;
        $project->rdip = $this->rdip;
        $project->save();
    }

    public function updateRdcEndorsementRequired()
    {
        $project = $this->project;
        $project->rdc_endorsement_required = $this->rdcEndorsementRequired;
        $project->save();
    }

    public function updateRdcEndorsed()
    {
        $project = $this->project;
        $project->rdc_endorsed = $this->rdcEndorsed;
        $project->save();
    }

    public function updateRdcEndorsedDate()
    {
        $project = $this->project;
        $project->rdc_endorsed_date = $this->rdcEndorsedDate;
        $project->save();
    }

    public function updatePreparationDocument()
    {
        $project = $this->project;
        $project->preparation_document_id = $this->preparationDocument;
        $project->save();
    }

    public function updateHasFs()
    {
        $project = $this->project;
        $project->has_fs = $this->hasFs;
        $project->save();
    }

    public function updateFsStatus()
    {
        $project = $this->project;
        $project->feasibility_study->updateOrCreate([
            'project_id' => $project->id
        ],[
            'fs_status_id' => $this->fsStatus,
        ]);
    }

    public function updateNeedAssistance()
    {
        $project = $this->project;
        $project->feasibility_study->updateOrCreate([
            'project_id' => $project->id
        ],[
            'need_assistance' => $this->needAssistance,
        ]);
    }

    public function updateFsCost()
    {
        $project = $this->project;
        $project->feasibility_study->updateOrCreate([
            'project_id' => $project->id
        ],[
            'y2017' => $this->fsY2017,
            'y2018' => $this->fsY2018,
            'y2019' => $this->fsY2019,
            'y2020' => $this->fsY2020,
            'y2021' => $this->fsY2021,
            'y2022' => $this->fsY2022,
        ]);
    }

    public function updateEmploymentGenerated()
    {
        $project = $this->project;
        $project->employment_generated = $this->employmentGenerated;
        $project->save();
    }

    public function updatePdpChapter()
    {
        $project = $this->project;
        $project->pdp_chapter_id = $this->pdpChapter;
        $project->save();
    }

    public function updatePdpChapters()
    {
        $project = $this->project;
        $project->pdp_chapters()->sync(array_map('intval', $this->pdpChapters));
    }

    public function render()
    {
        return view('livewire.show-project',[
            'offices'   => Office::select('id','acronym')->get(),
            'pap_types' => PapType::all(),
            'bases'     => Basis::all(),
            'project_statuses' => ProjectStatus::all(),
            'covid_interventions' => CovidIntervention::all(),
            'spatial_coverages' => SpatialCoverage::all(),
            'region_options' => Region::all(),
            'years' => config('ipms.editor.years'),
            'approval_levels' => ApprovalLevel::all(),
            'gads' => Gad::all(),
            'preparation_documents' => PreparationDocument::all(),
            'fs_statuses' => FsStatus::all(),
            'pdp_chapters' => PdpChapter::all(),
        ]);
    }
}
