<?php

namespace App\View\Components;

use Carbon\Carbon;
use Illuminate\View\Component;

class TimeAgo extends Component
{
    public $time;

    /**
     * Create a new component instance.
     *
     * @return void
     * @throws \Exception
     */
    public function __construct($time)
    {
        $this->time = Carbon::parse($time);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.time-ago');
    }
}
