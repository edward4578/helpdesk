@extends('layouts.app')

@section('contentheader_title')
<h1>Mis Ticket Rechazados</h1>
@endsection
@section('localizacion')
<li><a href="">Inicio</a></li>
<li><a href="#">Ticket</a></li>
<li class="active">Rechazados</li>
@endsection
@section('main-content')

<div class="col-xs-12">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title"><i class="fa fa-tags"> </i> Mis Ticket Rechazados <i class="fa fa-thumbs-o-down"></i></h3>
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
						<th>Descripcion de la Solucion</th>
						<th>tiempo</th>  
						<th></th>
					</tr>
				</thead>
				<tbody>
					@if(!$ticketR)
					<tr>  
						<td colspan="7">
							<span class="label label-success text-center"> no exiten ticket Rechazados</span>
						</td>
					</tr>
					@endif         
					@foreach($ticketR as $item)
					<td>{!!$item->id!!}</td>
					<td>{!!$item->nombres!!} {!!$item->apellidos!!}</td>
					<td width="81">{!! \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item->fecha)->toDateString();   !!}</td>
					<td><span class="label label-danger">{!!$item->estatus!!}</span></td>
					<td>{!!$item->falla !!}</td> 
					<td>{!!$item->solucion !!}</td> 
					<td>{!! \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item->created_at)->diffForHumans(
						\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item->updated_at), true); !!}</td> 
						<td>
							<a class="btn btn-primary btn-xs" href="#" role="button"><span class="fa fa-lock" aria-hidden="true"></span> Detalles</a>
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