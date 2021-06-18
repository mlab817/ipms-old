<?php

namespace App\Http\Livewire;

use App\Models\Project;
use App\Traits\WithSortTable;
use Livewire\Component;
use Livewire\WithPagination;

class DeletedProjectsTable extends Component
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
        return view('livewire.deleted-projects-table', [
            'projects' => Project::searchTrashed($this->search)
                ->whereNotNull('projects.deleted_at')
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                ->paginate(10),
        ]);
    }
}
