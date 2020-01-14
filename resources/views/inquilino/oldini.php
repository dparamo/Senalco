@extends('layouts.app')

@section('bread')
<div class="container">
              <ol class="breadcrumb breadcrumb-alt">
                <li class="breadcrumb-item"><a href="#">inquilino</a></li>
                <li class="breadcrumb-item active">Inicio</li>
              </ol>
</div>
@endsection

@section('content')
<div class="row">
  <div class="">
    <div class="card card-transparent">
      <a href="/inquilino/nuevo" class="btn btn-primary">Registrar Nuevo Inquilino</a>
      <div class="card-header ">
        <div class="card-title">
          Listado de inquilos registrados
        </div>
        <form method="GET">
          <div class="input-group transparent">
            <div class="input-group-prepend">
              <span class="input-group-text transparent"><i class=" pg-search"></i>
                </span>
            </div>
            <input type="text" placeholder="Nombre" class="form-control" name="nombre">
          </div>
        </form>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <div class="dataTables_wrapper no-footer" id="condensedTable_wrapper">
            <table class="table table-hover table-condensed dataTable no-footer" id="condensedTable_wrapper" role="grid">
              <thead>
                <tr>
                  <th style="width:20%">nombre</th>
                  <th style="width:20%">codigo</th>
                  <th style="width:20%">email</th>
                  <th style="width:20%">telefono</th>
                  <th style="width:20%">observaciones</th>
                  <th style="width:20%">estado</th>
                  <th style="width:20%">Eliminar</th>
                  <th style="width:20%">Editar</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($datos as  $clave => $dato)
                <tr id="inquilino_{{$dato['id']}}">
                  <td class="v-align-middle ">
                    <p>{{$dato['nombre']}}</p>
                  </td><td class="v-align-middle ">
                    <p>{{$dato['codigo']}}</p>
                  </td>
                  <td class="v-align-middle ">
                    <p>{{$dato['email']}}</p>
                  </td>
                  <td class="v-align-middle">
                    <p>{{$dato['telefono']}}</p>
                  </td>
                  <td class="v-align-middle">
                    <p>{{$dato['observaciones']}}</p>
                  </td>
                  <td class="v-align-middle">
                    <p>{{$dato['estado']}}</p>
                  </td>
                  <td class="v-align-middle">
                      <button class="btn btn-danger" type ="submit" onclick="eliminar({{$dato['id']}})">Eliminar</button>
                  </td>
                  <td class="v-align-middle">
                    <a class="btn btn-primary" href="inquilino/editar/{{$dato['id']}}">editar</a>
                  </td>
                </tr>
              @endforeach  
              </tbody>
            </table>
            {{ $datos->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>  
</div>

@endsection

@section('script')
<script type="text/javascript">


  function eliminar(id) {

    var r = confirm("desea eliminar"); 

    if (r == true) {
      $.ajax({
        url: '/inquilino/eliminar/' + id,
        type: 'DELETE',
        headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        dataType:'json',
        success: function(result) {
          $("#inquilino_"+id).remove();
        }
       }); 
      }
   
  }
</script>
@endsection