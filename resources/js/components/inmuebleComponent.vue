<template>
    <div class="row">
    <div class="">
        <div class="card card-transparent">
            <button class="btn btn-primary" data-target="#modalSlideUp" data-toggle="modal" id="btnFillSizeToggler">Registrar Nuevo inmueble</button>
        <div class="card-header ">
            <div class="card-title">
            Listado de inquilos registrados
            </div>
            <div class="input-group transparent">
                <div class="input-group-prepend">
                <span class="input-group-text transparent"><i class=" pg-search"></i>
                    </span>
                </div>
                <input type="text" placeholder="Nombre" class="form-control" name="search" v-model="busqueda" @keyup.enter="buscar()">
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <div class="dataTables_wrapper no-footer" id="condensedTable_wrapper">
                <table class="table table-hover table-condensed dataTable no-footer" id="condensedTable_wrapper" role="grid">
                <thead>
                    <tr>
                    <th style="width:20%">id</th>
                    <th style="width:20%">arrendador</th>
                    <th style="width:20%">direccion</th>
                    <th style="width:20%">Observaciones</th>
                    <th style="width:30%">Eliminar</th>
                    <th style="width:30%">Editar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(item, index) in datos" :key="index">
                    <td class="v-align-middle ">
                        <p>{{item.id}}</p>
                    </td>
                    <td class="v-align-middle ">
                        <p> {{tablafinal(item.id_arrendatario)}}</p>
                    </td>
                    <td class="v-align-middle ">
                        <p>{{item.direccion}}</p>
                    </td>
                    <td class="v-align-middle ">
                        <p>{{item.Observaciones}}</p>
                    </td>
                    <td class="v-align-middle ">
                        <button class="btn btn-danger" type ="submit" @click="eliminar(item, index)">Eliminar</button>
                    </td>
                    <td class="v-align-middle ">
                        <button class="btn btn-primary" data-target="#modalSlideUp2" data-toggle="modal" id="btnFillSizeToggler" @click="info(item)">editar</button>
                    </td>
                    </tr>
                </tbody>
                </table>
                <nav>
                    <ul class="pagination">
                        <li class="page-item" v-if="pagination.current_page > 1">
                            <a class="page-link" href="#" @click.prevent="changePage(pagination.current_page -1)">
                                <span>atras</span>
                            </a>
                        </li>
                        <li class="page-item" v-if="pagination.current_page < pagination.last_page">    
                            <a class="page-link" href="#" @click.prevent="changePage(pagination.current_page +1)">
                                <span>siguiente</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            </div>
        </div>
    </div>
  </div>
  <!-- Modal editar -->
<div class="modal fade slide-up disable-scroll" id="modalSlideUp2" tabindex="-1" role="dialog" aria-hidden="false">
    <div class="modal-dialog ">
    <div class="modal-content-wrapper">
        <div class="modal-content">
        <div class="modal-header clearfix text-left">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
            </button>
            <h5>Informacion del <span class="semi-bold">inmueble</span></h5>
            <p class="p-b-10">Recuerde que todos los campos deben ser diligenciados</p>
        </div>
        <div class="modal-body">
            <form role="form"  @submit.prevent="editar(dato)">
                <div class="form-group-attached">
                    <div class="form-group form-group-default required">
                        <label>arrendador</label>
                        <select class="cs-select cs-skin-slide full-width"  data-init-plugin="select2"
                        v-model="dato.id_arrendatario" 
                        required>
                            <option v-for="option in arrendatarios" v-bind:key="option.id" v-bind:value="option.id">{{option.nombre}}</option>
                        </select>
                    </div>
                </div>
                <div class="form-group-attached">
                    <div class="form-group form-group-default required">
                        <label>direccion <i class="fa fa-info text-complete m-l-5"></i>
                        </label>
                        <input type="text" class="form-control" v-model="dato.direccion" required>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group form-group-default required">
                        <label>Observaciones</label>
                        <input type="text" class="form-control" v-model="dato.observaciones" maxlength="40" required>
                        </div>
                    </div>
                    </div>
                </div>
                <br>
                <button class="btn btn-success" type="submit" >Editar</button>
            </form>
        </div>
        </div>
    </div>
    <!-- /.modal-content -->
    </div>
</div>
  <!-- Modal crear -->
<div class="modal fade slide-up disable-scroll" id="modalSlideUp" tabindex="-1" role="dialog" aria-hidden="false">
    <div class="modal-dialog ">
    <div class="modal-content-wrapper">
        <div class="modal-content">
        <div class="modal-header clearfix text-left">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
            </button>
            <h5>Informacion del <span class="semi-bold">inmueble</span></h5>
            <p class="p-b-10">Recuerde que todos los campos deben ser diligenciados</p>
        </div>
        <div class="modal-body">
            <form role="form"  @submit.prevent="agregar">
                <div class="form-group-attached">
                    <div class="form-group form-group-default required">
                        <label>arrendador</label>
                        <select class="cs-select cs-skin-slide full-width"  data-init-plugin="select2"
                        v-model="dato.id_arrendatario" 
                        required>
                            <option v-for="option in arrendatarios" v-bind:key="option.id" v-bind:value="option.id">{{option.nombre}}</option>
                        </select>
                    </div>
                </div>
                <div class="form-group-attached">
                    <div class="form-group form-group-default required">
                        <label>direccion <i class="fa fa-info text-complete m-l-5"></i>
                        </label>
                        <input type="text" class="form-control" v-model="dato.direccion" required>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group form-group-default required">
                            <label>Observaciones</label>
                            <input type="text" class="form-control" v-model="dato.observaciones" maxlength="40" required>
                        </div>
                    </div>
                    </div>
                </div>
                <br>
                <button class="btn btn-success" type="submit">Guardar</button>
            </form>
        </div>
        </div>
    </div>
    <!-- /.modal-content -->
    </div>
</div>

</div>
</template>

<script>
    export default {
        data() {
            return {
                datos:[],
                arrendatarios:[],
                dato:{id_arrendatario:'',direccion:'',observaciones:''},
                busqueda:'',
                pagination:{
                    'total' : 0,
                    'current_page': 0,
                    'per_page' : 0,
                    'last_page' : 0,
                    'from' : 0,
                    'to':0,
                },
            }
        },
        created(){
            
            axios.get('/inmueble')
            .then(res=>{
                this.arrendatarios = res.data.arrendatario,
                this.datos = res.data.inmueble.data,
                this.pagination = res.data.paginate
            })
        },
        computed:{
            isActive: function(){
                return this.pagination.current_page;
            },
            pagesNumber: function(){
                if(!this.pagination.to){
                    return[];
                }
                var from = this.pagination.current_page - 2;//todo offset
                if(from < 1){
                    from = 1;
                }
                var to = from + ( 2 * 2 );//todo
                if(to >= this.pagination.last_page){
                    to = this.pagination.last_page;
                }

                var pagesArray = [];
                while(from <= to){
                    pagesArray.push(from);
                    from++;
                }
                return pagesArray;
            }
        },
        methods:{
            tablafinal(id)
            {
                return this.arrendatarios.find(element => element.id == id).nombre
            },
            agregar(){

            if(
                this.dato.direccion.trim() === ''|| 
                this.dato.observaciones.trim() === ''){
                alert('Debes completar todos los campos antes de guardar');
                return;
            }

            const datoNueva = this.dato;
            this.dato = {id_arrendatario:'',direccion:'',observaciones:''},
            axios.post('/inmueble', datoNueva)
                .then((res) =>{
                const datoServidor = res.data;
                this.datos.push(datoServidor);
                })
            alert('Usuario Guardado con Correctamente');
            },

            eliminar(item ,index){
                const confirmacion = confirm(`desea eliminar el inmueble: ${item.codigo}`);
                if (confirmacion) {
                    axios.delete(`/inmueble/${item.id}`)
                    .then(()=>{
                        this.datos.splice(index,1);
                    })
                }
            },

            info(item){
                this.dato.id = item.id;
                this.dato.direccion = item.direccion;
                this.dato.observaciones = item.observaciones;
            },
            editar(dato){
                
                if(
                    this.dato.direccion.trim() === ''|| 
                    this.dato.observaciones.trim() === ''){
                alert('Debes completar todos los campos antes de guardar');
                return;
            }else{

                const params = {id_arrendatario: dato.id_arrendatario, direccion:dato.direccion,observaciones:dato.observaciones}
                axios.put(`/inmueble/${dato.id}`, params)
                    .then(res=>{
                        axios.get('/inmueble')
                        .then(res=>{
                            this.datos = res.data.inmueble.data
                        })
                    alert('Usuario Guardado con Correctamente'); 
                    })
                }
            },
            buscar(){
                axios.get(`/inmuebles?nombre=${this.busqueda}`)
                        .then(res=>{
                            this.datos = res.data;
                })
            },
             getinmueble: function(page){

               axios.get('inmueble?page='+page)
                .then(res=>{
                this.datos = res.data.inmueble.data,
                this.pagination = res.data.paginate
            })
            },
            changePage: function(page){
                this.pagination.current_page = page;
                this.getinmueble(page);
            }
        }
    }
</script>
