@extends('layouts.app')

@section('bread')
<div class="container">
              <ol class="breadcrumb breadcrumb-alt">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Inicio</li>
              </ol>
</div>
@endsection

@section('content')
    <example-component></example-component>
@endsection
