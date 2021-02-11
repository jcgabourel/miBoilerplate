    @foreach($menus as $menu)
        <li>
            <a href="{{ $menu->href}}"><i class="{{ $menu->icon}}"></i> {{ $menu->title}}
            @if(count($menu->childs))
                <span class="fa arrow"></span>
            @endif
        </a>
        @if(count($menu->childs))
            @if($menu->level== 1)
            <ul class="nav nav-second-level">
            @else
            <ul class="nav nav-third-level">
            @endif 
                <x-frontend.menuComponent menu_Id="{{$menu->id}}" />
            </ul>
        @endif 
        </li>
    @endforeach
    

  


