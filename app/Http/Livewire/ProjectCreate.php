<?php

namespace App\Http\Livewire;

use App\Models\PapType;
use App\Models\Project;
use Livewire\Component;

class ProjectCreate extends Component
{
    public $title = '';

    public $papTypeId = null;

    public $duplicates = [];

    public $hideAutocomplete = true;

    protected $rules = [
        'title' => 'required|max:255|string',
        'papTypeId' => 'required|exists:pap_types,id'
    ];

    public function checkDuplicates()
    {
        $this->duplicates = $this->title ? Project::where('title', 'like', '%'. $this->title . '%')->get() : [];
        $this->hideAutocomplete = false;
    }

    public function updatedTitle()
    {
        $this->checkDuplicates();
    }

    public function clearDuplicates()
    {
        $this->duplicates = [];
        $this->hideAutocomplete = true;
    }

    public function saveProject()
    {
        $project = Project::create([
            'title' => $this->title,
            'pap_type_id' => $this->papTypeId,
            'updating_period_id' => config('ipms.current_updating_period'),
            'created_by' => auth()->id()
        ]);

        Project::withoutEvents(function () use ($project) {
            $project->project_id = $project->id;
            $project->save();
        });

        $this->reset();
    }

    public function render()
    {
        return view('livewire.project-create', [
            'pap_types' => PapType::all()
        ]);
    }
}
