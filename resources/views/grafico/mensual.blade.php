@extends('layouts.app')

@section('contentheader_title')
<h1>Reporte de Ticket Generados</h1>
@endsection
@section('localizacion')
<li><a href="#">Inicio</a></li>
<li><a href="#">reportes</a></li>
<li class="active">Ticket Generados</li>
@endsection
@section('main-content')

<div class="box box-success">
	<div class="box-header with-border">
		<h3 class="box-title">Estadisticas</h3>
		<div class="box-tools pull-right">
			<!-- Buttons, labels, and many other things can be placed here! -->
			<!-- Here is a label for example -->
			{!! Charts::assets() !!}
		</div><!-- /.box-tools -->
	</div><!-- /.box-header -->
	<div class="box-body">
		<div class="row">
			<div class="col-sm-6">
				{!! $chart->html() !!}
			</div>
		</div>
		
	</div><!-- /.box-body -->
	<div class="box-footer">

	</div><!-- box-footer -->
</div><!-- /.box -->


@endsection
@section('scripts')
{!! $chart->script() !!}

@endsection