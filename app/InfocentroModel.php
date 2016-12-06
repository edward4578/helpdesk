<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfocentroModel extends Model {

    //
    public $table = 'infocentros';
    protected $fillable = [
        'mir',
        'nombre_infocentro',
        'descripcion',
        'activo',
        'direccion',
        'estado_id',
        'municipio_id',
        'parroquia_id',
    ];
    public $timestamps = false;

    public static function infocentros() {

        $modelCanaima = self::orderBy('nombre_infocentro', 'desc')->get();
        return $modelCanaima;
    }

}
