<?php

namespace App\Http\Livewire;

use App\Models\Pipol;
use App\Models\Project;
use App\Traits\WithSortTable;
use Livewire\Component;
use Livewire\WithPagination;

class PipolsTable extends Component
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
        return view('livewire.pipols-table', [
            'pipols' => Pipol::search($this->search)
                ->with(['user.office','project'])
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                ->paginate(10),
        ]);
    }
}
