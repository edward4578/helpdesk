@extends('layouts.app')

@section('contentheader_title')
<h1>Crear Ticket</h1>
@endsection
@section('localizacion')
<li><a href="#">Inicio</a></li>
<li><a href="#">Ticket</a></li>
<li class="active">Crear Ticket</li>
@endsection
@section('main-content')
<!-- /.ERROREES -->
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
</div>

<!-- /.beneficiario -->
<div id="ticket">

  <div class="box box-primary">
       {!!Form::model($ticket, ['route' => ['ticket.update', $ticket->id], 'method' => 'PUT'])!!} 
      <div class="box-header with-border">
        <h2 class="box-title">Dellates del Ticket Nro: <strong>{{ $ticket->id }}</strong></h2>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
        <!-- /.box-tools -->
      </div>
      <!-- /.box-header -->
      <div class="box-body">

       <div class="col-sm-3">
        <label for="nombres"> Nombres</label>
        <input class="form-control" type="text" name="nombres" value="{{ $ticket->nombres }}" readonly="readonly">
      </div>

      <div class="col-sm-3">
        <label for="apellidos"> Apellidos</label>
        <input class="form-control" type="text" name="apellidos" value="{{ $ticket->apellidos }}" readonly="readonly">
      </div>

      <div class="col-sm-3">
        <label for="serial_canaima">Serial Canaima</label>
        <input class="form-control" type="text" name="serial_canaima" value="{{ $ticket->serial_canaima }}"  readonly="readonly">
      </div>
      <div class="col-sm-3">
        <label for="computadora">Computadora del usuario</label>
        <input class="form-control" type="text" name="computadora" value="{{ $ticket->serial_canaima }}" readonly="readonly">
      </div>

      <div class="col-sm-6">
       <label for="falla"> Tipo de Falla</label>
       <textarea readonly="readonly" class="form-control" name="falla">{{ $ticket->falla }}</textarea>
     </div>
     <div class="col-sm-6">
      <label for="descripcion"> Descripción</label>
      <textarea readonly="readonly" class="form-control" name="descripcion">
        {{ $ticket->descripcion }}</textarea>
    </div>

    <div class="col-md-12">
      <p><h1><strong>Solución</strong></h1></p>
    </div>

    <div class="col-sm-3">
      <label for="estatus">estatus</label>
      <select name="estatus_id" class="form-control">
          @foreach($estatus as $item)
          <option value="{!!$item->id!!}">{!!$item->estatus!!}</option>
          @endforeach
        </select>
      </div>

      <div class="col-sm-6">
       <label for="solucion_id"> Tipo de Solución</label>
       <input type="hidden" name="solucion_id" v-model="solucion_id">
       <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
       <div class="input-group">
        <textarea 
        v-model="solucion" name="solucion" class="form-control custom-control" rows="3" style="resize:none"></textarea>     
        <span class="input-group-addon btn btn-primary" id="buscar" 
        v-on:click.prevent="bSolucion">Buscar</span>
      </div>
    </div>

    <div class="col-sm-3">
      <label for="descripcion"> Descripción</label>
      <textarea class="form-control" rows="3"  name="descripcion"> </textarea>
    </div>
  </div>
  <!-- /.box-body -->
  <div class="box-footer">
    <div class="col-sm-4">
      <button type="submit" class="btn btn-success btn-block btn-flat"><span class="fa fa-save" aria-hidden="true"> Cerrar Ticket</span></button>
    </div><!-- /.col -->
    <div class="col-sm-4">
      <a class="btn btn-primary btn-block btn-flat" href="{{ route('ticket.index') }}" role="button"><span class="fa fa-chevron-left" aria-hidden="true"> Regresar</span></a>
    </div>
  </div>
  <!-- box-footer -->
{!! Form::close() !!}

</div>
<!-- /.box -->
<!-- /Modal ____________________________________________________Falla-->
<div class="modal fade" id="solucion" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
          <h4 class="modal-title">Descripción de Soluciones</h4>
        </div>
        <div class="modal-body">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>falla</th>
                <th>acción</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="item in soluciones">
                <td>@{{ item.id }}</td>
                <td>@{{ item.solucion }}</td>
                <td><button class="btn btn-primary btn-xs" v-on:click.prevent="addSolucion(item.id, item.solucion)">Agregar</button></td>
              </tr>
            </tbody>
          </table>


        </div>
        <div class="modal-footer">

        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>






</div>





@endsection
@section('scripts')

<script type="text/javascript"> 

//  /^(V-|E-){1}-\d{8}$/

// /^(V-|E-)?[0-9]{8}$/

Vue.use(VeeValidate, {
  locale: 'es',
});


new Vue({
  el: '#ticket',
  data: {
    soluciones: [],
    solucion_id: '',
    solucion: ''
  },
  methods: 
  {
    bSolucion: function(){
     // alert('AQUI!');
     var url = '../../getSoluciones';
     axios.get(url).then(response => {
      this.soluciones = response.data;
      $('#solucion').modal('show');
    });
   },
   addSolucion: function(id, solucion){
    alert(id +' '+ solucion);
    this.solucion_id = id;
    this.solucion = solucion;
    $('#solucion').modal('hide');
  }
}
});
</script>
@endsection