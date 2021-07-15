<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MdTextarea extends Component
{
    public $componentId;

    public $name;

    public $value;

    public $placeholder;

    public function render()
    {
        return view('livewire.md-textarea');
    }
}
