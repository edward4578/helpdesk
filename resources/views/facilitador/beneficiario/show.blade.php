@extends('layouts.app')

@section('contentheader_title')
<h1>Detalles del Beneficiario</h1>
@endsection
@section('localizacion')
<li><a href="#">Inicio</a></li>
<li><a href="#">Beneficiario</a></li>
<li class="active">Detalle del Beneficiario</li>
@endsection

@section('main-content')


<div class="row">    
    <div class="col-md-12">
        <div class="register-box-body">
            <p><h3>Datos Personales</h3></p>
            <div class="row">
                <div class="col-sm-4">
                    <label>Cedula</label>
                    <h4> {!!$beneficiario->cedula!!}</h4>  
                </div>
                <div class="col-sm-4">
                    <label>nombres</label>
                    <h4> {!!$beneficiario->nombres!!}</h4>  
                </div>
                <div class="col-sm-4">
                    <label>apellidos</label>
                    <h4> {!!$beneficiario->apellidos!!}</h4> 
                </div>
                <div class="col-sm-4">
                    <label>correo</label>
                    <h4> {!!$beneficiario->email!!}</h4>  
                </div>
                <div class="col-sm-4">
                    <label>teléfono</label>
                    <h4> {!!$beneficiario->telefono!!}</h4>  
                </div>
                <div class="col-sm-4">
                    <label>Estado</label>
                    <h4> {!!$beneficiario->parroquia->municipio->estado->estado!!}</h4>  
                </div>
                <div class="col-sm-4">
                    <label>Municipio</label>
                    <h4> {!!$beneficiario->parroquia->municipio->municipio!!}</h4>  
                </div>
                <div class="col-sm-4">
                    <label>Parroquia</label>
                    <h4> {!!$beneficiario->parroquia->parroquia!!}</h4> 
                </div>
                <div class="col-sm-4">
                    <textarea class="form-control" rows="3" name="direccion">{!!$beneficiario->direccion!!}</textarea>
                </div>
                <div class="col-md-12">
                    <p class="login-box-msg center"><h2>Computadores del Beneficiario</h2></p>
                    <table class="table table-condensed">
                        <thead>
                        <th>Modelo</th>
                        <th>Serial</th>
                        <th>Descripción</th>
                        </thead>
                        <tbody>
                            @foreach($beneficiario->canaimas as $item)
                            <tr>
                                <td>{!!$item->modelo!!}</td>
                                <td>{!!$item->pivot->serial_canaima!!}</td>
                                <td>{!!$item->pivot->descripcion!!}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div><!-- /.form-box -->
    <div class="col-sm-4">
        <a class="btn btn-success btn-block btn-flat" href="{{ route('facilitador.beneficiario.index') }}" role="button"><span class="fa fa-chevron-left" aria-hidden="true"> Regresar</span></a>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $('.btn.btn-danger.btn-xs').click(function(event) {
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
        function(isConfirm) {
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



