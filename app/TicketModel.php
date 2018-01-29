<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class TicketModel extends Model
{
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

	public static function ticketAll($estatus){

		$ticketAll = DB::table('ticket')
		->join('beneficiario_x_canaima', 'ticket.beneficiario_x_canaima_id', '=', 'beneficiario_x_canaima.id')
		->join('beneficiario', 'beneficiario_x_canaima.beneficiario_id', '=', 'beneficiario.id')
		->join('users', 'ticket.users_id', '=', 'users.id')
		->join('estatus', 'ticket.estatus_id', '=', 'estatus.id')
		->join('fallas', 'ticket.falla_id', '=', 'fallas.id')
		->select('ticket.*','users.*', 'estatus.*', 'fallas.*', 'beneficiario_x_canaima.*','beneficiario.*')
		->where('estatus.id', $estatus)
		->get();

		return $ticketAll;
	}

}
