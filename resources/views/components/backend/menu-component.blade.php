@foreach($menus as $menu)
    @if(count($menu->childs))
        <li class="c-sidebar-nav-dropdown " >
    @else
    <li class="c-sidebar-nav-item" >
    @endif
            <x-utils.link
                :href="route($menu->href)"
                icon="{{ $menu->icon}}"
                
                class="{{count($menu->childs)>0 ?'c-sidebar-nav-dropdown-toggle':'c-sidebar-nav-link' }}"
                
                text="{{ $menu->title}}" />

     
    @if(count($menu->childs))
       
        
       
            <x-backend.menuComponent menu_Id="{{$menu->id}}" />
         
    @endif 
    </li>
@endforeach

  


