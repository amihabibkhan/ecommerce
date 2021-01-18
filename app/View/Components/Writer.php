<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Writer extends Component
{
    public $writer;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($writer)
    {
        $this->writer = $writer;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.writer');
    }
}
