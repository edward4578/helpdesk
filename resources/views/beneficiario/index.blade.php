@extends('layouts.app')

@section('contentheader_title')
<h1>Lista de Beneficiarios</h1>
@endsection
@section('localizacion')
<li><a href="#">Inicio</a></li>
<li><a href="#">Beneficiarios</a></li>
<li class="active">Lista de Beneficiarios</li>
@endsection
@section('main-content')

<div class="row">	
</div>

<div class="col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><a class="btn btn-primary" href="{{ route('beneficiario.create') }}" role="button"><span class="glyphicon glyphicon-pencil" aria-hidden="true">Agregar</span></a> </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombres</th>
                        <th>Apellido</th>
                        <th>Telefono</th>
                        <th>Direcccion</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>         
                    @foreach($beneficiarios as $item)
                <td>{!!$item->id!!}</td>
                <td>{!!$item->nombres!!}</td>
                <td>{!!$item->apellidos!!}</td>   
                <td>{!!$item->telefono!!}</td>
                <td>{!!$item->direccion!!}</td>
                <td><a class="btn btn-primary btn-xs"  href="{{ route('beneficiario.edit', $item->id) }}" role="button"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                    <a class="btn btn-danger btn-xs" href="{{ route('beneficiario.destroy', $item->id) }}" onclick="return confirm('¿Seguro que deseas eliminarlo?')" role="button"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span></a></td> 

                </tbody>
                @endforeach
            </table>
        </div>
        <!-- /.box-body -->
    </div>

</div>
</div>
@endsection


