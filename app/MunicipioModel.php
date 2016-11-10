<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MunicipioModel extends Model {

    //
    public $table = 'municipio';
    protected $fillable = [
        'municipio',
        'estado_id',
        'activo',
    ];
    public $timestamps = false;

    public static function municipios($id) {
        return MunicipioModel::where('estado_id', '=', $id)
                        ->get();
    }

}
