<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class TicketModel extends Model {

    //
    protected $table = 'ticket';
    protected $fillable = [
        'descripcion',
        'beneficiario_x_canaima_id',
        'users_id',
        'estatus_id',
        'falla_id',
    ];
    public $timestamps = false;

    public function ben_x_can() {
        return $this->belongsTo('App\beneficiario_x_canaima', 'beneficiario_x_canaima_id');
    }

    public function usuario() {
        return $this->belongsTo('App\User', 'users_id');
    }

    public function estatus() {
        return $this->belongsTo('App\EstatusModel', 'estatus_id');
    }

    public function falla() {
        return $this->belongsTo('App\FallaModel', 'falla_id');
    }

    public function historialTickets() {
        return $this->belongsToMany('App\TicketModel', 'ticket_id');
    }

    public static function ticketAll($estatus) {

        $ticketAll = DB::table('ticket')
                ->join('beneficiario_x_canaima', 'ticket.beneficiario_x_canaima_id', '=', 'beneficiario_x_canaima.id')
                ->join('beneficiario', 'beneficiario_x_canaima.beneficiario_id', '=', 'beneficiario.id')
                ->join('users', 'ticket.users_id', '=', 'users.id')
                ->join('estatus', 'ticket.estatus_id', '=', 'estatus.id')
                ->join('fallas', 'ticket.falla_id', '=', 'fallas.id')
                ->select('ticket.id', 'ticket.fecha', 'estatus.estatus', 'fallas.falla', 'beneficiario.nombres', 'beneficiario.apellidos')
                ->where('estatus.id', $estatus)
                ->get();

        return $ticketAll;
    }

    public static function ticketAllUser($estatus, $user) {

        $ticketAll = DB::table('ticket')
                ->join('beneficiario_x_canaima', 'ticket.beneficiario_x_canaima_id', '=', 'beneficiario_x_canaima.id')
                ->join('beneficiario', 'beneficiario_x_canaima.beneficiario_id', '=', 'beneficiario.id')
                ->join('users', 'ticket.users_id', '=', 'users.id')
                ->join('estatus', 'ticket.estatus_id', '=', 'estatus.id')
                ->join('fallas', 'ticket.falla_id', '=', 'fallas.id')
                ->select('ticket.id', 'ticket.fecha', 'estatus.estatus', 'fallas.falla', 'beneficiario.nombres', 'beneficiario.apellidos')
                ->where('estatus.id', $estatus)
                ->where('ticket.users_id', $user)
                ->get();

        return $ticketAll;
    }

    public static function ticketCerradosUsuario($estatus, $user) {

        $ticketAll = DB::table('ticket')
                ->join('beneficiario_x_canaima', 'ticket.beneficiario_x_canaima_id', '=', 'beneficiario_x_canaima.id')
                ->join('Historialticket', 'ticket.id', '=', 'Historialticket.ticket_id')
                ->join('soluciones', 'Historialticket.soluciones_id', '=', 'soluciones.id')
                ->join('beneficiario', 'beneficiario_x_canaima.beneficiario_id', '=', 'beneficiario.id')
                ->join('users', 'ticket.users_id', '=', 'users.id')
                ->join('estatus', 'ticket.estatus_id', '=', 'estatus.id')
                ->join('fallas', 'ticket.falla_id', '=', 'fallas.id')
                ->select('ticket.id', 'ticket.fecha', 'estatus.estatus', 'fallas.falla', 'beneficiario.nombres', 'beneficiario.apellidos', 'soluciones.solucion', 'Historialticket.descripcion', 'Historialticket.created_at', 'Historialticket.updated_at'
                )
                ->where('estatus.id', $estatus)
                ->where('ticket.users_id', $user)
                ->get();

        return $ticketAll;
    }

    public static function ticketCerrados($estatus) {

        $ticketAll = DB::table('ticket')
                ->join('beneficiario_x_canaima', 'ticket.beneficiario_x_canaima_id', '=', 'beneficiario_x_canaima.id')
                ->join('Historialticket', 'ticket.id', '=', 'Historialticket.ticket_id')
                ->join('soluciones', 'Historialticket.soluciones_id', '=', 'soluciones.id')
                ->join('beneficiario', 'beneficiario_x_canaima.beneficiario_id', '=', 'beneficiario.id')
                ->join('users', 'ticket.users_id', '=', 'users.id')
                ->join('estatus', 'ticket.estatus_id', '=', 'estatus.id')
                ->join('fallas', 'ticket.falla_id', '=', 'fallas.id')
                ->select('ticket.id', 'ticket.fecha', 'users.name as usuario', 'estatus.estatus', 'fallas.falla', 'beneficiario.nombres', 'beneficiario.apellidos', 'soluciones.solucion', 'Historialticket.descripcion', 'Historialticket.created_at', 'Historialticket.updated_at'
                )
                ->where('ticket.estatus_id', $estatus)
                ->get();

        return $ticketAll;
    }

    public static function ticketIdFirt($id) {

        $ticketAll = DB::table('ticket')
                ->join('Historialticket', 'ticket.id', '=', 'Historialticket.ticket_id')
                ->join('beneficiario_x_canaima', 'ticket.beneficiario_x_canaima_id', '=', 'beneficiario_x_canaima.id')
                ->join('beneficiario', 'beneficiario_x_canaima.beneficiario_id', '=', 'beneficiario.id')
                ->join('users', 'ticket.users_id', '=', 'users.id')
                ->join('estatus', 'ticket.estatus_id', '=', 'estatus.id')
                ->join('fallas', 'ticket.falla_id', '=', 'fallas.id')
                ->select('ticket.id', 'Historialticket.id as historial_id', 'Historialticket.descripcion', 'Historialticket.soluciones_id', 'ticket.fecha', 'estatus.id as estatus_id', 'estatus.estatus', 'fallas.falla', 'beneficiario_x_canaima.serial_canaima', 'beneficiario.nombres', 'beneficiario.apellidos')
                ->where('ticket.id', $id)
                ->first();

        return $ticketAll;
    }

    public static function GraficoPorInfocentros($infocentro) {

        $ticketAll = DB::table('ticket')                
                ->join('users', 'ticket.users_id', '=', 'users.id')
                ->join('infocentros', 'users.infocentro_id', '=', 'infocentros.id')
                ->join('estatus', 'ticket.estatus_id', '=', 'estatus.id')
                ->select('estatus.estatus as estado', DB::raw('count(*) as total'))
                ->where('infocentros.id','=',$infocentro)
                ->groupBy('estado')
                ->get();

        return $ticketAll;
    }

        public static function GraficoPorFalla() {

        $fallas = DB::table('ticket')                
                ->join('users', 'ticket.users_id', '=', 'users.id')
                ->join('infocentros', 'users.infocentro_id', '=', 'infocentros.id')
                ->join('estatus', 'ticket.estatus_id', '=', 'estatus.id')
                ->join('fallas', 'ticket.falla_id', '=', 'fallas.id')
                ->select('fallas.falla as name', DB::raw('count(*) as data'))
                ->groupBy('falla')
                ->get();

        return $fallas;
    }

}
