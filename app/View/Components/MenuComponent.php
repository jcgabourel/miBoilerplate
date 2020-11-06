<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Menu ;

class MenuComponent extends Component
{

    public $parent_id ;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($parentid)
    {
        //
        $this->parent_id =$parentid ;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        $menus =  Menu::where('parent_id','=',$this->parent_id)->get();
        
        return view('components.menu-component',compact('menus'));
    }
}
