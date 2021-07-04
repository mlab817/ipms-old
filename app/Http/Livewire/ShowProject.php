<?php

namespace App\Http\Livewire;

use App\Models\Basis;
use App\Models\CovidIntervention;
use App\Models\Office;
use App\Models\PapType;
use App\Models\Project;
use App\Models\ProjectStatus;
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

    public $booleanOptions = [
        '0' => 'No',
        '1' => 'Yes',
    ];

    protected $rules = [
        'projectBases.*'        => 'int',
        'covidInterventions.*'  => 'int'
    ];

    public function mount(Project $project)
    {
        $this->project = $project;
        $this->projectId = $project->id;
        $this->officeId = $project->office_id;
        $this->papTypeId = $project->pap_type_id;
        $this->regularProgram = $project->regular_program;
        $this->hasInfra = $project->has_infra;
        $this->projectBases    = $project->bases()->pluck('id')->toArray() ?? [];
        $this->description = $project->description->description ?? '';
        $this->expectedOutputs = $project->expected_output->expected_outputs ?? '';
        $this->totalProjectCost = $project->total_project_cost;
        $this->projectStatus = $project->project_status_id;
        $this->research = $project->research;
        $this->ict = $project->ict;
        $this->covid = $project->covid;
        $this->covidInterventions    = $project->covid_interventions()->pluck('id')->toArray() ?? [];
        $this->spatialCoverage = $project->spatial_coverage_id;
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
        $project->bases()->sync($this->projectBases);
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
        $project->covid_interventions()->sync($this->covidInterventions);
    }

    public function updateSpatialCoverage()
    {
        $project = $this->project;
        $project->spatial_coverage_id = $this->spatialCoverage;
        $project->save();
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
        ]);
    }
}
