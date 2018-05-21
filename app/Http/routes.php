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


  Route::group(['middleware' => ['auth' , 'administrador']], function () {
    //
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


//Crud de Infocentros
  	Route::resource('infocentro', 'InfocentroController');
  	Route::get('infocentros/{id}/destroy', ['uses' => 'InfocentroController@destroy', 'as' => 'infocentro.destroy']);

//Crud de Fallas 
  	Route::resource('falla','FallasController');
  	Route::get('falla/{id}/destroy', ['uses' => 'FallasController@destroy', 'as' => 'falla.destroy']);
    Route::get('getFallas', 'FallasController@getFallas');

//Crud de Soluciones 
    Route::resource('solucion','SolucionesController');
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
    Route::get('graficos/general','GraficosController@ticketGeneradosTodos');
    
    
    
    
  //Reportes de Estados de Ticket
      //ticket generados mensuales
    Route::get('reportes/mensual','ReporteController@mensuales');
      //ticket generados Pendientes
    Route::get('reportes/pendientes','ReporteController@pendientes');    
      //ticket generados por Procesar
    Route::get('reportes/porProcesar','ReporteController@porProcesar');


//Estados Municipiio y Parroquias AJAX
    Route::get('municipios/{id}', [ 'as' => 'municipios', 'uses' => 'BeneficiarioController@getMunicipios']);
    Route::get('parroquias/{id}', [ 'as' => 'parroquias', 'uses' => 'BeneficiarioController@getParroquias']);

    Route::get('getCedulaBeneficiario/{cedula}', 'BeneficiarioController@getCedulaBeneficiario');
  });
