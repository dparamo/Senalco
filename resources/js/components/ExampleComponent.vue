<template>
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="row justify-content-center">
                <div class="widget-11-2 card no-border card-condensed no-margin widget-loader-circle d-flex flex-column align-self-stretch">
                    <div class="card-header top-right">
                        <div class="card-controls">
                        <ul>
                            <li><a data-toggle="refresh" class="portlet-refresh text-black" href="#"><i class="portlet-icon portlet-icon-refresh"></i></a>
                            </li>
                        </ul>
                        </div>
                    </div>
                    <div class="padding-25">
                        <div class="pull-left">
                        <h2 class="text-success no-margin">Inquilinos</h2>
                        <p class="no-margin">Ultimos inquilinos Registrados</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="auto-overflow widget-11-2-table">
                        <table class="table table-condensed table-hover">
                        <tbody>
                            <tr v-for="(item, index) in inquilinos" :key="index">
                                <td class="font-montserrat all-caps fs-12 w-50">{{item.nombre}}</td>
                                <td class="font-montserrat all-caps fs-12 w-50">{{item.email}}</td>
                                <td class="font-montserrat all-caps fs-12 w-50">{{item.telefono}}</td>
                                <td class="font-montserrat all-caps fs-12 w-50">{{item.estado}}</td>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-5">
                <div class="row justify-content-center">
                <div class="widget-11-2 card no-border card-condensed no-margin widget-loader-circle d-flex flex-column align-self-stretch">
                    <div class="card-header top-right">
                        <div class="card-controls">
                        <ul>
                            <li><a data-toggle="refresh" class="portlet-refresh text-black" href="#"><i class="portlet-icon portlet-icon-refresh"></i></a>
                            </li>
                        </ul>
                        </div>
                    </div>
                    <div class="padding-25">
                        <div class="pull-left">
                        <h2 class="text-success no-margin">Inmuebles</h2>
                        <p class="no-margin">Ultimos Inmuebles Registrados</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="auto-overflow widget-11-2-table">
                        <table class="table table-condensed table-hover">
                        <tbody>
                            <tr v-for="(item, index) in inmuebles" :key="index">
                                <td class="font-montserrat all-caps fs-12 w-50">{{item.id}}</td>
                                <td class="font-montserrat all-caps fs-12 w-50">{{item.direccion}}</td>
                                <td class="font-montserrat all-caps fs-12 w-50">{{item.Observaciones}}</td>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-5">
                <div class="row justify-content-center">
                <div class="widget-11-2 card no-border card-condensed no-margin widget-loader-circle d-flex flex-column align-self-stretch">
                    <div class="card-header top-right">
                        <div class="card-controls">
                        <ul>
                            <li><a data-toggle="refresh" class="portlet-refresh text-black" href="#"><i class="portlet-icon portlet-icon-refresh"></i></a>
                            </li>
                        </ul>
                        </div>
                    </div>
                    <div class="padding-25">
                        <div class="pull-left">
                        <h2 class="text-success no-margin">Contratos</h2>
                        <p class="no-margin">Ultimos Contratos Registrados</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="auto-overflow widget-11-2-table">
                        <table class="table table-condensed table-hover">
                        <tbody>
                            <tr v-for="(item, index) in contratos" :key="index">
                                <td class="font-montserrat all-caps fs-12 w-50">{{item.id}}</td>
                                <td class="font-montserrat all-caps fs-12 w-50">{{item.inicontrato}}</td>
                                <td class="font-montserrat all-caps fs-12 w-50">{{item.fincontrato}}</td>
                                <td class="font-montserrat all-caps fs-12 w-50">{{item.total}}</td>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-5">
                <div class="row justify-content-center">
                <div class="widget-11-2 card no-border card-condensed no-margin widget-loader-circle d-flex flex-column align-self-stretch">
                    <div class="card-header top-right">
                        <div class="card-controls">
                        <ul>
                            <li><a data-toggle="refresh" class="portlet-refresh text-black" href="#"><i class="portlet-icon portlet-icon-refresh"></i></a>
                            </li>
                        </ul>
                        </div>
                    </div>
                    <div class="padding-25">
                        <div class="pull-left">
                        <h2 class="text-success no-margin">Arrendadores</h2>
                        <p class="no-margin">Ultimos Arrendadores Registrados</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="auto-overflow widget-11-2-table">
                        <table class="table table-condensed table-hover">
                        <tbody>
                            <tr v-for="(item, index) in arrendatarios" :key="index">
                                <td class="font-montserrat all-caps fs-12 w-50">{{item.nombre}}</td>
                                <td class="font-montserrat all-caps fs-12 w-50">{{item.email}}</td>
                                <td class="font-montserrat all-caps fs-12 w-50">{{item.telefono}}</td>
                                <td class="font-montserrat all-caps fs-12 w-50">{{item.id}}</td>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                inquilinos:[],
                arrendatarios:[],
                contratos:[],
                inmuebles:[]
            }
        },
        created(){
            
            axios.get('/home')
            .then(res=>{
                this.arrendatarios = res.data.arrendatario.data,
                this.inquilinos = res.data.inquilino.data,
                this.inmuebles = res.data.inmueble.data,
                this.contratos = res.data.contrato.data
            })
        },
    }
</script>

