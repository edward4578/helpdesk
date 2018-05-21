<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use DB;
use Charts;

class GraficosController extends Controller
{
    //
    	public function ticketGeneradosTodos()
	{
	//Pendientes
	$pendientes = DB::table('ticket')->where('estatus_id','=',1)->count();
	//Procesados
	$procesados = DB::table('ticket')->where('estatus_id','=',2)->count();
	//Rechazados
	$rechazados = DB::table('ticket')->where('estatus_id','=',3)->count();

		$chart = Charts::create('donut', 'highcharts')
		->title('Total de Ticket Generados')
		->labels(['Procesados', 'Pendientes', 'Rechazados'])
		 //->colors(['#42a5f5 ', '#ffca28', '#dd2c00' ])
		->values([$procesados,$pendientes,$rechazados])
		->dimensions(600,400)
		->responsive(false);
		return view('grafico.general',['chart'=> $chart]);
	}
}
