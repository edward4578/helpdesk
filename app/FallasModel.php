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

}
