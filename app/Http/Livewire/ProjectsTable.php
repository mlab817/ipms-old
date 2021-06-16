<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;

class ProjectsTable extends Component
{
    use WithPagination;

    public $sortField = 'title'; // default sorting field
    public $sortAsc = true; // default sort direction
    public $search = '';

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc; // if field is already sorted, use the opposite instead
        } else {
            $this->sortAsc = true; // sort selected field by ascending by default
        }

        $this->sortField = $field;
    }

    public function render()
    {
        return view('livewire.projects-table', [
            'projects' => Project::search($this->search)
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                ->simplePaginate(10),
        ]);
    }
}
