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

    public $sort = 'id+asc';

    public $sortOptions = [
        'id+asc'        => 'ID A-Z',
        'id+desc'       => 'ID Z-A',
        'title+asc'     => 'Title A-Z',
        'title+desc'    => 'Title Z-A',
    ];

    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
        'status' => ['except' => ''],
        'sort' => ['except' => ''],
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

        if ($this->sort) {
            $sortArr = explode('+', $this->sort);
            $sortField = $sortArr[0];
            $sortDir = $sortArr[1];
            $query->orderBy($sortField, $sortDir);
        }

        $projects = $query->paginate();

        return view('livewire.project-overview', compact('projects'))
            ->with('submission_statuses', SubmissionStatus::all());
    }
}
