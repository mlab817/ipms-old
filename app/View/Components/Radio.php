<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Radio extends Component
{
    public $label;
    public $caption;
    public $options;
    public $name;

    /**
     * Create a new component instance.
     *
     * @param string $label
     * @param string $caption
     * @param $options
     */
    public function __construct(string $label = '', string $caption = '', string $name = '', $options)
    {
        $this->label    = $label;
        $this->caption  = $caption;
        $this->options  = $options;
        $this->name     = $name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.radio');
    }
}
