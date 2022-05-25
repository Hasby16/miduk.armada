<?php

namespace App\View\Components\Sidebar;

use Illuminate\View\Component;

class NavLink extends Component
{

    public $active;

    /**
     * Create the component instance.
     *
     * @param  string  $type
     * @param  string  $message
     * @return void
     */
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($active)
    {
        $this->active = $active;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.sidebar.nav-link');
    }
}
