<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Livewire\Component;

class ProjectSettings extends Component
{
    public $projectId;

    public $username;

    public function mount(Project $project)
    {
        $this->project = $project;
        $this->projectId = $project->id;
    }

    public function transferProject()
    {

    }

    public function archiveProject()
    {

    }

    public function deleteProject()
    {

    }

    public function render()
    {
        return view('livewire.project-settings');
    }
}
