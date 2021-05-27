<template>
    
<div class="row">
    <div class="col-sm-6">
        <div class="card">
            <div  class="card-header">
                MENU
            </div > 
            <div class="card-body">  
                <ul  >  
                    <menu-tree-component  :id="0" level="1"   :datos="computeddata(0)" :fulldata="data2" @modifica="actualiza" />
                
                </ul>
                

            </div > 
        </div>

         
       <hr />
        <table border= 1>
            <tr>
                <td><pre>{{computeddata(0)}} </pre></td>
             
                <td><pre>{{data2}} </pre></td>
            </tr>
        </table>
        
    </div>
    <div class="col-sm-6">
        <div class="card">
           
            
            <div  class="card-header">
                EDITAR
            </div >
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Título:</label>
                        <input type="text" class="form-control" name="title" id="title" v-model="formvars.titulo">
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
                    <input type="text" class="form-control" name="menu_Id" id="menu_Id" v-model="formvars.parentid">
                </div>
                         

                        
                </div>


                
            </div>
            <div class= 'card-footer'>
            <button                     class="btn btn-primary" name="action"  @click="guardar2"><i class="fas fa-sync-alt"></i> Guardar</button>
            <button v-if="verguardar"   class="btn btn-success" name="guardar" @click="guardar"> <i class="fas fa-plus"></i> Guardar</button>
            
            </div>
        
        </div> 
       
      
    </div>
       
      
</div>

</template>

<script>
    export default {
        props:[ 'datos'],
        mounted() {
            
        },
        data(){
           return{ data:[
                            {id:1 ,parent:'0',  nombre:'elementwwwwo1', childs:[{id:3, parent:'1',  nombre:'elemento1.2'}]},
                            {id:2 ,parent:'0',  nombre:'elemento2', childs:[ ]}
                    ],
                    data2:[
                        {id:1,parent:'0',nombre:"elemento1"},
                        {id:3,parent:'1',nombre:"elemento2"},
                        {id:2,parent:'0',nombre:"elemento3"}
                    ],
                    formvars: {titulo:"",
                                parentid :0,
                                cual:""
                                } 
            }
        },
        methods:{
                actualiza:function (cual){
                    this.formvars.titulo = cual.nombre;
                    this.formvars.parentid = cual.parent;
                    this.formvars.cual =cual;
                    }, 
                getIndexByKey(key, data) {
                    var found = null;

                    for (var i = 0; i < data.length; i++) {
                        var element = data[i];

                        if (element.id == key) {
                            return element;
                    } 

                    }

                    return found ;
                
                } ,
                guardar(){
                    this.formvars.cual.nombre = this.formvars.titulo ;
                    console.log(this.formvars.titulo);
                },
                  guardar2(){
                   var dat ={};
                   dat.id = this.newid();
                   dat.nombre =this.formvars.titulo ;
                   dat.parent =this.formvars.parentid ;
                   

                   this.data2.push(dat);

                },
                newid()
                {
                    var newid =1 ;
                     for(var i = 0; i< this.data2.length ;i++){                         
                       if (this.data2[i].id >= newid)  
                            newid = this.data2[i].id +1 ;
                     }
                     return newid ;
                },
               computeddata :function(inicio ){
               var  midata = [];
               var dat =[]   ;
               for(var i = 0; i< this.data2.length ;i++){
                   if (this.data2[i].parent == inicio)
                       {
                           var dat = {};
                            dat.id =this.data2[i].id ;
                            dat.parent =this.data2[i].parent ;
                            dat.nombre =this.data2[i].nombre ;  
                            dat.childs = [];
                             
                            dat.childs = this.computeddata(dat.id);
                            midata.push(dat);

                       } 
               }
               
                return midata ; 


            }

        },computed: {

           testo: function (){
                return  JSON.stringify(this.data) 
            } ,
            verguardar : function(){
                if (this.formvars.titulo == "") return false ;
                 return true},

            
        }
         
    }
</script>