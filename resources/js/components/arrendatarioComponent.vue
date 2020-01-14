<template>
    <div class="row">
    <div class="">
        <div class="card card-transparent">
            <button class="btn btn-primary" data-target="#modalSlideUp" data-toggle="modal" id="btnFillSizeToggler">Registrar Nuevo arrendatario</button>
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
                    <th style="width:20%">ID</th>
                    <th style="width:20%">Nombre</th>
                    <th style="width:20%">Email</th>
                    <th style="width:20%">Telefono</th>
                    <th style="width:20%">Observaciones</th>
                    <th style="width:20%">Estado</th>
                    <th style="width:20%">Eliminar</th>
                    <th style="width:20%">Editar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(item, index) in datos" :key="index">
                    <td class="v-align-middle ">
                        <p>{{item.id}}</p>
                    </td>
                    <td class="v-align-middle ">
                        <p>{{item.nombre}}</p>
                    </td>
                    <td class="v-align-middle ">
                        <p>{{item.email}}</p>
                    </td>
                    <td class="v-align-middle ">
                        <p>{{item.telefono}}</p>
                    </td>
                    <td class="v-align-middle ">
                        <p>{{item.observaciones}}</p>
                    </td>
                    <td class="v-align-middle ">
                        <p>{{item.estado}}</p>
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
            <h5>Informacion del <span class="semi-bold">arrendatario</span></h5>
            <p class="p-b-10">Recuerde que todos los campos deben ser diligenciados</p>
        </div>
        <div class="modal-body">
            <form role="form"  @submit.prevent="editar(dato)">
                <div class="form-group-attached">
                    <div class="form-group form-group-default required">
                        <label>Nombre Completo</label>
                        <input type="text" class="form-control" v-model="dato.nombre" maxlength="30" required>
                    </div>
                </div>
                <p class="m-t-10">Informacion de contacto</p>
                <div class="form-group-attached">
                    <div class="form-group form-group-default required">
                    <label>Email <i class="fa fa-info text-complete m-l-5"></i>
                    </label>
                    <input type="email" class="form-control" v-model="dato.email" required>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group form-group-default required">
                        <label>Telefono</label>
                        <input type="number" class="form-control" v-model="dato.telefono" maxlength="15" required>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default required">
                            <label>Observaciones</label>
                            <input type="text" class="form-control" v-model="dato.observaciones" maxlength="50" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="radio radio-success">
                                <input type="radio" value="aldia" v-model="dato.estado" id="aldia">
                                <label for="aldia">aldia</label>
                                <input type="radio" value="atrasado" v-model="dato.estado" id="atrasado">
                                <label for="atrasado">atrasado</label>
                                <input type="radio" value="urgente" v-model="dato.estado" id="urgente">
                                <label for="urgente">urgente</label>
                                <input type="radio" value="juridico" v-model="dato.estado" id="juridico">
                                <label for="juridico">juridico</label>
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
            <h5>Informacion del <span class="semi-bold">arrendatario</span></h5>
            <p class="p-b-10">Recuerde que todos los campos deben ser diligenciados</p>
        </div>
        <div class="modal-body">
            <form role="form"  @submit.prevent="agregar">
                <div class="form-group-attached">
                    <div class="form-group form-group-default required">
                        <label>Nombre Completo</label>
                        <input type="text" class="form-control" v-model="dato.nombre" maxlength="30" required>
                    </div>
                </div>
                <p class="m-t-10">Informacion de contacto</p>
                <div class="form-group-attached">
                    <div class="form-group form-group-default required">
                    <label>Email <i class="fa fa-info text-complete m-l-5"></i>
                    </label>
                    <input type="email" class="form-control" v-model="dato.email" required>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group form-group-default required">
                        <label>Telefono</label>
                        <input type="number" class="form-control" v-model="dato.telefono" maxlength="15" required>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default required">
                            <label>Observaciones</label>
                            <input type="text" class="form-control" v-model="dato.observaciones" maxlength="50" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="radio radio-success">
                                <input type="radio" value="aldia" v-model="dato.estado" id="aldia">
                                <label for="aldia">aldia</label>
                                <input type="radio" value="atrasado" v-model="dato.estado" id="atrasado">
                                <label for="atrasado">atrasado</label>
                                <input type="radio" value="urgente" v-model="dato.estado" id="urgente">
                                <label for="urgente">urgente</label>
                                <input type="radio" value="juridico" v-model="dato.estado" id="juridico">
                                <label for="juridico">juridico</label>
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
                dato:{nombre:'',email:'',telefono:'',observaciones:'',estado:''},
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
            
            axios.get('/arrendatario')
            .then(res=>{
                this.datos = res.data.arrendatario.data,
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
            agregar(){

            if(this.dato.nombre.trim() === '' || this.dato.telefono.trim() === ''|| this.dato.telefono.trim() === ''|| this.dato.observaciones.trim() === ''|| this.dato.estado.trim() === ''){
                alert('Debes completar todos los campos antes de guardar');
                return;
            }

            const datoNueva = this.dato;
            this.dato = {nombre: '',email:'',telefono:'',observaciones:'',estado:''}
            axios.post('/arrendatario', datoNueva)
                .then((res) =>{
                const datoServidor = res.data;
                this.datos.push(datoServidor);
                })
            alert('Usuario Guardado con Correctamente');
            },

            eliminar(item ,index){
                const confirmacion = confirm(`desea eliminar el usuario: ${item.nombre}`);
                if (confirmacion) {
                    axios.delete(`/arrendatario/${item.id}`)
                    .then(()=>{
                        this.datos.splice(index,1);
                    })
                    .catch(function (error) {
                        alert('el usuario no se puede eliminar: revisar inmuebles');
                    });
                }
            },

            info(item){
                this.dato.id = item.id;
                this.dato.nombre = item.nombre;
                this.dato.telefono = item.telefono;
                this.dato.email = item.email;
                this.dato.observaciones = item.observaciones;
                this.dato.estado = item.estado;

            },
            editar(dato){
                
                if(
                    this.dato.nombre.trim() === '' || 
                    this.dato.telefono.trim() === ''|| 
                    this.dato.email.trim() === ''|| 
                    this.dato.observaciones.trim() === ''||
                    this.dato.estado.trim() === ''){
                alert('Debes completar todos los campos antes de guardar');
                return;
            }else{
                
                const params = {nombre: dato.nombre,email:dato.email,telefono:dato.telefono,observaciones:dato.observaciones,estado:dato.estado}
                axios.put(`/arrendatario/${dato.id}`, params)
                    .then(res=>{
                        axios.get('/arrendatario')
                        this.datos = res.data.arrendatario.data,
                        alert('Usuario Guardado con Correctamente'); 
                    })
                    
                
                }
            },
            buscar(){
                axios.get(`/arrendatarios?nombre=${this.busqueda}`)
                        .then(res=>{
                            this.datos = res.data;
                })
            },
             getarrendatario: function(page){

               axios.get('arrendatario?page='+page)
                .then(res=>{
                this.datos = res.data.arrendatario.data,
                this.pagination = res.data.paginate
            })
            },
            changePage: function(page){
                this.pagination.current_page = page;
                this.getarrendatario(page);
            }
        }
    }
     //falta validacion con inmueble
</script>
