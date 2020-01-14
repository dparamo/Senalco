@extends('layouts.app')

@section('bread')
<div class="container">
              <ol class="breadcrumb breadcrumb-alt">
                <li class="breadcrumb-item"><a href="/inquilino">inquilino</a></li>
                <li class="breadcrumb-item active">Editar</li>
              </ol>
</div>
@endsection

@section('content')
          <!-- START CONTAINER FLUID -->
          <div class=" no-padding    container-fixed-lg bg-white">
            <div class="container">
              <div class="row">
                <div class="col-md-5">
                  <!-- START card -->
                  <div class="card card-transparent">
                    <div class="card-header ">
                      <div class="card-title">Attached form layouts
                      </div>
                    </div>
                    <div class="card-body">
                      <h3>Attach your Forms to Organize
    							&amp; Create Contemporary feels</h3>
                      <p>Despite the UI, We thought of the User experience, With attached From Layouts you can simply categories Important fields and prioritize them.</p>
                      <br>
                      <div>
                        <div class="profile-img-wrapper m-t-5 inline">
                          <img width="35" height="35" src="assets/img/profiles/avatar_small.jpg" alt="" data-src="assets/img/profiles/avatar_small.jpg" data-src-retina="assets/img/profiles/avatar_small2x.jpg">
                          <div class="chat-status available">
                          </div>
                        </div>
                        <div class="inline m-l-10">
                          <p class="small hint-text">VIA senior product manage
                            <br> for UI/UX at REVOX</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- END card -->
                </div>
                <div class="col-md-7">
                  <!-- START card -->
                  <div class="card card-transparent">
                    <div class="card-body">
                      <form method="POST" sid="form-project" role="form" autocomplete="off" action="/inquilino/update/{{$id}}">
                      @csrf
                        <p>Informacion del inquilino</p>
                        <div class="form-group-attached">
                          <div class="form-group form-group-default required">
                            <label>Nombre Completo</label>
                            <input type="text" class="form-control" name="nombre" maxlength="30" placeholder="{{$inqui['nombre']}}" required>
                          </div>
                          <div class="row clearfix">
                            <div class="col-md-12">
                              <div class="form-group form-group-default">
                                <label>Codigo</label>
                                <input type="text" class="form-control" name="codigo" maxlength="15" placeholder="{{$inqui['codigo']}}"required>
                              </div>
                            </div>
                          </div>
                        </div>
                        <p class="m-t-10">Informacion de contacto</p>
                        <div class="form-group-attached">
                          <div class="form-group form-group-default">
                            <label>Email <i class="fa fa-info text-complete m-l-5"></i>
                            </label>
                            <input type="email" class="form-control" name="email" placeholder="{{$inqui['email']}}"required>
                          </div>
                          <div class="row clearfix">
                            <div class="col-md-6">
                              <div class="form-group form-group-default required">
                                <label>Telefono</label>
                                <input id="start-date" type="number" class="form-control date" name="telefono" maxlength="15" placeholder="{{$inqui['telefono']}}" required>
                              </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-group-default form-group-default-select2 required">
                                    <label class="">Estado</label>
                                    <select class="full-width select2-hidden-accessible" name ="estado" data-init-plugin="select2" tabindex="-1" aria-hidden="true" required>
                                        <option selected="true" value="{{$inqui['estado']}}">{{$inqui['estado']}}</option>
                                        <option value="aldia">aldia</option>
                                        <option value="atrasado">atrasado</option>
                                        <option value="urgente">urgente</option>
                                        <option value="juridico">juridico</option>
                                    </select>
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group form-group-default required">
                                <label>Observaciones</label>
                                <input type="text" class="form-control" name="observaciones" placeholder="{{$inqui['observaciones']}}" maxlength="50" required>
                              </div>
                            </div>
                          </div>
                        </div>
                        <br>
                        <button class="btn btn-success" type="submit">Submit</button>
                        <button class="btn btn-default"><i class="pg-close"></i> Clear</button>
                      </form>
                    </div>
                  </div>
                  <!-- END card -->
                </div>
              </div>
            </div>
          </div>
          <!-- END CONTAINER FLUID -->   
@endsection