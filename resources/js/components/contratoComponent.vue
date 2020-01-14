<template>
    <div class="row">
    <div class="">
        <div class="card card-transparent">
            <button class="btn btn-primary" data-target="#modalSlideUp" data-toggle="modal" id="btnFillSizeToggler">Registrar Nuevo contrato</button>
        <div class="card-header ">
            <div class="card-title">
            Listado de contratos registrados
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
                        <th style="width:10%">id</th>
                        <th style="width:10%">inquilino</th>
                        <th style="width:10%">id_inmueble</th>
                        <th style="width:10%">inicontrato</th>
                        <th style="width:10%">fincontrato</th>
                        <th style="width:10%">canon</th>
                        <th style="width:10%">administracion</th>
                        <th style="width:10%">total</th>
                        <th style="width:10%">observaciones</th>
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
                        <p>{{tablafinal(item.id_inquilino)}}</p>
                    </td>
                    <td class="v-align-middle ">
                        <p>{{item.id_inmueble}}</p>
                    </td>
                    <td class="v-align-middle ">
                        <p>{{item.inicontrato}}</p>
                    </td>
                    <td class="v-align-middle ">
                        <p>{{item.fincontrato}}</p>
                    </td>
                    <td class="v-align-middle ">
                        <p>{{item.valorcanon}}</p>
                    </td>
                    <td class="v-align-middle ">
                        <p>{{item.valoradmin}}</p>
                    </td>
                     <td class="v-align-middle ">
                        <p>{{item.total}}</p>
                    </td>
                    <td class="v-align-middle ">
                        <p>{{item.observaciones}}</p>
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
<div class="modal fade slide-up disable-scroll" id="modalSlideUp2" tabindex="-1" role="dialog" aria-hidden="false">º
    <div class="modal-dialog ">
    <div class="modal-content-wrapper">
        <div class="modal-content">
        <div class="modal-header clearfix text-left">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
            </button>
            <h5>Informacion del <span class="semi-bold">contrato</span></h5>
            <p class="p-b-10">Recuerde que todos los campos deben ser diligenciados</p>
        </div>
        <div class="modal-body">
            <form role="form"  @submit.prevent="editar(dato)">
                                <div class="form-group-attached">
                    <div class="form-group form-group-default required">
                        <label>id_inquilino</label>
                        <select class="cs-select cs-skin-slide full-width"  data-init-plugin="select2"
                        v-model="dato.id_inquilino" 
                        required>
                            <option v-for="option in inquilinos" v-bind:key="option.id" v-bind:value="option.id">{{option.nombre}}</option>
                        </select>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                            <label>id_inmueble</label>
                            <select class="cs-select cs-skin-slide full-width"  data-init-plugin="select2"
                        v-model="dato.id_inmueble" 
                        required>
                            <option v-for="option in inmuebles" v-bind:key="option.id" v-bind:value="option.id">{{option.id}}</option>
                        </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group-attached">
                    <div class="form-group form-group-default required">
                    <label>Fecha Inicio Contrato <i class="fa fa-calendar text-complete m-l-5"></i>
                    </label>
                    <input type="text" class="form-control" v-model="dato.inicontrato" id="datepicker-component" required>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group form-group-default required">
                        <label>Fecha Fin Contrato<i class="fa fa-calendar text-complete m-l-5"></i>
                        </label>
                        <input type="text" class="form-control" v-model="dato.fincontrato" id="datepicker-component" required>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default required">
                            <label>valorcanon</label>
                            <input type="number" class="form-control" v-model="dato.valorcanon" maxlength="50" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default required">
                            <label>valoradmin</label>
                            <input type="number" class="form-control" v-model="dato.valoradmin" maxlength="50" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default required">
                            <label>total</label>
                            <input type="number" class="form-control" v-model="dato.total" maxlength="50" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default required">
                            <label>observaciones</label>
                            <input type="text" class="form-control" v-model="dato.observaciones" maxlength="50" required>
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
            <h5>Informacion del <span class="semi-bold">contrato</span></h5>
            <p class="p-b-10">Recuerde que todos los campos deben ser diligenciados</p>
        </div>
        <div class="modal-body">
            <form role="form"  @submit.prevent="agregar">
                                <div class="form-group-attached">
                    <div class="form-group form-group-default required">
                        <label>id_inquilino</label>
                        <select class="cs-select cs-skin-slide full-width"  data-init-plugin="select2"
                        v-model="dato.id_inquilino" 
                        required>
                            <option v-for="option in inquilinos" v-bind:key="option.id" v-bind:value="option.id">{{option.nombre}}</option>
                        </select>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                            <label>id_inmueble</label>
                            <select class="cs-select cs-skin-slide full-width"  data-init-plugin="select2"
                        v-model="dato.id_inmueble" 
                        required>
                            <option v-for="option in inmuebles" v-bind:key="option.id" v-bind:value="option.id">{{option.id}}</option>
                        </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group-attached">
                    <div class="form-group form-group-default required">
                    <label>Fecha Inicio Contrato <i class="fa fa-calendar text-complete m-l-5"></i>
                    </label>
                    <input type="text" class="form-control" v-model="dato.inicontrato" id="datepicker-component" required>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group form-group-default required">
                        <label>Fecha Fin Contrato<i class="fa fa-calendar text-complete m-l-5"></i>
                        </label>
                        <input type="text" class="form-control" v-model="dato.fincontrato" id="datepicker-component" required>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default required">
                            <label>valorcanon</label>
                            <input type="number" class="form-control" v-model="dato.valorcanon" maxlength="50" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default required">
                            <label>valoradmin</label>
                            <input type="number" class="form-control" v-model="dato.valoradmin" maxlength="50" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default required">
                            <label>total</label>
                            <input type="number" class="form-control" v-model="dato.total" maxlength="50" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default required">
                            <label>observaciones</label>
                            <input type="text" class="form-control" v-model="dato.observaciones" maxlength="50" required>
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
                dato:{id_inquilino:'',id_inmueble:'',
                inicontrato:'',fincontrato:'',valorcanon:'',
                valoradmin:'',total:'',observaciones:''},
                inmuebles:[],
                inquilinos:[],
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
            
            axios.get('/contrato')
            .then(res=>{
                this.datos = res.data.contrato.data,
                this.inmuebles = res.data.inmueble,
                this.inquilinos = res.data.inquilino,
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
                return this.inquilinos.find(element => element.id == id).nombre
            },
            agregar(){

            if(
                this.dato.valorcanon.trim() === ''|| 
                this.dato.valoradmin.trim() === ''|| 
                this.dato.total.trim() === ''|| 
                this.dato.observaciones.trim() === ''){
                alert('Debes completar todos los campos antes de guardar');
                return;
            }

            const datoNueva = this.dato;
            this.dato = {id_inquilino:'',id_inmueble:'',inicontrato:'',fincontrato:'',valorcanon:'',
                        valoradmin:'',total:'',observaciones:''}
            axios.post('/contrato', datoNueva)
                .then((res) =>{
                const datoServidor = res.data;
                this.datos.push(datoServidor);
                })
            alert('Contrato Creado con Correctamente');
            },

            eliminar(item ,index){
                const confirmacion = confirm(`desea eliminar el usuario: ${item.nombre}`);
                if (confirmacion) {
                    axios.delete(`/contrato/${item.id}`)
                    .then(()=>{
                        this.datos.splice(index,1);
                    })
                    
                }
            },

            info(item){
                this.dato.id = item.id;
                this.dato.inicontrato = item.inicontrato;
                this.dato.fincontrato = item.fincontrato;
                this.dato.valorcanon = item.valorcanon;
                this.dato.valoradmin = item.valoradmin;
                this.dato.total = item.total;
                this.dato.observaciones = item.observaciones;
            },
            editar(dato){
                
                if(
                    this.dato.inicontrato.trim() === '' || 
                    this.dato.fincontrato.trim() === ''|| 
                    this.dato.observaciones.trim() === ''){    
                    alert('Debes completar todos los campos antes de guardar');
                return;
            }else{
                
                const params = {id_inquilino:dato.id_inquilino,id_inmueble:dato.id_inmueble,inicontrato:dato.inicontrato,fincontrato:dato.fincontrato,valorcanon:dato.valorcanon,
                        valoradmin:dato.valoradmin,total:dato.total,observaciones:dato.observaciones}
                axios.put(`/contrato/${dato.id}`, params)
                    .then(res=>{
                        axios.get('/contrato')
                        .then(res=>{
                            this.datos = res.data.contrato.data
                        })
                    alert('Contrato editado Correctamente'); 
                    })
                
                }
            },
            buscar(){
                axios.get(`/contratos?nombre=${this.busqueda}`)
                        .then(res=>{
                            this.datos = res.data;
                })
            },
             getcontrato: function(page){

               axios.get('contrato?page='+page)
                .then(res=>{
                this.datos = res.data.contrato.data,
                this.pagination = res.data.paginate
            })
            },
            changePage: function(page){
                this.pagination.current_page = page;
                this.getcontrato(page);
            }
        }
    }
</script>
