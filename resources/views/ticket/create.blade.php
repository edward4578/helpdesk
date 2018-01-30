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
<div id="beneficiario">

  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Busqueda de Beneficiario</h3>
      <div class="box-tools pull-right">
        <!-- Buttons, labels, and many other things can be placed here! -->
        <!-- Here is a label for example -->
        <span class="label label-primary">Label</span>
      </div>
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="row">
        <div class="col-md-6">
          <form  v-on:submit.prevent="searchB" name="cedula">
            <div class="input-group">
              <input  v-validate="{ required: true, regex: /^(V|E){1}-\d{8}$/ }" 
              type="text" 
              name="cedula" 
              class="form-control" 
              v-model="cedula"
              placeholder="V-00000000">
              <span class="input-group-btn">
                <button type="subtmit" class="btn btn-info btn-flat">
                  <i class="fa fa-search"></i> Buscar cédula</button>
                </span>
              </div>
              <div v-show="errors.has('cedula')" class="help-block alert alert-danger alert-dismissible">
                @{{ errors.first('cedula') }}
              </div>
            </form>
            <!-- /.1formulario -->
          </div>
          <!-- /.box-body -->
        </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">

      </div>
      <!-- box-footer -->
    </div>
    <!-- /.box -->
    <div class="box box-primary">
      <form action="{{ url('/ticket') }}" method="post" autocomplete="off" name="ticket">
        <div class="box-header with-border">
          <h3 class="box-title">Dellates</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
          <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="col-sm-3">
            <input type="hidden" name="beneficiario_id" v-model="beneficiario.id">
            <label for="cedula">Cedula</label>
            <input class="form-control" type="text" name="cedula" v-model="beneficiario.cedula" readonly="readonly">
          </div>

          <div class="col-sm-3">
            <label for="nombres"> Nombres</label>
            <input class="form-control" type="text" name="nombres" v-model="beneficiario.nombres" readonly="readonly">
          </div>

          <div class="col-sm-3">
            <label for="apellidos"> Apellidos</label>
            <input class="form-control" type="text" name="apellidos" v-model="beneficiario.apellidos" readonly="readonly">
          </div>

          <div class="col-sm-3">
            <label for="email">email</label>
            <input class="form-control" type="text" name="email" v-model="beneficiario.email" readonly="readonly">
          </div>

          <div class="col-sm-3">
            <label for="email">Dirección</label>
            <textarea class="form-control" readonly="readonly">@{{ beneficiario.direccion }}</textarea>
          </div>

          <div class="col-sm-3">
            <label for="estado"> Estado</label>
            <input class="form-control" type="text" name="estado" v-model="estado.estado" readonly="readonly">
          </div>

          <div class="col-sm-3">
            <label for="municipio"> Municipio</label>
            <input class="form-control" type="text" name="municipio" v-model="municipio.municipio" readonly="readonly">
          </div>

          <div class="col-sm-3">
            <label for="parroquia"> Parroquia</label>
            <input class="form-control" type="text" name="parroquia" v-model="parroquia.parroquia" readonly="readonly">
          </div>

          <div class="col-md-12">
            <p><h1><strong>Datos de la Falla de la computadora</strong></h1></p>
          </div>

          <div class="col-sm-3">
            <label for="computadoras">Computadoras del usuario</label>
            <select name="beneficiario_x_canaima_id" class="form-control">
              <option selected="selected" value="0">Seleccione..</option>
              <option v-for="item in beneficiario.canaimas" v-bind:value="item.pivot.id">@{{ item.modelo }} - @{{ item.pivot.serial_canaima }}</option>
            </select>
          </div>

          <div class="col-sm-6">
           <label for="falla_id"> Tipo de Falla</label>
           <input type="hidden" name="falla_id" v-model="falla_id">
           <input type="hidden" name="estatus_id" value="1">
           <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
           <div class="input-group">
            <textarea 
            v-model="falla" name="falla" class="form-control custom-control" rows="3" style="resize:none"></textarea>     
            <span class="input-group-addon btn btn-primary" id="buscar" 
            v-on:click.prevent="bFalla">Buscar</span>
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
          <button type="submit" class="btn btn-success btn-block btn-flat"><span class="fa fa-save" aria-hidden="true"> Agregar</span></button>
        </div><!-- /.col -->
        <div class="col-sm-4">
          <a class="btn btn-primary btn-block btn-flat" href="{{ route('ticket.index') }}" role="button"><span class="fa fa-chevron-left" aria-hidden="true"> Regresar</span></a>
        </div>
      </div>
      <div class="col-md-12">
        <h3>JSON</h3>
        <pre>
          @{{ $data }}
        </pre>
      </div>
      <!-- box-footer -->
    </form>

  </div>
  <!-- /.box -->
  <!-- /Modal ____________________________________________________Falla-->
  <div class="modal fade" id="falla" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span></button>
            <h4 class="modal-title">Descripción de la Falla</h4>
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
                <tr v-for="item in fallas">
                  <td>@{{ item.id }}</td>
                  <td>@{{ item.falla }}</td>
                  <td><button v-on:click.prevent="addFalla(item.id, item.falla)">Agregar</button></td>
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
  el: '#beneficiario',
  data: {
    cedula: '',
    beneficiario: [],
    estado: [],
    municipio: [],
    parroquia: [],
    fallas: [],
    falla_id: '',
    falla: '',
  },
  methods: 
  {
    searchB: function()
    {

      this.$validator.validateAll().then(() => 
      {
        var url = '../getCedulaBeneficiario/' + this.cedula;
        axios.get(url).then(response => 
        {
          this.beneficiario = response.data;
          this.estado = response.data.parroquia.municipio.estado;
          this.municipio = response.data.parroquia.municipio;
          this.parroquia = response.data.parroquia;
        }).catch(error => 
        {
          console.log(error.response);
          if (error.response.status==404){
           swal(
           {
            title: error.response.status,
            text: 'El beneficiario no exite!'   
          });
         }else{
           swal(
           {
            title: error.response.status,
            text: error.response.statusText,
            icon: "error"    
          });
         }
         
       });
      });
    },
    bFalla: function(){
     // alert('AQUI!');
     var url = '../getFallas';
     axios.get(url).then(response => {
      this.fallas = response.data;
      $('#falla').modal('show');
    });
   },
   addFalla: function(id, falla){
    alert(id +' '+ falla);
    this.falla_id = id;
    this.falla = falla;
    $('#falla').modal('hide');
  }
}
});
</script>
@endsection