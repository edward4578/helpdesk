<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\BenefiriarioModel;
use Exception;
use SoftDeletes;
class CanaimaModel extends Model {

    //

    public $table = 'canaima';
    protected $fillable = [
        'modelo',
    ];
    protected $dates = ['deleted_at'];
    public $timestamps = false;

    public function canaimas() {
        return $this->belongsToMany('App\BenefiriarioModel', 'beneficiario_x_canaima', 'canaima_id', 'beneficiario_id')
                        ->withPivot(array('serial_canaima', 'descripcion'));
    }

    public static function listCanaima() {
        $canaimaModel = self::orderBy('modelo', 'ASC')->get();
        return $canaimaModel;
    }

    public static function deleteCanaima($id) {
    $canaimaModel = self::find($id);
        if (is_null($canaimaModel)) {
         $msg = config('constants.PROCESS_STATES.ERROR_DATA_NOT_FOUND');
          return $msg;
        }
     $canaimaModel->delete();
     $msg = config('constants.PROCESS_STATES.OK');
     return $msg;
    }

}
