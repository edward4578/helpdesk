@extends('layouts.app')

@section('contentheader_title')
<h1>Lista Infocentros</h1>
@endsection
@section('localizacion')
<li><a href="#">Inicio</a></li>
<li><a href="#">Infocentros</a></li>
<li class="active">Lista de Infocentros</li>
@endsection
@section('main-content')


<div class="row">	
</div>

<div class="col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><a class="btn btn-primary" href="{{ route('infocentro.create') }}" role="button"><span class="glyphicon glyphicon-pencil" aria-hidden="true">Agregar</span></a> </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Infocentro</th>
                        <th>mir</th>
                        <th>activo</th>
                        <th>Opciones</th>
                        
                    </tr>
                </thead>
                <tbody>         
                    @foreach($infocentros as $item)
                <td>{!!$item->id!!}</td>
                <td>{!!$item->nombre_infocentro!!}</td>
                <td>{!!$item->mir!!}</td>
                @if ($item->activo == 1)   
                <td><span class="btn btn-success id="{!!$item->activo!!}">Activo</span></td>
                @else
                <td><span class="btn btn-warning" id="{!!$item->activo!!}">Inactivo</span></td>
                @endif
                <td><a class="btn btn-primary btn-xs"  href="{{ route('infocentro.edit', $item->id) }}" role="button"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                    <a class="btn btn-danger btn-xs" href="{{ route('infocentro.destroy', $item->id) }}" onclick="return confirm('¿Seguro que deseas eliminarlo?')" role="button"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span></a></td> 
                </tbody>
                @endforeach
            </table>
        </div>
        <!-- /.box-body -->
    </div>

</div>

@endsection
@section('scripts')
@if (notify()->ready())
    <script>
        swal({
            title: "{!! notify()->message() !!}",
            text: "{!! notify()->option('text') !!}",
            type: "{!! notify()->type() !!}",
        });
    </script>
@endif
@endsection


