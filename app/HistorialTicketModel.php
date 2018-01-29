<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistorialTicketModel extends Model
{
    //
	protected $table = 'Historialticket';
	protected $fillable = [
		'descripcion',
		'ticket_id',
		'users_id',
		'soluciones_id',
	];
	public $timestamps = false;
}
