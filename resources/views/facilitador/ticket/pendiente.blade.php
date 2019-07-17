@extends('layouts.app')

@section('contentheader_title')
<h1>Mis Tickets Pendientes</h1>
@endsection
@section('localizacion')
<li><a href="">Inicio</a></li>
<li><a href="#">Ticket</a></li>
<li class="active">Pendientes</li>
@endsection
@section('main-content')

<div class="col-xs-12">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title"><i class="fa fa-tags"> </i> Mis Ticket Pendientes <i class="fa fa-pencil"></i></h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>Beneficiario</th>
            <th>Fecha</th>
            <th>Tipo</th>
            <th>Descripcion de la Falla</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @if(!$ticket)
          <tr>  
            <td rowspan="7">
              <span class="label label-warning text-center"> no exiten ticket Pendientes</span>
            </td>
          </tr>
          @endif         
          @foreach($ticket as $item)
          <td>{!!$item->id!!}</td>
          <td>{!!$item->nombres!!} {!!$item->apellidos!!}</td>
          <td width="81">{!! \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item->fecha)->toDateString();   !!}</td>
          <td><span class="label label-warning">{!!$item->estatus!!}</span></td>
          <td>{!!$item->falla !!}</td>  
          <td>
            <a class="btn btn-info btn-xs" href="{{ route('ticket.edit', $item->id) }}" role="button"><span class="fa fa-unlock" aria-hidden="true"></span> Procesar</a>
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