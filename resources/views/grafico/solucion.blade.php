@extends('layouts.app')

@section('contentheader_title')
<h1>Graficos de Concurrencia de Fallas</h1>
@endsection
@section('localizacion')
<li><a href="#">Inicio</a></li>
<li><a href="#">Graficos</a></li>
<li class="active">Graficos por Soluciones</li>
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
            <div class="col-sm-12">
                <div id="piechart" style="width: 900px; height: 500px;"></div>
            </div>

        </div>
    </div><!-- /.box-body -->
    <div class="box-footer">

    </div><!-- box-footer -->
</div><!-- /.box -->


@endsection
@section('scripts')

<script>
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Fallas', 'total'],
                @foreach ($soluciones as $solucion)
                    ['{!! $solucion->name !!}',{!! $solucion->data !!}],
                @endforeach
        ]);

        var options = {
          title: 'Soluciones más Comunes'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
</script>
@endsection