<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CanaimaModel extends Model {

    //

    public $table = 'canaima';
    protected $fillable = [
        'modelo',
    ];
    public $timestamps = false;

public static function canaimas(){
    $canaimas = self::orderBy('modelo', 'ASC')->get();
        return $canaimas;
}
    
}
