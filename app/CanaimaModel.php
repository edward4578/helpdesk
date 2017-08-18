<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\BenefiriarioModel;
use Exception;
class CanaimaModel extends Model {

    //

    public $table = 'canaima';
    protected $fillable = [
        'modelo',
    ];
    public $timestamps = false;

    public function canaimas() {
        return $this->belongsToMany('App\BenefiriarioModel', 'beneficiario_x_canaima', 'canaima_id', 'beneficiario_id')
                        ->withPivot(array('serial_canaima', 'descripcion'));
    }

    public static function listCanaima() {
        $canaimaModel = self::orderBy('modelo', 'ASC')->get();
        return $canaimaModel;
    }

    public static function getCanaima($id) {
        $canaimaModel = self::find($id)->canaimas;
        
        if (is_null($canaimaModel)) {
            throw new Exception(null, config('constants.HTTP_STATUS.NOT_FOUND'));
        }
        return $canaimaModel;
    }

}
