<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FallasModel;
use App\TicketModel;
use App\HistorialTicketModel;
use App\SolucionesModel;
use App\EstatusModel;
use App\Http\Requests;
use Carbon\Carbon;
use Validator;

class TicketController extends Controller
{
    public function __construct() {
        Carbon::setLocale('es');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $rulesCreated = array(
        'falla'=> 'required',
        'falla_id'=> 'required',
        'users_id' => 'required|exists:users,id',
        'beneficiario_x_canaima_id' => 'required|not_in:0|exists:beneficiario_x_canaima,id',
        'estatus_id' => 'required|exists:estatus,id',
    );
    private $rulesUpdate = array(
        'solucion'=> 'required',
        'solucion_id'=> 'required',
        'users_id' => 'required|exists:users,id',
        'estatus_id' => 'required|exists:estatus,id',
    );
    private $rulesMessages = array(
        'falla.required' => 'La descricpción de la falla es obligatorio',
        'falla_id.required' => 'tiene que seleccionar un tipo de falla',
        'users_id.not_in' => 'error en asignar a usuario',
        'beneficiario_x_canaima_id.not_in' => 'Debe Seleccionar una computadora',
        'estatus_id.required' => 'El estatus no exite',
    );

    public function index()
    {
        //Vista de Ticket Pendientes status == 1
        $tickets = ticketModel::ticketAll(1);
        return view('ticket.index')->with('tickets', $tickets);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Generar Ticket
    	$fallas = FallasModel::fallas();
    	return view('ticket.create')->with('fallas', $fallas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), $this->rulesCreated, $this->rulesMessages);
        if ($validator->fails()) {
            return redirect('ticket/create')
            ->withErrors($validator)
            ->withInput();
        }
        //Creacion del Ticket
        $ticket = new TicketModel();
        $ticket->descripcion = $request->descripcion;
        $ticket->beneficiario_x_canaima_id = $request->beneficiario_x_canaima_id; 
        $ticket->users_id = $request->users_id; 
        $ticket->estatus_id = $request->estatus_id; 
        $ticket->falla_id = $request->falla_id;
        $ticket->save();
        $id = $ticket->id;
        //Creacion del Historial de Ticket
        $historialTicket = new HistorialTicketModel();
        $historialTicket->ticket_id = $id;
        $historialTicket->users_id = $request->users_id; 
        $historialTicket->save();
        
        notify()->flash('Se ha Registrado el Ticket Correctamente', 'success');
        return redirect()->route('ticket.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        try {

            $ticket = TicketModel::ticketIdFirt($id);
            $soluciones = SolucionesModel::all();
            $estatus = EstatusModel::all();
            //dd($ticket);
            return view('ticket.edit')->with(array('ticket' => $ticket, 'soluciones'=> 
                $soluciones, 'estatus' => $estatus));

        } catch (Exception $e) {
            return $e;
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), $this->rulesUpdate, $this->rulesMessages);
        if ($validator->fails()) {
            return redirect('ticket/' . $id . '/edit')
            ->withErrors($validator)
            ->withInput();
        }
        $ticket = TicketModel::find($id);
        $ticket->estatus_id = $request->estatus_id;
        $ticket->save();
        $historialTicket = HistorialTicketModel::where('ticket_id','=', $id)->first();
        $historialTicket->soluciones_id = $request->solucion_id;
        $historialTicket->descripcion = $request->descripcion;
        $historialTicket->save();

        notify()->flash('Se ha Cerrado el Ticket Correctamente', 'success');
        return redirect()->route('ticket.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
