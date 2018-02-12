<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.2/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\TicketModel;
use Carbon\Carbon;
/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        Carbon::setLocale('es');
        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index(Request $request)
    {

     $userId = $request->user()->id;
     // Ticket Pendientes del Usuario == 1
     $ticket = TicketModel::ticketAllUser(1, $userId);
    // Ticket Processados del Usuario == 2
     $ticketP = TicketModel::ticketCerradosUsuario(2, $userId);
    // Ticket Rechazados del Usuario == 3
     $ticketR = TicketModel::ticketCerradosUsuario(3, $userId);

     return view('home')->with('ticket', $ticket)->with('ticketP', $ticketP)->with('ticketR', $ticketR);
 }
}