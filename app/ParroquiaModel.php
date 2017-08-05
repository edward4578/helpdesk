<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParroquiaModel extends Model {

    //
    public $table = 'parroquia';
    protected $fillable = [
        'parroquia',
        'municipio_id',
        'activo',
    ];
    public $timestamps = false;

    public static function parroquias($id) {
        return ParroquiaModel::where('municipio_id', '=', $id)
                        ->get();
    }

    public function municipio() {
        return $this->belongsTo('App\MunicipioModel', 'municipio_id');
    }

}
