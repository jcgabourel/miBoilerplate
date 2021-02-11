<?php

namespace App\View\Components\Backend;

use Illuminate\View\Component;

class crudTableComponent extends Component
{
    public $modelo ;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($modelo)
    {
        //
        $this->modelo = $modelo;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        $modelos = $this->modelo::latest()->paginate(10);
        return   view('components.backend.crud-table',compact('modelos'));
    }
}
