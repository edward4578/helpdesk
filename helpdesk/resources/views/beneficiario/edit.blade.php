@extends('layouts.app')

@section('contentheader_title')
<h1>Editar Beneficiario</h1>
@endsection
@section('localizacion')
<li><a href="#">Inicio</a></li>
<li><a href="#">Beneficiarios</a></li>
<li class="active">Actualizar Beneficiario</li>
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
        {!!Form::model($beneficiario, ['route' => ['beneficiario.update', $beneficiario->id], 'method' => 'PUT'])!!}
        <div class="col-md-12">
            <div class="register-box-body">
                <p><h3>Datos Personales</h3></p>
                <div class="row">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="col-sm-4">
                        <div class="form-group has-feedback">
                            <input type="text" class="form-control" name="cedula" value="{{$beneficiario->cedula}}" />
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group has-feedback">
                            <input type="text" class="form-control" placeholder="Nombres" name="nombres" value="{{$beneficiario->nombres}}"/>
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group has-feedback">
                            <input type="text" class="form-control" placeholder="Apellidos" name="apellidos" value="{{$beneficiario->apellidos}}"/>
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group has-feedback">
                            <input type="email" class="form-control" placeholder="Email" name="email" value="{{$beneficiario->email}}"/>
                            <span class="fa fa-envelope-o form-control-feedback"></span>
                        </div>
                    </div>
                    <div class="col-sm-4">

                        <div class="form-group has-feedback">
                            <input type="text" class="form-control" placeholder="0000-0000000" name="telefono" value="{{$beneficiario->telefono}}"/>
                            <span class="fa fa-phone form-control-feedback"></span>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group has-feedback">
                            <select class="form-control" id="estado" name="estado_id">
                                <option value="{{$beneficiario->parroquia->municipio->estado->id}}" selected="selected">{{$beneficiario->parroquia->municipio->estado->estado}}</option>
                                @foreach($estados as $item)
                                <option value="{!!$item->id!!}">{!!$item->estado!!}</option>
                                @endforeach 
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group has-feedback">
                            <select class="form-control" id="municipio" name="municipio_id">
                                <option value="{{$beneficiario->parroquia->municipio->id}}"> {{$beneficiario->parroquia->municipio->municipio}}</option>             
                            </select>
                        </div> 
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group has-feedback">
                            <select class="form-control" id="parroquia"  name="parroquia_id">
                                <option value="{{$beneficiario->parroquia->id}}"> {{$beneficiario->parroquia->parroquia}}</option>             
                            </select>
                        </div> 
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group has-feedback">
                            <textarea class="form-control" rows="3" placeholder="Dirección Completa" name="direccion">{{$beneficiario->direccion}}</textarea>
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
                                 @foreach($beneficiario->canaimas as $item)
                                <tr>
                                    <input type="hidden" name="id_pivot" 
                                    value="{{$item->pivot->id}}">
                                    <td width="250">
                                        <select name="canaimas[{{$item->id}}][canaima_id]" class="form-control">
                                            <option selected="selected" 
                                            value="{{$item->pivot->canaima_id}}">{!!$item->modelo!!}</option>
                                            @foreach($canaimass as $items)
                                            <option value="{!!$items->id!!}">{!!$items->modelo!!}</option>
                                            @endforeach 
                                        </select>
                                    </td>
                                    <td width="180">
                                        <input type="text" class="form-control" name="canaimas[{{$item->id}}][serial_canaima]" value="{{$item->pivot->serial_canaima}}"/>
                                    </td>
                                    <td width="80">
                                       <select class="form-control" name="canaimas[{{$item->id}}][sol_can]">
                                      
                                           <option selected="selected" value="0">NO</option>
                                           <option value="1">SI</option>
                                       </select>
                                   </td> 
                                   <td>
                                    <textarea class="form-control" rows="1" name="canaimas[{{$item->id}}][descripcion]">
                                        {!!$item->pivot->descripcion!!}
                                    </textarea>
                                </td>

                                <td>
                                    <a class="btn btn-danger btn btn-flat remove">
                                        <i class="fa fa-minus-square"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <button type="submit" class="btn btn-success btn-block btn-flat"><span class="fa fa-save" aria-hidden="true"> Actualizar</span></button>
                </div><!-- /.col -->
                <div class="col-sm-4">
                    <a class="btn btn-primary btn-block btn-flat" href="{{ route('beneficiario.index') }}" role="button"><span class="fa fa-chevron-left" aria-hidden="true"> Regresar</span></a>

                </div>
            </div>

        {!! Form::close() !!}
    </div>
</div><!-- /.form-box -->
</div>



@endsection
@section('scripts')
<script src="{{ asset('/js/dropdown.js') }}" type="text/javascript"> </script>
<script type="text/javascript">

    $('#addRow').on('click', function(){
        addRow();
    });
    function addRow(){

        var addRow = '<tr>' +
        '<td width="250">' +
        '<select name="canaimas[{{$item->id + 1}}][canaima_id]" class="form-control">' +
        '<option selected="selected" value="0">Seleccione..</option>' +
        '@foreach($canaimass as $items)' +
        '<option value="{!!$items->id!!}">{!!$items->modelo!!}</option>' +
        '@endforeach ' +
        '</select>' +
        '</td>' +
        '<td width="180">' +
        '<input type="text" class="form-control" name="canaimas[{{$item->id + 1}}][serial_canaima]" value=""/>' +
        '</td>' +
        '<td width="80">' +
        '<select class="form-control" name="canaimas[{{$item->id + 1}}][sol_can]">>' +
        '<option selected="selected" value="0">NO</option>' +
        '<option value="1">SI</option>' +
        '</select>' +
        '</td> ' +
        '<td>' +
        '<textarea class="form-control" rows="1" name="canaimas[{{$item->id + 1}}][descripcion]">' +
        '</textarea>' +
        '</td>' +
        '<td>' +
        '<a class="btn btn-danger btn btn-flat remove">' +
        '<i class="fa fa-minus-square"></i>' +
        '</a>' +
        '</td>' +
        '</tr>';
        $('tbody').append(addRow);
    };

    $('body').delegate('.remove', 'click', function(){
        var l = $('tbody tr').length;
        if (l == 1){
            swal('Error','No puedes Eliminar el Ultimo', 'error');
        }else {
           $(this).parent().parent().remove();
       }

   });

</script>
@endsection