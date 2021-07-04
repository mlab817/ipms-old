<?php

namespace App\Http\Livewire;

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

    public function mount(Project $project)
    {
        $this->project = $project;
        $this->projectId = $project->id;
        $this->officeId = $project->office_id;
        $this->papTypeId = $project->pap_type_id;
        $this->regularProgram = $project->regular_program;
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

    public function render()
    {
        return view('livewire.show-project',[
            'offices' => Office::select('id','acronym')->get(),
            'pap_types' => PapType::all(),
        ]);
    }
}
