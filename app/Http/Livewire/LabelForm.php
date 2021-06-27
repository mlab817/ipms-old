<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LabelForm extends Component
{
    public $labelId;

    public $name;

    public $description;

    public $labelTypes;

    public function mount(array &$labelTypes, array $label)
    {
        $this->labelTypes = &$labelTypes;
        $this->name = $label['name'];
        $this->labelId = $label['labelId'];
        $this->description = $label['description'];

    }

    public function render()
    {
        return view('livewire.label-form');
    }
}
