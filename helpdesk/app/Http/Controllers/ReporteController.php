<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use DB;
use Charts;
use App\EstadoModel;
use App\MunicipioModel;
use App\ParroquiaModel;
use App\BenefiriarioModel;
use App\beneficiario_x_canaima;
use App\TicketModel;
use App\CanaimaModel;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Facades\Datatables;
use Validator;
use Carbon\Carbon;
use App;

class ReporteController extends Controller {

    //
    public function __construct() {
        Carbon::setLocale('es');
    }

    public function ReporteTicketPendientes(Request $request) {
        $usuario = $request->user();


        $ticket = TicketModel::ticketAll(1);
        $view = view('reporte.repTikPendientes')->with('ticket', $ticket)
                        ->with('usuario', $usuario)->render();

        //PDF
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper('a4', 'landscape');
        return $pdf->stream("TicketPendiente.pdf", array("Attachment" => 1));
    }

    public function ReporteTicketProcesados(Request $request) {
        $usuario = $request->user();


        $ticket = TicketModel::ticketCerrados(2);
        //dd($ticket);
        $view = view('reporte.repTikProcesados')->with('ticket', $ticket)
                        ->with('usuario', $usuario)->render();

        //PDF
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper('a4', 'landscape');
        return $pdf->stream("TicketProcesados.pdf", array("Attachment" => 1));
    }
    
    public function ReporteTicketRechazados(Request $request) {
        $usuario = $request->user();


        $ticket = TicketModel::ticketCerrados(3);
        //dd($ticket);
        $view = view('reporte.repTikRechazados')->with('ticket', $ticket)
                        ->with('usuario', $usuario)->render();

        //PDF
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper('a4', 'landscape');
        return $pdf->stream("TicketRechazados.pdf", array("Attachment" => 1));
    }
    
    
    
    
    
    
    
    
    

}
