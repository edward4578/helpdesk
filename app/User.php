<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'password',
        'rol_id',
        'infocentro_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ]; /* vcx
      ] */

    public function rol() {
        return $this->belongsTo('App\rol', 'rol_id');
    }
    
    public function infocentro() {
        return $this->belongsTo('App\InfocentroModel', 'infocentro_id');
    }

    // Si el Valor esta Vacio guarda la misma Contraseña
    public function setPasswordAttribute($valor) {
        if (!empty($valor)) {
            $this->attributes['password'] = \Hash::make($valor);
        }
    }

}
