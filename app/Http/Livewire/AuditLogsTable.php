<?php

namespace App\Http\Livewire;

use App\Models\AuditLog;
use App\Traits\WithSortTable;
use Livewire\Component;
use Livewire\WithPagination;

class AuditLogsTable extends Component
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
        return view('livewire.audit-logs-table', [
            'audit_logs' => AuditLog::search($this->search)
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                ->paginate(10),
        ]);
    }
}
