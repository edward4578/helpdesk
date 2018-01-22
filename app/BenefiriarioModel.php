<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Exception;
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

    public function canaimas() {
        return $this->belongsToMany('App\CanaimaModel', 'beneficiario_x_canaima', 'beneficiario_id', 'canaima_id')
        ->withPivot(array('serial_canaima', 'descripcion'));
    }

    public static function getCedulaBeneficiario($cedula){

        $beneficiarioModel = self::where('cedula','=',$cedula)->first();
        if (!$beneficiarioModel) {
            return response()->json(['error' => 'la Cedula no exite'], 404);
        }
       // foreach ($beneficiarioModel as $item) {
        $beneficiarioModel->parroquia->municipio->estado;
        $beneficiarioModel->canaimas;
       // }

        return $beneficiarioModel;
    }
}
