@extends('layouts.app')

@section('contentheader_title')
<h1>Crear Beneficiario</h1>
@endsection
@section('localizacion')
<li><a href="#">Inicio</a></li>
<li><a href="#">Beneficiarios</a></li>
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
            <form action="{{ url('/beneficiario') }}" method="post" autocomplete="on">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="cedula" placeholder="V-00000000"/>
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
                    <textarea class="form-control" rows="3" placeholder="Dirección Completa" name="direccion"></textarea>
                    <span class="fa fa-building form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <select class="form-control" name="estado_id" id="estado">
                        <option selected="selected" value="0">Seleccione..</option>
                        @foreach($estados as $item)
                        <option value="{!!$item->id!!}">{!!$item->estado!!}</option>
                        @endforeach 
                    </select> 
                </div>
                <div class="form-group has-feedback">
                    <select class="form-control" name="municipio_id" id="municipio" >
                    </select> 
                </div> 
                <div class="form-group has-feedback">
                    <select class="form-control" name="parroquia_id" id="parroquia" >
                    </select> 
                </div> 
                <div class="row">
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-success btn-block btn-flat"><span class="fa fa-save" aria-hidden="true"> Agregar</span></button>
                    </div><!-- /.col -->
                    <div class="col-xs-4">
                        <a class="btn btn-primary btn-block btn-flat" href="{{ route('beneficiario.index') }}" role="button"><span class="fa fa-chevron-left" aria-hidden="true"> Regresar</span></a>
                    </div>
                </div>
            </form>
        </div><!-- /.form-box -->
    </div>

    <div class="col-md-2">

    </div>
</div>
@endsection