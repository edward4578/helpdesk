@extends('layouts.app')

@section('contentheader_title')
<h1>Crear canaima </h1>
@endsection
@section('localizacion')
<li><a href="#">Inicio</a></li>
<li><a href="#">Canaima</a></li>
<li class="active">Crear Canaima</li>
@endsection
@section('main-content')
@if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Error!!</strong> {{ trans('adminlte_lang::message.someproblems') }}<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
<form action="{{ url('facilitador/canaima') }}" method="post" autocomplete="off">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">           

    <div class="box box-solid box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Busqueda de Benefiario</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->

        <div class="box-body">
            <div class="col-md-offset-3 col-md-6">
                <div class="form-group">
                    <label >Modelo de Canaima</label>
                    <input id="modelo" name="modelo" class="form-control"> 
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </div>
            </div> 
        </div> 
</form>  
@endsection
@section('scripts')
@endsection