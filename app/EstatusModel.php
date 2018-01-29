<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstatusModel extends Model
{
    //
	protected $table = 'estatus';
	protected $fillable = [
		'estatus',
		'descripcion',
		'activo',
	];
	public $timestamps = false;
}
