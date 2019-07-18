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
            <h3 class="box-title"><a class="btn btn-primary" href="{{ url('facilitador/beneficiario/create') }}" role="button"><span class="glyphicon glyphicon-pencil" aria-hidden="true">Agregar</span></a> </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Cedula</th>
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
                <td>{!!$item->cedula!!}</td>
                <td>{!!$item->nombres!!}</td>
                <td>{!!$item->apellidos!!}</td>   
                <td>{!!$item->telefono!!}</td>
                <td>{!!$item->direccion!!}</td>
                <td><a class="btn btn-primary btn-xs"  href="{{ route('facilitador.beneficiario.edit', $item->id) }}" role="button"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                     <a class="btn btn-default btn-xs" href="{{ route('facilitador.beneficiario.show', $item->id) }}" role="button"><span class="fa  fa-list" aria-hidden="true"></span></a>
                    <a class="btn btn-danger btn-xs" href="{{ route('beneficiario.destroy', $item->id) }}" role="button"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span></a> 
{!!link_to_route('facilitador.beneficiario.reporteBenefiarioId', $title = 'Ver', $parameters = $item->id, $attributes = ['class'=> 'btn btn-info btn-xs', 'target' => '_blank']) !!}
               </td>
                </tbody>
                @endforeach
            </table>
        </div>
        <!-- /.box-body -->
    </div>

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


