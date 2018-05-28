@extends('layouts.app')

@section('contentheader_title')
<h1>Tipos de Soluciones</h1>
@endsection
@section('localizacion')
<li><a href="#">Inicio</a></li>
<li><a href="#">Solución</a></li>
<li class="active">Tipos de Soluciones</li>
@endsection

@section('main-content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><a class="btn btn-primary" href="{{ route('tecnico.solucion.create') }}" role="button"><span class="glyphicon glyphicon-pencil" aria-hidden="true">Agregar</span></a> </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Soluciones</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                @foreach($soluciones as $item)
                <tbody>
                    <tr data-id="{{$item->id}}">
                        <td>{!!$item->id!!}</td>
                        <td>{!!$item->solucion!!}</td>
                        <td>
                            <a class="btn btn-primary btn-xs"  href="{{ route('tecnico.solucion.edit', $item->id) }}" role="button"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                            <a class="btn btn-danger btn-xs"href="{{ route('tecnico.solucion.destroy', $item->id) }}"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span></a>
                        </td>
                    </tr>
                </tbody> 
                @endforeach
            </table>
        </div>
        <!-- /.box-body -->
    </div>
@endsection
@section('scripts')
<script>
    $('.btn.btn-danger.btn-xs').click(function (event) {
        event.preventDefault();
        var href = $(this).attr('href');

        swal({
            title: "Estas seguro que desea elimnar el Registro?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Si, Eliminar!",
            cancelButtonText: "No, Cancelar!",
            closeOnConfirm: true,
            closeOnCancel: true
        },
                function (isConfirm) {
                    if (isConfirm) {
                        window.location.href = href;
                        
                    }
                });

        return false;
    });
</script>
@if (notify()->ready())
    <script>
        swal({
            title: "{!! notify()->message() !!}",
            text: "{!! notify()->option('text') !!}",
            type: "{{ notify()->type() }}",
        });
    </script>
@endif
@endsection
