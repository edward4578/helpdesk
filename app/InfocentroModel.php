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

    public function estado() {
        return $this->belongsTo('App\EstadoModel', 'estado_id');
    }

    public function municipio() {
        return $this->belongsTo('App\MunicipioModel', 'municipio_id');
    }

    public function parroquia() {
        return $this->belongsTo('App\ParroquiaModel', 'municipio_id');
    }

    public static function infocentros() {

        $infocentros = self::orderBy('nombre_infocentro', 'ASC')->get();
        return $infocentros;
    }
}
