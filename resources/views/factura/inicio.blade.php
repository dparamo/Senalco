@extends('layouts.app')

@section('bread')
<div class="container">
              <ol class="breadcrumb breadcrumb-alt">
                <li class="breadcrumb-item"><a href="#">Facturas</a></li>
              </ol>
</div>
@endsection

@section('content')
  <factura-component></factura-component>
@endsection