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
<div class="box box-default">
  <div class="box-header with-border">
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">

    <div id="beneficiario">
      <div class="row">
        <div class="col-md-6">
          <form  v-on:submit.prevent="searchB">
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


            <!-- /.formulario -->
          </div>
          <!-- /.box-body -->
        </div> 
        <!-- /.row -->
        <div class="row">
          <div class="col-sm-3">
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
            <h3>JSON</h3>
            <pre>
              @{{ $data }}
            </pre>
          </div>
        </div>
      </div> 
    </div>
    <!-- /Beneficiario-->
    <div class="box-footer">

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
    error: []
  },
  methods: {
    searchB: function(){

      this.$validator.validateAll().then(() => {
        var url = '../getCedulaBeneficiario/' + this.cedula;
        axios.get(url).then(response => {
          this.beneficiario = response.data;
          this.estado = response.data.parroquia.municipio.estado;
          this.municipio = response.data.parroquia.municipio;
          this.parroquia = response.data.parroquia;
          
        }).catch(error => {
          this.error = error.response;
          
          swal(this.error.status, '', 'error');
        });
      });
    }
  }
});



</script>
@endsection