<template>
    <div class="row">
    <div class="">
        <div class="card card-transparent">
            <button class="btn btn-primary" data-target="#modalSlideUp" data-toggle="modal" id="btnFillSizeToggler">Registrar Nueva Factura</button>
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
                    <th style="width:20%">inquilino</th>
                    <th style="width:20%">inmueble</th>
                    <th style="width:20%">contrato</th>
                    <th style="width:20%">periodo</th>
                    <th style="width:20%">avaladora</th>
                    <th style="width:20%">multas</th>
                    <th style="width:20%">otros</th>
                    <th style="width:20%">total</th>
                    <th style="width:20%">editar</th>
                    <th style="width:20%">eliminar</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
                   <tbody>
                    <tr v-for="(item, index) in datos" :key="index">
                    <td class="v-align-middle ">
                        <p>{{item.id_inquilino}}</p>
                    </td>
                    <td class="v-align-middle ">
                        <p>{{item.id_inmueble}}</p>
                    </td>
                    <td class="v-align-middle ">
                        <p>{{item.id_contrato}}</p>
                    </td>
                    <td class="v-align-middle ">
                        <p>{{item.periodo}}</p>
                    </td>
                    <td class="v-align-middle ">
                        <p>{{item.avaladora}}</p>
                    </td>
                    <td class="v-align-middle ">
                        <p>{{item.multas}}</p>
                    </td>
                    <td class="v-align-middle ">
                        <p>{{item.otros}}</p>
                    </td>
                    <td class="v-align-middle ">
                        <p>{{item.total}}</p>
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
                        <label>inquilino</label>
                        <select class="cs-select cs-skin-slide full-width"  data-init-plugin="select2"
                        v-model="dato.id_inquilino" 
                        required>
                            <option v-for="option in inquilino" v-bind:key="option.id" v-bind:value="option.id">{{option.id}}</option>
                        </select>
                    </div>
                    <div class="form-group form-group-default required">
                        <label>inmueble</label>
                        <select class="cs-select cs-skin-slide full-width"  data-init-plugin="select2"
                        v-model="dato.id_inmueble" 
                        required>
                            <option v-for="option in inmueble" v-bind:key="option.id" v-bind:value="option.id">{{option.id}}</option>
                        </select>
                    </div>
                    <div class="form-group form-group-default required">
                        <label>contrato</label>
                        <select class="cs-select cs-skin-slide full-width"  data-init-plugin="select2"
                        v-model="dato.id_contrato" 
                        required>
                            <option v-for="option in contrato" v-bind:key="option.id" v-bind:value="option.id">{{option.id}}</option>
                        </select>
                    </div>
                    <div class="form-group form-group-default required">
                        <label>contrato</label>
                        <select class="cs-select cs-skin-slide full-width"  data-init-plugin="select2"
                        v-model="dato.periodo" 
                        required>
                            <option value="enero">enero</option>
                            <option value="febrero">febrero</option>
                            <option value="marzo">marzo</option>
                            <option value="abril">abril</option>
                            <option value="mayo">mayo</option>
                            <option value="junio">junio</option>
                            <option value="julio">julio</option>
                            <option value="agosto">agosto</option>
                            <option value="septiembre">septiembre</option>
                            <option value="octubre">octubre</option>
                            <option value="noviembre">noviembre</option>
                             <option value="diciembre">diciembre</option>
                        </select>
                    </div>
                </div>
                <div class="form-group-attached">
                    <div class="form-group form-group-default required">
                        <label>avaladora <i class="fa fa-info text-complete m-l-5"></i>
                        </label>
                        <input type="number" class="form-control" v-model="dato.avaladora" required>
                    </div>
                    <div class="form-group form-group-default required">
                        <label>multas</label>
                        <input type="multas" class="form-control" v-model="dato.multas" maxlength="40" required>
                    </div>
                    <div class="form-group form-group-default required">
                        <label>otros <i class="fa fa-info text-complete m-l-5"></i>
                        </label>
                        <input type="number" class="form-control" v-model="dato.otros" required>
                    </div>
                    <div class="form-group form-group-default required">
                        <label>total <i class="fa fa-info text-complete m-l-5"></i>
                        </label>
                        <input type="number" class="form-control" v-model="dato.total" required>
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
            <h5>Informacion del <span class="semi-bold">factura</span></h5>
            <p class="p-b-10">Recuerde que todos los campos deben ser diligenciados</p>
        </div>
        <div class="modal-body">
            <form role="form"  @submit.prevent="agregar">
                <div class="form-group-attached">
                    <div class="form-group form-group-default required">
                        <label>inquilino</label>
                        <select class="cs-select cs-skin-slide full-width"  data-init-plugin="select2"
                        v-model="dato.id_inquilino" 
                        required>
                            <option v-for="option in inquilino" v-bind:key="option.id" v-bind:value="option.id">{{option.id}}</option>
                        </select>
                    </div>
                    <div class="form-group form-group-default required">
                        <label>inmueble</label>
                        <select class="cs-select cs-skin-slide full-width"  data-init-plugin="select2"
                        v-model="dato.id_inmueble" 
                        required>
                            <option v-for="option in inmueble" v-bind:key="option.id" v-bind:value="option.id">{{option.id}}</option>
                        </select>
                    </div>
                    <div class="form-group form-group-default required">
                        <label>contrato</label>
                        <select class="cs-select cs-skin-slide full-width"  data-init-plugin="select2"
                        v-model="dato.id_contrato" 
                        required>
                            <option v-for="option in contrato" v-bind:key="option.id" v-bind:value="option.id">{{option.id}}</option>
                        </select>
                    </div>
                    <div class="form-group form-group-default required">
                        <label>contrato</label>
                        <select class="cs-select cs-skin-slide full-width"  data-init-plugin="select2"
                        v-model="dato.periodo" 
                        required>
                            <option value="enero">enero</option>
                            <option value="febrero">febrero</option>
                            <option value="marzo">marzo</option>
                            <option value="abril">abril</option>
                            <option value="mayo">mayo</option>
                            <option value="junio">junio</option>
                            <option value="julio">julio</option>
                            <option value="agosto">agosto</option>
                            <option value="septiembre">septiembre</option>
                            <option value="octubre">octubre</option>
                            <option value="noviembre">noviembre</option>
                             <option value="diciembre">diciembre</option>
                        </select>
                    </div>
                </div>
                <div class="form-group-attached">
                    <div class="form-group form-group-default required">
                        <label>avaladora <i class="fa fa-info text-complete m-l-5"></i>
                        </label>
                        <input type="number" class="form-control" v-model="dato.avaladora" required>
                    </div>
                    <div class="form-group form-group-default required">
                        <label>multas</label>
                        <input type="multas" class="form-control" v-model="dato.multas" maxlength="40" required>
                    </div>
                    <div class="form-group form-group-default required">
                        <label>otros <i class="fa fa-info text-complete m-l-5"></i>
                        </label>
                        <input type="number" class="form-control" v-model="dato.otros" required>
                    </div>
                    <div class="form-group form-group-default required">
                        <label>total <i class="fa fa-info text-complete m-l-5"></i>
                        </label>
                        <input type="number" class="form-control" v-model="dato.total" required>
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
                
                inquilino:[],
                contrato:[],
                inmueble:[],
                datos:[],
                dato:{id_inquilino:'',id_inmueble:'',id_contrato:'',periodo:'',avaladora:'',multas:'',otros:'',total:''},
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
            
            axios.get('/factura')
            .then(res=>{
                this.inquilino = res.data.inquilino,
                this.datos = res.data.factura.data,
                this.contrato = res.data.contrato,
                this.inmueble = res.data.inmueble,
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
            if(
                this.dato.periodo.trim() === ''||
                this.dato.avaladora.trim() === ''|| 
                this.dato.multas.trim() === ''||
                this.dato.otros.trim() === ''|| 
                this.dato.total.trim() === ''){
                alert('Debes completar todos los campos antes de guardar');
                return;
            }
            const datoNueva = this.dato;
            this.dato = {id_inquilino:'',id_inmueble:'',id_contrato:'',periodo:'',avaladora:'',multas:'',otros:'',total:''},
            axios.post('/factura', datoNueva)
                .then((res) =>{
                const datoServidor = res.data;
                this.datos.push(datoServidor);
                })
            alert('Usuario Guardado con Correctamente');
            },

            eliminar(item ,index){
                const confirmacion = confirm(`desea eliminar la factura: ${item.id}`);
                if (confirmacion) {
                    axios.delete(`/factura/${item.id}`)
                    .then(()=>{
                        this.datos.splice(index,1);
                    })
                }
            },

            info(item){
                this.dato.id = item.id;
                this.dato.id_inquilino = item.id_inquilino;
                this.dato.id_inmueble = item.id_inmueble;
                this.dato.id_contrato = item.id_contrato;
                this.dato.periodo = item.periodo;
                this.dato.avaladora = item.avaladora;
                this.dato.multas = item.multas;
                this.dato.otros = item.otros;
                this.dato.total = item.total;
            },
            editar(dato){

                const params =  {id_inquilino:dato.id_inquilino,id_inmueble:dato.id_inmueble,id_contrato:dato.id_contrato,
                periodo:dato.periodo,avaladora:dato.avaladora,multas:dato.multas,otros:dato.otros,total:dato.total}
                axios.put(`/factura/${dato.id}`, params)
                    .then(res=>{
                        axios.get('/factura')
                        .then(res=>{
                            this.datos = res.data.factura.data
                        })
                    alert('Usuario Guardado con Correctamente'); 
                    })
            },
            buscar(){
                axios.get(`/facturas?nombre=${this.busqueda}`)
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
