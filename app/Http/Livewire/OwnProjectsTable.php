<?php

namespace App\Http\Livewire;

use App\Models\Project;
use App\Traits\WithSortTable;
use Livewire\Component;
use Livewire\WithPagination;

class OwnProjectsTable extends Component
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
        return view('livewire.own-projects-table', [
            'projects' => Project::search($this->search)
                ->own()
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                ->paginate(10),
        ]);
    }
}
