<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CanaimaModel extends Model {

    //

    public $table = 'canaima';
    protected $fillable = [
        'serial',
        'modelo',
    ];
    public $timestamps = false;

}
