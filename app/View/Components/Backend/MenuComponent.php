<?php


namespace App\View\Components\Backend;
use Illuminate\View\Component;
use App\Models\System\Menu ;

class MenuComponent extends Component
{

    public $menuId ;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($menuId)
    {
        //
        $this->menuId =$menuId ;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        $menus =  Menu::where('menu_Id','=',$this->menuId)->get();
        return view('components.backend.menu-component',compact('menus'));
    }
}
