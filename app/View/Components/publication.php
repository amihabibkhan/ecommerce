<?php

namespace App\View\Components;

use Illuminate\View\Component;

class publication extends Component
{
    public $publication;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($publication)
    {
        $this->publication = $publication;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.publication');
    }
}
