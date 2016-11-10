@extends('layouts.app')

@section('contentheader_title')
<h1>Crear Beneficiario</h1>
@endsection
@section('localizacion')
<li><a href="#">Inicio</a></li>
<li><a href="#">Usuarios</a></li>
<li class="active">Crear Beneficiario</li>
@endsection

@section('main-content')
<div class="row">
    <div class="col-md-3">

    </div>
    <div class="col-md-6">
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

        <div class="register-box-body">
            <p class="login-box-msg">Registrar a Beneficiario</p>
            <form action="{{ url('/usuario') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Cédula" name="cedula" value=""/>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Nombres" name="nombres" value=""/>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Apellidos" name="apellidos" value=""/>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="Email" name="email" value=""/>
                    <span class="fa fa-envelope-o form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="0000-0000000" name="telefono" value=""/>
                    <span class="fa fa-phone form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="" name="telefono" value=""/>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <textarea class="form-control" rows="3" placeholder="Dirección ..."></textarea>
                    <span class="fa fa-building form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <select class="form-control" name="estado" id="estado">
                        <option selected="selected" value="0">Seleccione..</option>
                        @foreach($estados as $item)
                        <option value="{!!$item->id!!}">{!!$item->estado!!}</option>
                        @endforeach 
                    </select> 


                   
                    
                </div>
                <div class="form-group has-feedback">
                    <select class="form-control" name="municipio" id="municipio" >
                        <option selected="selected" value="0">Seleccione..</option>
                    </select> 
                </div> 
                <div class="form-group has-feedback">
                    <select class="form-control" name="parroquia" id="parroquia" >
                        <option selected="selected" value="0">Seleccione..</option>
                    </select> 
                </div> 
                <div class="row">
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Agregar</button>
                    </div><!-- /.col -->
                </div>
            </form>
        </div><!-- /.form-box -->
    </div>

    <div class="col-md-2">

    </div>
</div>
@endsection