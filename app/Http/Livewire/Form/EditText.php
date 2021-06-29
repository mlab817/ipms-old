<?php

namespace App\Http\Livewire\Form;

use App\Models\Project;
use Livewire\Component;

class EditText extends Component
{
    public $projectId;
    public $field;
    public $origValue; // initial widget name state
    public $editedValue; // dirty widget name state

    public function mount(Project $project, string $field)
    {
        $this->projectId    = $project->id;
        $this->field        = $field;

        $this->init($project);
    }

    public function render()
    {
        return view('livewire.form.edit-text');
    }

    public function save()
    {
        $project                = Project::findOrFail($this->projectId);
        $project[$this->field]  = $this->editedValue;
        $project->save();

        session()->flash('message', 'Successfully update ' . $this->field);
    }

    private function init(Project $project)
    {
        $this->origValue = $project[$this->field];
        $this->editedValue = $this->origValue;
    }
}
