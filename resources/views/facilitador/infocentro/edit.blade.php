@extends('layouts.app')

@section('contentheader_title')
<h1>Editar Infocentro</h1>
@endsection
@section('localizacion')
<li><a href="#">Inicio</a></li>
<li><a href="#">Infocentro</a></li>
<li class="active">Editar Infocentro</li>
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
            <p class="login-box-msg">Actualizar Infocentro
                {!!Form::model($infocentro, ['route' => ['facilitador.infocentro.update', $infocentro->id], 'method' => 'PUT'])!!}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="mir" value="{{$infocentro->mir}}">
                <span class="glyphicon glyphicon-home form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Nombre del Infocentro" name="nombre_infocentro" value="{{$infocentro->nombre_infocentro}}" />
                <span class="fa fa-institution form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Descripción" name="descripcion" value="{{$infocentro->descripcion}}"/>
                <span class="fa fa-tags form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <label for="activo">Estado del Infocentro</label>
                <select class="form-control" name="activo" id="activo" >
                    @if ($infocentro->activo == 1)
                    <option value="{{$infocentro->activo}} "selected="selected">Activo</option>
                    @else
                    <option value="{{$infocentro->activo}} "selected="selected">Inactivo</option>
                    @endif
                    <option value="1">Activo</option>
                    <option value="2">Inactivo</option>
                </select> 
            </div> 
            <div class="form-group has-feedback">
                <textarea class="form-control" rows="3" name="direccion">{{$infocentro->direccion}}</textarea>
                <span class="fa fa-building form-control-feedback"></span>
            </div> 
            <div class="form-group has-feedback">
                <select class="form-control" id="estado" name="estado_id">
                    <option value="{{$infocentro->parroquia->municipio->estado->id}}" selected="selected">{{$infocentro->parroquia->municipio->estado->estado}}</option>
                    @foreach($estados as $item)
                    <option value="{!!$item->id!!}">{!!$item->estado!!}</option>
                    @endforeach 
                </select>
            </div>
            <div class="form-group has-feedback">
                <select class="form-control" id="municipio" name="municipio_id">
                    <option value="{{$infocentro->parroquia->municipio->id}}"> {{$infocentro->parroquia->municipio->municipio}}</option>             
                </select>
            </div> 
            <div class="form-group has-feedback">
                <select class="form-control" id="parroquia"  name="parroquia_id">
                    <option value="{{$infocentro->parroquia->id}}"> {{$infocentro->parroquia->parroquia}}</option>             
                </select>
            </div> 
            <div class="row">
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-success btn-block btn-flat"><span class="fa fa-save" aria-hidden="true"> Actualizar
                        
                        
                        
                        </span></button>
                </div><!-- /.col -->
                <div class="col-xs-4">
                    <a class="btn btn-primary btn-block btn-flat" href="{{ route('facilitador.infocentro.index') }}" role="button"><span class="fa fa-chevron-left" aria-hidden="true"> Regresar</span></a>
                </div>
            </div>
            </form>
        </div><!-- /.form-box -->
    </div>

    <div class="col-md-2">

    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('/js/dropdown.js') }}" type="text/javascript"></script>
@endsection