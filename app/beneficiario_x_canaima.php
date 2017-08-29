<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class beneficiario_x_canaima extends Model {

    //    
    public $timestamps = false;
    public $table = 'beneficiario_x_canaima';
    protected $fillable = [
        'serial_canaima',
        'descripcion',
        'beneficiario_id',
        'canaima_id',
    ];

    
}
