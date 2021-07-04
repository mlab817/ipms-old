<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Blankslate extends Component
{
    public $title;

    public $message;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title = null, $message = null)
    {
        $this->title = $title;
        $this->message = $message;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.blankslate');
    }
}
