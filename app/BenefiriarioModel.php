<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BenefiriarioModel extends Model {

    //
    //
    protected $table = 'beneficiario';
    protected $fillable = [
        'cedula',
        'nombres',
        'apellidos',
        'telefono',
        'email',
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

}
