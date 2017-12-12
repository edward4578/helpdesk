<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FallasModel extends Model {

    public $table = 'fallas';
    protected $fillable = [
        'falla',
    ];
    public $timestamps = false;

    public static function fallas() {

        $modelFallas = self::orderBy('id', 'asc')->get();
        return $modelFallas;
    }

    public static function deleteFalla($id) {
        $fallaModel = self::find($id);
        if (is_null($fallaModel)) {
            $msg = config('constants.PROCESS_STATES.ERROR_DATA_NOT_FOUND');
            return $msg;
        }
        $fallaModel->delete();
        $msg = config('constants.PROCESS_STATES.OK');
        return $msg;
    }

}
