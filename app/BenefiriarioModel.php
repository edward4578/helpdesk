<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BenefiriarioModel extends Model
{
    //
    //
    protected $table = 'beneficiario';
    protected $fillable = [
        'cedula', 
        'nombres', 
        'apellidos', 
        'telefono',
        'email',
        'direccion_id',
    ];

public function direccion() {


}

}
