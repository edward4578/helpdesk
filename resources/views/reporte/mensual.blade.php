@extends('layouts.app')

@section('contentheader_title')
<h1>Reporte de Ticket Generados Mensuales</h1>
@endsection
@section('localizacion')
<li><a href="#">Inicio</a></li>
<li><a href="#">reportes</a></li>
<li class="active">Mensuales</li>
@endsection
@section('main-content')

<div class="box box-success">
	<div class="box-header with-border">
		<h3 class="box-title">Default Box Example</h3>
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
<script>
	var ctx = document.getElementById("myChart");
	var myChart = new Chart(ctx, {
		type: 'pie',
		data: {
			labels: ["PEndi", "Blue", "Yellow", "Green", "Purple", "Orange"],
			datasets: [{
				label: '# of Votes',
				data: [12, 19, 3, 5, 2, 3],
				backgroundColor: [
				'rgba(255, 99, 132, 0.2)',
				'rgba(54, 162, 235, 0.2)',
				'rgba(255, 206, 86, 0.2)',
				'rgba(75, 192, 192, 0.2)',
				'rgba(153, 102, 255, 0.2)',
				'rgba(255, 159, 64, 0.2)'
				],
				borderColor: [
				'rgba(255,99,132,1)',
				'rgba(54, 162, 235, 1)',
				'rgba(255, 206, 86, 1)',
				'rgba(75, 192, 192, 1)',
				'rgba(153, 102, 255, 1)',
				'rgba(255, 159, 64, 1)'
				],
				borderWidth: 1
			}]
		}
	});
</script>
@endsection