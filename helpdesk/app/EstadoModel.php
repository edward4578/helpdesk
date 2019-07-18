<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadoModel extends Model {

    //
    public $table = 'estado';
    protected $fillable = [
        'estado',
        'activo',
    ];
    public $timestamps = false;

    
    
}
