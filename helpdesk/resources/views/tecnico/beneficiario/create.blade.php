@extends('layouts.app')

@section('contentheader_title')
<h1>Crear Beneficiario</h1>
@endsection
@section('localizacion')
<li><a href="#">Inicio</a></li>
<li><a href="#">Beneficiarios</a></li>
<li class="active">Crear Beneficiario</li>
@endsection

@section('main-content')

<div id="app">
    <div class="row">
        <div class="col-md-12">
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
        </div>
        <form action="{{ url('tecnico/beneficiario') }}" method="post" autocomplete="off">    
            <div class="col-md-12">
                <div class="register-box-body">
                    <p><h3>Datos Personales</h3></p>
                    <div class="row">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="col-sm-4">
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" name="cedula" placeholder="V-00000000"/>
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="Nombres" name="nombres" value=""/>
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="Apellidos" name="apellidos" value=""/>
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group has-feedback">
                                <input type="email" class="form-control" placeholder="Email" name="email" value=""/>
                                <span class="fa fa-envelope-o form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-sm-4">

                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="0000-0000000" name="telefono" value=""/>
                                <span class="fa fa-phone form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group has-feedback">
                                <select class="form-control" name="estado_id" id="estado">
                                    <option selected="selected" value="0">Seleccione..</option>
                                    @foreach($estados as $item)
                                    <option value="{!!$item->id!!}">{!!$item->estado!!}</option>
                                    @endforeach 
                                </select> 
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group has-feedback">
                                <select class="form-control" name="municipio_id" id="municipio" >
                                </select> 
                            </div> 
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group has-feedback">
                                <select class="form-control" name="parroquia_id" id="parroquia" >
                                </select> 
                            </div> 
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group has-feedback">
                                <textarea class="form-control" rows="3" placeholder="Dirección Completa" name="direccion"></textarea>
                                <span class="fa fa-building form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <p class="login-box-msg center"><h2>Computadores del Beneficiario</h2></p>
                            <table class="table table-condensed">
                                <thead>
                                <th>Modelo</th>
                                <th>Serial</th>
                                <th>Robada</th>
                                <th>Descripción</th>
                                <th>                                    
                                    <a class="btn btn-primary btn btn-flat" id="addRow">
                                        <i class="fa fa-plus-square"></i>
                                    </a>
                                </th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td width="250">
                                            <select name="modelo[]" class="form-control">
                                                <option selected="selected" value="0">Seleccione..</option>
                                                @foreach($canaimas as $item)
                                                <option value="{!!$item->id!!}">{!!$item->modelo!!}</option>
                                                @endforeach 
                                            </select>
                                        </td>
                                        <td width="180">
                                            <input type="text" class="form-control" name="serial[]" value=""/>
                                        </td>
                                        <td width="80">
                                            <select class="form-control" name="robada">
                                                <option selected="selected" value="0">NO</option>
                                                <option value="1">SI</option>
                                            </select>
                                        </td> 
                                        <td>
                                            <textarea class="form-control" rows="1" name="descripcion[]">
                                            </textarea>
                                        </td>

                                        <td>
                                            <a class="btn btn-danger btn btn-flat remove">
                                                <i class="fa fa-minus-square"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <button type="submit" class="btn btn-success btn-block btn-flat"><span class="fa fa-save" aria-hidden="true"> Agregar</span></button>
                        </div><!-- /.col -->
                        <div class="col-sm-4">
                            <a class="btn btn-primary btn-block btn-flat" href="{{ route('beneficiario.index') }}" role="button"><span class="fa fa-chevron-left" aria-hidden="true"> Regresar</span></a>

                        </div>
                    </div>

                    </form>
                </div>
            </div><!-- /.form-box -->
    </div>



    @endsection
    @section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#estado').change(function(event) {
                $.get("../../municipios/" + event.target.value, function(response, estado) {
                    $('#municipio').empty();
                    $('#parroquia').empty();
                    $('#municipio').append("<option value='0'>Seleccione..</option>");
                    $('#parroquia').append("<option value='0'>Seleccione..</option>");
                    for (i = 0; i < response.length; i++) {
                        $('#municipio').append("<option value='" + response[i].id + "'>" + response[i].municipio + "</option>");
                    }
                });

            });

            $('#municipio').change(function(event) {
                $.get("../../parroquias/" + event.target.value, function(response, municipio) {
                    $('#parroquia').empty();
                    $('#parroquia').append("<option value='0'>Seleccione..</option>");
                    for (i = 0; i < response.length; i++) {
                        $('#parroquia').append("<option value='" + response[i].id + "'>" + response[i].parroquia + "</option>");
                    }
                });
            });
        });




    </script>
    <script type="text/javascript">

        $('#addRow').on('click', function() {
            addRow();
        });
        function addRow() {

            var addRow = '<tr>' +
                    '<td width="250">' +
                    '<select name="modelo[]" class="form-control">' +
                    '<option selected="selected" value="0">Seleccione..</option>' +
                    '@foreach($canaimas as $item)' +
                    '<option value="{!!$item->id!!}">{!!$item->modelo!!}</option>' +
                    '@endforeach ' +
                    '</select>' +
                    '</td>' +
                    '<td width="180">' +
                    '<input type="text" class="form-control" name="serial[]" value=""/>' +
                    '</td>' +
                    '<td width="80">' +
                    '<select class="form-control" name="robada">' +
                    '<option selected="selected" value="0">NO</option>' +
                    '<option value="1">SI</option>' +
                    '</select>' +
                    '</td> ' +
                    '<td>' +
                    '<textarea class="form-control" rows="1" name="descripcion[]">' +
                    '</textarea>' +
                    '</td>' +
                    '<td>' +
                    '<a class="btn btn-danger btn btn-flat remove">' +
                    '<i class="fa fa-minus-square"></i>' +
                    '</a>' +
                    '</td>' +
                    '</tr>';
            $('tbody').append(addRow);
        }
        ;

        $('body').delegate('.remove', 'click', function() {
            var l = $('tbody tr').length;
            if (l == 1) {
                swal('Error', 'No puedes Eliminar el Ultimo', 'error');
            } else {
                $(this).parent().parent().remove();
            }

        });

    </script>
    @endsection