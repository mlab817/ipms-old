<?php

namespace App\Http\Livewire;

use App\Models\Project;
use App\Models\User;
use Livewire\Component;

class ProjectSettings extends Component
{
    public $projectId;

    public $project;

    public $users;

    public function mount(Project $project)
    {
        $this->project = $project;
        $this->projectId = $project->id;

        $this->users = User::all();
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
