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
        'parroquia_id',
    ];
    public $timestamps = false;

    public function parroquia() {
        return $this->belongsTo('App\ParroquiaModel', 'parroquia_id');
    }

    public static function beneficiarios(){
        $beneficiarioModel = self::lists('id','cedula');
        return $beneficiarioModel; 
    }
}
