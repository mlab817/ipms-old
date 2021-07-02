<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Livewire\Component;

class ProjectPipol extends Component
{
    public $project;

    public function mount(Project $project)
    {
        $this->project = $project;
    }

    public function render()
    {
        return view('livewire.project-pipol');
    }
}
