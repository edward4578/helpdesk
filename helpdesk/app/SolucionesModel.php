<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolucionesModel extends Model {

    //
    public $table = 'soluciones';
    protected $fillable = [
        'solucion',
    ];
    public $timestamps = false;

    public static function getSoluciones() {
        $modelSolucion = self::orderBy('id', 'asc')->get();
        return $modelSolucion;
    }

    public static function deleteSolucion($id) {
        $modelSolucion = self::find($id);
        if (is_null($modelSolucion)) {
            $msg = config('constants.PROCESS_STATES.ERROR_DATA_NOT_FOUND');
            return $msg;
        }
        $modelSolucion->delete();
        $msg = config('constants.PROCESS_STATES.OK');
        return $msg;
    }

}
