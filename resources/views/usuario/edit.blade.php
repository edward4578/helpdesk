@extends('layouts.app')

@section('contentheader_title')
<h1>Editar Usuario</h1>
@endsection
@section('localizacion')
  <li><a href="#">Inicio</a></li>
  <li><a href="#">Usuarios</a></li>
  <li class="active">Editar Usuario</li>
@endsection

@section('main-content')
<div class="row">
    <div class="col-md-2">

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
            {!!Form::model($usuario, ['route' => ['usuario.update', $usuario->id], 'method' => 'PUT'])!!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="{{ trans('adminlte_lang::message.fullname') }}" name="name" value="{{ $usuario->name }}"/>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="email" class="form-control" placeholder="{{ trans('adminlte_lang::message.email') }}" name="email" value="{{ $usuario->email }}"/>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="{{ trans('adminlte_lang::message.password') }}" name="password"/>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                {!!Form::select('rol_id', $roles, null, ['class'=>'form-control']);!!}
            </div> 
            <div class="form-group has-feedback">
                {!!Form::select('infocentro_id', $infocentros, null, ['class'=>'form-control']);!!}
            </div> 
            <div class="row">
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Actualizar</button>
                </div><!-- /.col -->
            </div>
        </div><!-- /.form-box -->
    </div>

    <div class="col-md-2">

    </div>
</div>










@endsection