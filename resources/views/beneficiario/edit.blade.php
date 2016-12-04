@extends('layouts.app')

@section('contentheader_title')
<h1>Editar Usuario</h1>
@endsection
@section('localizacion')
<li><a href="#">Inicio</a></li>
<li><a href="#">beneficiario</a></li>
<li class="active">Editar Beneficiario</li>
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
            {!!Form::model($beneficiario, ['route' => ['beneficiario.update', $beneficiario->id], 'method' => 'PUT'])!!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="cedula" value="{{$beneficiario->cedula}}"/>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Nombres" name="nombres" value="{{$beneficiario->nombres}}"/>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Apellidos" name="apellidos" value="{{$beneficiario->apellidos}}"/>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="email" class="form-control" placeholder="Email" name="email" value="{{$beneficiario->email}}"/>
                <span class="fa fa-envelope-o form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="0000-0000000" name="telefono" value="{{$beneficiario->telefono}}"/>
                <span class="fa fa-phone form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <textarea class="form-control" rows="3" placeholder="Dirección Completa" name="direccion">{{$beneficiario->direccion}}</textarea>
                <span class="fa fa-building form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                {!!Form::select('estado_id', $estados, null, ['class'=>'form-control', 'id'=>'estado']);!!}
            </div>
            <div class="form-group has-feedback">
                {!!Form::select('municipio_id', $municipios, null, ['class'=>'form-control', 'id'=>'municipio']);!!}
            </div> 
            <div class="form-group has-feedback">
                {!!Form::select('parroquia_id', $parroquias, null, ['class'=>'form-control', 'id'=>'parroquia']);!!} 
            </div> 
            <div class="row">
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-success btn-block btn-flat"><span class="fa fa-save" aria-hidden="true"> Actualizar</span></button>
                </div><!-- /.col -->
                <div class="col-xs-4">
                    <a class="btn btn-primary btn-block btn-flat" href="{{ route('beneficiario.index') }}" role="button"><span class="fa fa-chevron-left" aria-hidden="true"> Regresar</span></a>
                </div>
            </div>
            {!! Form::close() !!}
        </div><!-- /.form-box -->
    </div>

    <div class="col-md-2">

    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('/js/dropdown.js') }}" type="text/javascript"> </script>
@endsection