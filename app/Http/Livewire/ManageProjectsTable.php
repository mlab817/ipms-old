<?php

namespace App\Http\Livewire;

use App\Models\Project;
use App\Traits\WithSortTable;
use Livewire\Component;
use Livewire\WithPagination;

class ManageProjectsTable extends Component
{
    use WithPagination;
    use WithSortTable;

    protected $paginationTheme = 'bootstrap';
    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.manage-projects-table', [
            'projects' => Project::search($this->search)
                ->with(['office','creator.office','users','project_status'])
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                ->paginate(10),
        ]);
    }
}
