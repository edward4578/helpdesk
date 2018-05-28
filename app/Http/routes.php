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

Route::group(['middleware' => ['auth', 'guest']], function () {
    // Authentication Routes...
    Route::get('login', 'Auth\AuthController@showLoginForm');
    Route::post('login', 'Auth\AuthController@login');
    Route::get('logout', 'Auth\AuthController@logout');
});
//Estados Municipiio y Parroquias AJAX
Route::get('municipios/{id}', [ 'as' => 'municipios', 'uses' => 'BeneficiarioController@getMunicipios']);
Route::get('parroquias/{id}', [ 'as' => 'parroquias', 'uses' => 'BeneficiarioController@getParroquias']);

Route::group(['middleware' => ['auth', 'administrador']], function () {
    //
//Crud de Usuario//
    Route::resource('usuario', 'UsuarioController');
    Route::get('usuario/{id}/destroy', ['uses' => 'UsuarioController@destroy', 'as' => 'usuario.destroy']);

//Crud de Beneficiario
    Route::resource('beneficiario', 'BeneficiarioController');


//Crud de Canaima con Usuario
    Route::resource('canaima', 'canaimaController');
    Route::get('canaima/{id}/destroy', ['uses' => 'canaimaController@destroy', 'as' => 'canaima.destroy']);


//Crud de Infocentros
    Route::resource('infocentro', 'InfocentroController');
    Route::get('infocentros/{id}/destroy', ['uses' => 'InfocentroController@destroy', 'as' => 'infocentro.destroy']);

//Crud de Fallas 
    Route::resource('falla', 'FallasController');
    Route::get('falla/{id}/destroy', ['uses' => 'FallasController@destroy', 'as' => 'falla.destroy']);
    Route::get('getFallas', 'FallasController@getFallas');

//Crud de Soluciones 
    Route::resource('solucion', 'SolucionesController');
    Route::get('solucion/{id}/destroy', ['uses' => 'SolucionesController@destroy', 'as' => 'solucion.destroy']);
    //soluciones
    Route::get('getSoluciones', 'SolucionesController@getSoluciones');

//Crud de Ticket
    Route::resource('ticket', 'TicketController');
    Route::get('ticket/{id}/destroy', ['uses' => 'TicketController@destroy', 'as' => 'ticket.destroy']);

    //pendientes por Usuario
    Route::get('tickets/pendientes', 'TicketController@getUserticketPentiente');

    //Cerrados por Usuario
    Route::get('tickets/procesados', 'TicketController@getUserticketCerrados');

    //Rechazados por Usuario
    Route::get('tickets/rechazados', 'TicketController@getUserticketRechazados');

    //Graficos 
    Route::get('graficos/general', 'GraficosController@ticketGeneradosTodos');

    Route::get('graficos/infocentros', 'GraficosController@GraficosPorInfoncentro');




    //Reportes de Estados de Ticket
    //ticket generados mensuales
    Route::get('reportes/mensual', 'ReporteController@mensuales');
    //ticket generados Pendientes
    Route::get('reportes/pendientes', 'ReporteController@pendientes');
    //ticket generados por Procesar
    Route::get('reportes/porProcesar', 'ReporteController@porProcesar');




    Route::get('getCedulaBeneficiario/{cedula}', 'BeneficiarioController@getCedulaBeneficiario');
});


//Perfil del tecnico
Route::group(['middleware' => ['auth', 'tecnico']], function () {

//Crud De Beneficiario
    Route::get('tecnico/beneficiario', [ 'as' => 'tecnico.beneficiario.index', 'uses' => 'BeneficiarioController@index2']);
    //Formulario de Crear
    Route::get('tecnico/beneficiario/create', 'BeneficiarioController@create2');
    //Crear Beneficiario
    Route::post('tecnico/beneficiario', 'BeneficiarioController@store2');
    //Formulario de Actualizar
    Route::get('tecnico/beneficiario/{id}/edit', [ 'as' => 'tecnico.beneficiario.edit', 'uses' => 'BeneficiarioController@edit2']);
    //Actualizar
    Route::put('tecnico/beneficiario/{id}', [ 'as' => 'tecnico.beneficiario.update', 'uses' => 'BeneficiarioController@actualizar']);

    //crud de canaima  
    Route::get('tecnico/canaima', [ 'as' => 'tecnico.canaima.index', 'uses' => 'canaimaController@index2']);
    //Formulario de Crear
    Route::get('tecnico/canaima/create', [ 'as' => 'tecnico.canaima.create', 'uses' => 'canaimaController@create2']);
    //Crear Canaima
    Route::post('tecnico/canaima', 'canaimaController@store2');
    //Formulario de Editar Canaima
    Route::get('tecnico/canaima/{id}/edit', [ 'as' => 'tecnico.canaima.edit', 'uses' => 'canaimaController@edit2']);
    //Actualizar
    Route::put('tecnico/canaima/{id}', [ 'as' => 'tecnico.canaima.update', 'uses' => 'canaimaController@update2']);
    //Eliminar
    Route::get('tecnico/canaima/{id}/destroy', ['uses' => 'canaimaController@eliminar', 'as' => 'tecnico.canaima.destroy']);
    
    
    
    //crud de canaima  
    Route::get('tecnico/falla', [ 'as' => 'tecnico.falla.index', 'uses' => 'FallasController@index2']);
    //Formulario de Crear
    Route::get('tecnico/falla/create', [ 'as' => 'tecnico.falla.create', 'uses' => 'FallasController@create2']);
    //Crear Canaima
    Route::post('tecnico/falla', 'FallasController@store2');
    //Formulario de Editar Canaima
    Route::get('tecnico/falla/{id}/edit', [ 'as' => 'tecnico.falla.edit', 'uses' => 'FallasController@edit2']);
    //Actualizar
    Route::put('tecnico/falla/{id}', [ 'as' => 'tecnico.falla.update', 'uses' => 'FallasController@update2']);
    //Eliminar
    Route::get('tecnico/falla/{id}/destroy', ['uses' => 'FallasController@eliminar', 'as' => 'tecnico.falla.destroy']);
    
    
    
     //crud de canaima  
    Route::get('tecnico/solucion', [ 'as' => 'tecnico.solucion.index', 'uses' => 'SolucionesController@index2']);
    //Formulario de Crear
    Route::get('tecnico/solucion/create', [ 'as' => 'tecnico.solucion.create', 'uses' => 'SolucionesController@create2']);
    //Crear Canaima
    Route::post('tecnico/solucion', 'SolucionesController@store2');
    //Formulario de Editar Canaima
    Route::get('tecnico/solucion/{id}/edit', [ 'as' => 'tecnico.solucion.edit', 'uses' => 'SolucionesController@edit2']);
    //Actualizar
    Route::put('tecnico/solucion/{id}', [ 'as' => 'tecnico.solucion.update', 'uses' => 'SolucionesController@update2']);
    //Eliminar Solucion
    Route::get('tecnico/solucion/{id}/destroy', ['uses' => 'SolucionesController@eliminarSolucion', 'as' => 'tecnico.solucion.destroy']);
    
    
    
});
