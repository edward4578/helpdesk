@extends('layouts.app')

@section('contentheader_title')
<h1>Inicio</h1>
@endsection


@section('main-content')
<section class="content">

  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">
      <i class="fa fa-navicon"></i> Mis Solicitudes Pendientes
    </h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Minimizar">
          <i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <thead><tr>
              <th>ID</th>
              <th>Beneficiario</th>
              <th>Fecha</th>
              <th>tipo</th>
              <th>Descripción</th>
              <th>Duración</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>183</td>
              <td>John Doe</td>
              <td>11-7-2014</td>
              <td><span class="label label-success">Approved</span></td>
              <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
              <td><i class="fa fa-clock-o"></i> 1 hora</td>
            </tr>
            <tr>
              <td>219</td>
              <td>Alexander Pierce</td>
              <td>11-7-2014</td>
              <td><span class="label label-warning">Pending</span></td>
              <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
              <td><i class="fa fa-clock-o"></i> 1 dia</td>
            </tr>
            <tr>
              <td>657</td>
              <td>Bob Doe</td>
              <td>11-7-2014</td>
              <td><span class="label label-primary">Approved</span></td>
              <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
              <td><i class="fa fa-clock-o"></i> 1 minutos</td>
            </tr>
            <tr>
              <td>175</td>
              <td>Mike Doe</td>
              <td>11-7-2014</td>
              <td><span class="label label-danger">Denied</span></td>
              <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
              <td><i class="fa fa-clock-o"></i> 2 hora</td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">



        @endsection
