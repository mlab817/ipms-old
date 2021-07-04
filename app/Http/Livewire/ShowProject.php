<?php

namespace App\Http\Livewire;

use App\Models\Basis;
use App\Models\Office;
use App\Models\PapType;
use App\Models\Project;
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

    public $totalProjectCost;

    protected $rules = [
        'projectBases.*' => 'int'
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
        $this->totalProjectCost = $project->total_project_cost;
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

    public function updateTotalProjectCost()
    {
        $project = $this->project;
        $project->total_project_cost = $this->totalProjectCost;
        $project->save();
    }

    public function render()
    {
        return view('livewire.show-project',[
            'offices'   => Office::select('id','acronym')->get(),
            'pap_types' => PapType::all(),
            'bases'     => Basis::all(),
        ]);
    }
}
