<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

    public static function canaima_exist($id) {
        $canaima = self::where('canaima_id', '=', $id);
        if (!$canaima) {
            return false;
        }
        return true;
    }

}
