@extends('layouts.app')

@section('contentheader_title')
<h1>Modelos de Canaimas Existentes</h1>
@endsection
@section('localizacion')
<li><a href="#">Inicio</a></li>
<li><a href="#">Canaima</a></li>
<li class="active">Modelos de Canaimas</li>
@endsection

@section('main-content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><a class="btn btn-primary" href="{{ route('tecnico.canaima.create') }}" role="button"><span class="glyphicon glyphicon-pencil" aria-hidden="true">Agregar</span></a> </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>modelo</th>
                        <th>Activo</th>
                        <th></th>
                    </tr>
                </thead>
                @foreach($canaimas as $item)
                <tbody>
                    <tr data-id="{{$item->id}}">
                        <td>{!!$item->id!!}</td>
                        <td>{!!$item->modelo!!}</td>
                        @if ($item->activo == 1)
                        <td><span class="btn btn-xs btn-success">Activo</span></td> 
                        @else
                        <td><span class="btn btn-xs btn-warning">Desactivado</span></td>
                        @endif
                        <td>
                            <a class="btn btn-primary btn-xs"  href="{{ route('tecnico.canaima.edit', $item->id) }}" role="button"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                            <a class="btn btn-danger btn-xs"href="{{ route('tecnico.canaima.destroy', $item->id) }}"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span></a>
                        </td>
                    <tr>
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
            title: "Estas seguro que desea eliminar el Registro?",
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
