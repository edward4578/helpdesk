@extends('layouts.app')

@section('contentheader_title')
<h1>Crear Falla </h1>
@endsection
@section('localizacion')
<li><a href="#">Inicio</a></li>
<li><a href="#">Falla</a></li>
<li class="active">Crear Falla</li>
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
<form action="{{ url('facilitador/falla') }}" method="post" autocomplete="off">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">           

    <div class="box box-solid box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Crear Falla</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->

        <div class="box-body">
            <div class="col-md-offset-3 col-md-6">
                <div class="form-group">
                    <label >Descripcion de la Falla</label>
                    <div class="form-group has-feedback">
                    <textarea class="form-control" rows="3" name="falla"></textarea>
                    <span class="fa fa-building form-control-feedback"></span>
                </div>
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