<template>    
    <div >
        <div v-for="elementos in datos"   v-bind:key="elementos.id">

            
            <li   class="list-group-item " > 
                <div class="row">
                    <div :class="clase2">                         
                    </div>    
                    <div :class="clase">                     
                        <i class="fas fa-plus" style="font-size:20px;"></i> {{elementos.nombre}} {{clase}} 
                    </div>

                    <div   class="btn-group col-sm-5" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-info " disabled ><i class="fas fa-angle-double-left"></i></button>
                        <button type="button" class="btn btn-info "  ><i class="fas fa-angle-double-right"></i></button>
                        <button type="button" class="btn btn-info "  ><i class="far fa-edit"></i></button>                         
                        <button @click="eliminar(elementos.id)"      class="btn btn-info "  ><i class="far fa-trash-alt"></i></button>                        
                    </div>
                    
                </div>
            
            </li> 
            
            <menu-tree-component  :level="parseInt(level)+1"  :datos="elementos.childs" > 
            </menu-tree-component       > 
        </div>
    </div>
     
</template>


<script>
    export default {
        props:['datos','level'],
        mounted() {
            console.log('Component mounted.')
        } ,
       computed: {
            deep: function () {
                return 8 - this.level;
            }
            ,clase: function (){
                return "col-sm-"+this.deep
            }
            ,clase2: function (){
                return "col-sm-"+parseInt(parseInt(this.level)-1)
            }
        },
        methods:{
            eliminar:function(key ){                    
                for (var i = 0; i < this.datos.length; i++) {
                    var element = this.datos[i];
                    if (element.id == key) {
                        this.datos.splice(i,1);
                    } 
                }
            }
        
        },
        emits:['elimina']
    
    }
</script>