<template>    
    <div >
        <div v-for="elementos in datos"   v-bind:key="elementos.id">

            
            <li   class="list-group-item " > 
                <div class="row">
                    <div :class="clase2">                         
                    </div>    
                    <div :class="clase">                     
                        <i class="fas fa-plus" style="font-size:20px;"></i> {{elementos.nombre}}   
                    </div>

                    <div   class="btn-group col-sm-5" role="group" aria-label="Basic example">
                        <button @click="back(elementos)" type="button" class="btn btn-info " :disabled="parseInt(level)==1" ><i class="fas fa-angle-double-left"></i> </button>
                        <button type="button" class="btn btn-info "  ><i class="fas fa-angle-double-right"></i></button>
                        <button @click="$emit('modifica',elementos)"   class="btn btn-info "  ><i class="far fa-edit"></i></button>                         
                        <button @click="eliminar(elementos.id)"     class="btn btn-info "  ><i class="far fa-trash-alt"></i></button>                        
                    </div>
                    
                </div>  
            
            </li> 
            
            <menu-tree-component  :level="parseInt(level)+1"  :datos="elementos.childs" @modifica="moddd" > 
            </menu-tree-component       > 
        </div>
    </div>
     
</template>


<script>
    export default {
        props:['datos','level'],
        mounted() {
           
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
            ,moddd(event  )
                { console.log (event)
                this.$emit('modifica',event)
                
                } 
            , back(elemento)
                {
                    alert(elemento.nombre);
                    alert(elemento.parent);
                    alert(   this.ejem()) ;

                } ,
                ejem(){

                    return "yaa";
                }
        
        },
        emits:['modifica']
    
    }
</script>