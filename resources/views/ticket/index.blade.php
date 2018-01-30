@extends('layouts.app')

@section('contentheader_title')
<h1>Crear Ticket</h1>
@endsection
@section('localizacion')
<li><a href="">Inicio</a></li>
<li><a href="#">Ticket</a></li>
<li class="active">Historial de Tickets Pendientes</li>
@endsection
@section('main-content')

<div class="col-xs-12">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title"><a class="btn btn-primary" href="{{ route('ticket.create') }}" role="button"><span class="glyphicon glyphicon-pencil" aria-hidden="true">Agregar</span></a> </h3>
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
						<th>Duracción</th>	
						<th></th>
					</tr>
				</thead>
				<tbody>         
					@foreach($tickets as $item)
					<td>{!!$item->id!!}</td>
					<td>{!!$item->nombres!!} {!!$item->apellidos!!}</td>
					<td>{!!$item->fecha!!}</td>
					<td><span class="label label-warning">{!!$item->estatus!!}</span></td>
					<td>{!!$item->falla !!}</td> 
					<td>{!!\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item->fecha)->addSeconds(5)->diffForHumans()!!}</td> 
					<td><a class="btn btn-primary btn-xs"  href="{{ route('ticket.edit', $item->id) }}" role="button"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
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