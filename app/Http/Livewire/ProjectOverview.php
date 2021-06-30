<?php

namespace App\Http\Livewire;

use App\Models\Project;
use App\Models\SubmissionStatus;
use Livewire\Component;
use Livewire\WithPagination;

class ProjectOverview extends Component
{
    use WithPagination;

    public $search;

    public $status;

    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
        'status' => ['except' => '']
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Project::query();

        if ($this->search) {
            $query->where('title','LIKE', '%'.$this->search.'%');
        }

        if ($this->status) {
            $query->where('submission_status_id', SubmissionStatus::findByName($this->status)->id);
        }

        $projects = $query->paginate();

        return view('livewire.project-overview', compact('projects'))
            ->with('submission_statuses', SubmissionStatus::all());
    }
}
