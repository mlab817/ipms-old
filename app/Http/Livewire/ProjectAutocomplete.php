<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Livewire\Component;

class ProjectAutocomplete extends Component
{
    public $search;

    public function render()
    {
        return view('livewire.project-autocomplete', [
            'projects' => empty($this->search)
                ? []
                : Project::search($this->search)->take(5)->get()
        ]);
    }
}
