@extends('layouts.app')

@section('contentheader_title')
<h1>Crear Usuario</h1>
@endsection
@section('localizacion')
  <li><a href="#">Inicio</a></li>
  <li><a href="#">Usuarios</a></li>
  <li class="active">Crear Usuario</li>
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
            <p class="login-box-msg">{{ trans('adminlte_lang::message.registermember') }}</p>
            <form action="{{ url('/usuario') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="{{ trans('adminlte_lang::message.fullname') }}" name="name" value="{{ old('name') }}"/>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="{{ trans('adminlte_lang::message.email') }}" name="email" value="{{ old('email') }}"/>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="{{ trans('adminlte_lang::message.password') }}" name="password"/>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="{{ trans('adminlte_lang::message.retrypepassword') }}" name="password_confirmation"/>
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                </div> 
                <div class="form-group has-feedback">
                    <select class="form-control" name="rol_id" >
                        <option selected="selected" value="0">Seleccione..</option>
                        @foreach($roles as $item)
                        <option value="{!!$item->id!!}">{!!$item->rol!!}</option>
                        @endforeach 
                    </select> 
                </div> 
                <div class="form-group has-feedback">
                    <select class="form-control" name="infocentro_id" >
                        <option selected="selected" value="0">Seleccione..</option>
                        @foreach($infocentros as $item)
                        <option value="{!!$item->id!!}">{!!$item->nombre_infocentro!!}</option>
                        @endforeach 
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