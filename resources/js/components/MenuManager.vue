<template>
    
<div class="row">
    <div class="col-sm-6">
        <div class="card">
            <div  class="card-header">
                MENU
            </div > 
            <div class="card-body">     
                <ul class="list-group list-group-flush">      
                    <li v-for="elementos in data"   v-bind:key="elementos.id"   >{{elementos.nombre}} 
                        <ul v-if="elementos.childs.length  >0" >
                            <li v-for="hijos in elementos.childs"   v-bind:key="hijos.id"  v-text="hijos.nombre"  />
                        </ul> 
                     </li>
                </ul>
            </div > 
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card">
           
            
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
        
        </div>
    </div>
</div>

</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data(){
           return{ data:[
                            {id:1 ,parent:'0',  nombre:'elemento1', childs:[{id:3, parent:'1',  nombre:'elemento1.2'}]},
                            {id:2 ,parent:'0',  nombre:'elemento2', childs:[ ]}
                    ]
            }
        }
    }
</script>