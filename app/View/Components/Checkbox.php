<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Checkbox extends Component
{
    public $label;

    public $name;

    public $caption;

    public $options;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label = '', $name = '', $caption = '', $options = [])
    {
        $this->label    = $label;
        $this->name     = $name;
        $this->caption  = $caption;
        $this->options  = $options;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.checkbox');
    }
}
