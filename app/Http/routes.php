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


//Crud de Canaima con Usuario
Route::resource('canaima', 'canaimaController');
Route::get('canaima/{id}/destroy', ['uses' => 'canaimaController@destroy', 'as' => 'canaima.destroy']);


//Estados Municipiio y Parroquias
//Route::get('beneficiario/municipios/{id}', 'BeneficiarioController@getMunicipios');
//Route::get('beneficiario/parroquias/{id}', 'BeneficiarioController@getParroquias');


Route::get('municipios/{id}', 'BeneficiarioController@getMunicipios');
Route::get('parroquias/{id}', 'BeneficiarioController@getParroquias');


Route::get('getbeneficiarios', 'canaimaController@getBeneficiarios');