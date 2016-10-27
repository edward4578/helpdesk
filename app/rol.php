<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rol extends Model
{
    //tabla de Roles de Usuarios
    protected $table = 'rol';

    protected $fillable = [
        'rol', 
    ];



}
