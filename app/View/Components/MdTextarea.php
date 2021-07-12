<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MdTextarea extends Component
{
    public $id;

    public $name;

    public $placeholder;

    public $value;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $name, $placeholder = null, $value = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->placeholder = $placeholder;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.md-textarea');
    }
}
