@extends('backend.layouts.app')

@section('title', __('Dashboard'))

@section('content')
 


<div class="row">
    <div class="col-sm-6">
        <div class="card">
            <div  class="card-header">
                MENU
            </div >
            <div class="card-body">     
            <ul class="list-group list-group-flush">      
              <x-backend.menuEditListComponent  menu_Id="0"/>
              </ul>
              </div > 
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card">
          <form method="post" action="{{route('admin.menumanager')}}">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <div  class="card-header">
                EDITAR
            </div >
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Título:</label>
                        <input type="text" class="form-control" name="title" id="title">
                </div>
                <div class="form-group">
                    <label for="title">Icono:</label>
                        <div class="input-group">
                            
                            <input class="form-control" id="icon" type="text" name="icon"  >
                            <div class="input-group-append">
                              <div class="input-group-text"><i class="fas fa-address-book" style="font-size:20px;" id="iconoMuestra"></i></div>
                                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModal">
                                     Seleccionar
                                </button>
                            </div>
                        </div>
                <div class="form-group">
                    <label for="title">Ruta:</label>
                    <input type="text" class="form-control" name="href" id="href">
                </div>
                <div class="form-group">
                    <label for="title">Parent Id:</label>
                    <input type="text" class="form-control" name="menu_Id" id="menu_Id">
                </div>
                         

                        
                </div>


                
            </div>
            <div class= 'card-footer'>
            <button type="sumbit" class="btn btn-primary" name="action" value="actualizar"><i class="fas fa-sync-alt"></i> Primary Button</button>
            <button type="sumbit" class="btn btn-success" name="action" value="nuevo"> <i class="fas fa-plus"></i> Guardar Nuevo Menu</button>
            
            </div>
        </form>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            @include('backend.includes.fa')
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

@endsection
