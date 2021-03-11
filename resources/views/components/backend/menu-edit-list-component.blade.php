
              

@foreach($menus as $menu)
                 
<li class="list-group-item ">
    <div class="row">
    @for($i=1;$i<$menu->level;$i++)
        <div class="col-sm-1">   </div>
    @endfor

        <div class="col-sm-{{8-$menu->level}}"> 
        @if(count($menu->childs)) <i class="fas fa-plus"></i>  @endif   
         <i class="{{$menu->icon}}" style="font-size:20px;"></i> {{$menu->title}}
        </div>

        <div   class="btn-group col-sm-4" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-info " disabled ><i class="fas fa-angle-double-left"></i></button>
            <button type="button" class="btn btn-info "  ><i class="fas fa-angle-double-right"></i></button>
            <button type="button" class="btn btn-info "  ><i class="far fa-edit"></i></button>
            <form action="{{ route('admin.menumanagerDelete', [ 'id'=> $menu->id ]) }}" method="POST"> 
            @csrf
            @method('DELETE') 
            <button type="submit" class="btn btn-info "  ><i class="far fa-trash-alt"></i></button>
            </form>
        </div>

    
    </div> 
    
    
</li>

@if(count($menu->childs))
            <x-backend.menuEditListComponent menu_Id="{{$menu->id}}" />
         
    @endif 

@endforeach


    