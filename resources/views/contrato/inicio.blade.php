@extends('layouts.app')

@section('bread')
<div class="container">
              <ol class="breadcrumb breadcrumb-alt">
                <li class="breadcrumb-item"><a href="#">contrato</a></li>
                <li class="breadcrumb-item active">Inicio</li>
              </ol>
</div>
@endsection

@section('content')
  <contrato-component></contrato-component>
@endsection
