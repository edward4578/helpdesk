<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes...

Route::get('login', 'Auth\AuthController@showLoginForm');
Route::post('login', 'Auth\AuthController@login');
Route::get('logout', 'Auth\AuthController@logout');


//Crud de Usuario//
Route::resource('usuario', 'UsuarioController');
Route::get('usuario/{id}/destroy', ['uses' => 'UsuarioController@destroy', 'as' => 'usuario.destroy']);

//Crud de Beneficiario
Route::resource('beneficiario', 'BeneficiarioController');