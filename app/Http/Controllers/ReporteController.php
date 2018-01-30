<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Charts;

class ReporteController extends Controller
{
    //

	public function mensuales()
	{
		$chart = Charts::create('donut', 'highcharts')
		->title('Ticket')
		->labels(['Pendientes', 'Procesados', 'en Tramite'])
		->values([5,10,20])
		->dimensions(1000,500)
		->responsive(false);
		return view('reporte.mensual',['chart'=> $chart]);
	}
	public function pendientes()
	{
    	# code...
	}
	public function porProcesar()
	{
    	# code...
	}
}
