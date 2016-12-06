@extends('layouts.app')

@section('contentheader_title')
<h1>Canaima de Beneficiario</h1>
@endsection
@section('localizacion')
<li><a href="#">Inicio</a></li>
<li><a href="#">Canaima</a></li>
<li class="active">Crear Canaima</li>
@endsection

@section('main-content')
<div class="row">
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Busqueda de Benefiario</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <div class="box-body">
                <div class="form-group">


                    <label>Buscar</label>
                    <select id="buscar" class="form-control"> </select>    
                </div>
                <div class="form-group">
                    <label>Nombres y Apllidos</label>
                    <input type="text" class="form-control" id="nombres" name="nombres" disabled="disabled">
                </div>
                <div class="form-group">
                    <label>Teléfono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" disabled="disabled" placeholder="Password">
                </div>
                <div class="form-group">
                    <label>Dirección</label>
                    <textarea class="form-control" rows="3" disabled="disabled"></textarea>
                </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Datos de la Canaima</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
                <div class="form-group">
                    <label>Modelo</label>
                    <select class="form-control">
                        <option selected="selected" value="0">Seleccione..</option>
                        <option value="MG10T">MG10T</option>
                        <option value="MG10T2">MG10T2</option>
                        <option value="MGED">MGED</option>
                        <option value="XL">XL</option>
                        <option value="MG3-XL">MG3-XL</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Serial</label>
                    <input type="text" class="form-control" id="serial" name="serial" placeholder="serial">
                </div>
                <div class="form-group">
                    <label>Infocentros</labe>
                        <select class="form-control">
                            <option selected="selected" value="0">Seleccione..</option>
                            @foreach($infocentros as $item)
                            <option value="{!!$item->id!!}">{!!$item->nombre_infocentro!!}</option>
                            @endforeach 

                        </select>
                </div>
                <div class="form-group">
                    <label>Descripción de la Falla</label>
                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#favoritesModal"> <span class="fa fa-comment"></span> Sugerencias</button>
                    <textarea class="form-control" rows="3"></textarea>
                    <input type="hidden" id="id_falla" name="id_falla">
                </div>
            </div>
            <!-- /.box-body -->
            </form>
        </div>
    </div>
</div>
<button 
    type="button" 
    class="btn btn-primary btn-lg" 
    data-toggle="modal" 
    data-target="#favoritesModal">
    Add to Favorites
</button>
<div class="modal fade" id="favoritesModal" 
     tabindex="-1" role="dialog" 
     aria-labelledby="favoritesModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" 
                        data-dismiss="modal" 
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" 
                    id="favoritesModalLabel">The Sun Also Rises</h4>
            </div>
            <div class="modal-body">

                <table class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Fallas</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($fallas as $item)
                        <tr>
                            <td>{!!$item->id!!}</td>
                            <td>{!!$item->falla!!}</td>
                            <td><button class="btn btn-info">Seleccionar</button></td>
                        </tr>
                        @endforeach 

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script src="{{ asset('/js/dropdown.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/select2/select2.min.js') }}" type="text/javascript"></script>
<script>
$(document).ready(function ()
{
    $("#buscar").select2({
        ajax: {
            url: "http://localhost:8000/getbeneficiarios",
            processResults: function (data) {
                return {
                    results: data.items
                };
            }
        }
    });
});

</script>
@endsection