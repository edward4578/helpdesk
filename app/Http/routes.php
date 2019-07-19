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

  Route::group(['middleware' => ['auth']], function () {

    Route::get('getFallas', 'FallasController@getFallas');
    Route::get('getSoluciones', 'SolucionesController@getSoluciones');
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
    Route::get('beneficiarios/reporteBenefiarioId/{id}/', [ 'as' => 'beneficiario.reporteBenefiarioId', 'uses' => 'BeneficiarioController@beneficiarioReporteId']);



//Crud de Canaima con Usuario
    Route::resource('canaima', 'canaimaController');
    Route::get('canaima/{id}/destroy', ['uses' => 'canaimaController@destroy', 'as' => 'canaima.destroy']);
    Route::get('infocentros/reporteInfocentrooId/{id}/', [ 'as' => 'infocentro.reporteInfocentroId', 'uses' => 'InfocentrosController@infocentrosReporteId']);


//Crud de Infocentros
    Route::resource('infocentro', 'InfocentroController');
    Route::get('infocentros/{id}/destroy', ['uses' => 'InfocentroController@destroy', 'as' => 'infocentro.destroy']);

//Crud de Fallas 
    Route::resource('falla', 'FallasController');
    Route::get('falla/{id}/destroy', ['uses' => 'FallasController@destroy', 'as' => 'falla.destroy']);


//Crud de Soluciones 
    Route::resource('solucion', 'SolucionesController');
    Route::get('solucion/{id}/destroy', ['uses' => 'SolucionesController@destroy', 'as' => 'solucion.destroy']);
    //soluciones
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
    Route::get('graficos/infocentros/{id}', 'GraficosController@GraficosPorInfoncentro');
    Route::get('graficos/fallas', 'GraficosController@GraficoPorFalla');
    Route::get('graficos/soluciones', 'GraficosController@GraficoPorSoluciones');


//Reportes Generales 
    //ticket 
    Route::get('reporte/ticketPendiente', ['uses' => 'ReporteController@ReporteTicketPendientes', 'as' => 'reporte.ticketPendientes']);
    Route::get('reporte/ticketProcesado', ['uses' => 'ReporteController@ReporteTicketProcesados', 'as' => 'reporte.ticketProcesados']);
    Route::get('reporte/ticketRechazado', ['uses' => 'ReporteController@ReporteTicketRechazados', 'as' => 'reporte.ticketRechazados']);

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
    //Ver el Detalle de Un Beneficiario
    Route::get('tecnico/beneficiario/{id}/show', [ 'as' => 'tecnico.beneficiario.show', 'uses' => 'BeneficiarioController@show3']);

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

//Perfil de Facilitador
  Route::group(['middleware' => ['auth', 'facilitador'], 'prefix' => 'facilitador'], function () {

    //Lista de Usuarios
    Route::get('usuario', [ 'as' => 'facilitador.usuario.listaUsuario', 'uses' => 'UsuarioController@ListaUsuario']);

    //Crear Usuario (VISTA DEL FORMULARIO)
    Route::get('usuario/create', [ 'as' => 'facilitador.usuario.crearUsuario', 'uses' => 'UsuarioController@crearUsuario']);

    //Index o Vista de los Ticket
    Route::get('ticket', [ 'as' => 'facilitador.ticket.index', 'uses' => 'TicketController@index2']);

    //Cuando se envia el formulario a guardar!!!
    Route::post('ticket', [ 'as' => 'facilitador.ticket', 'uses' => 'TicketController@store2']);



    //Creacion de Ticket
    Route::get('ticket/create', [ 'as' => 'facilitador.ticket.create', 'uses' => 'TicketController@creartiket']);

    Route::get('ticket/edit/{id}', [ 'as' => 'facilitador.ticket.edit', 'uses' => 'TicketController@edit2']);

    Route::put('ticket/{id}', [ 'as' => 'facilitador.ticket.update', 'uses' => 'TicketController@update2']);


// Ticket procesado
    Route::get('ticket/procesados', [ 'as' => 'facilitador.ticket.procesados', 'uses' => 'TicketController@getUserticketCerrados2']);
    // Ticket rechazados
    Route::get('ticket/rechazados', [ 'as' => 'facilitador.ticket.rechazados', 'uses' => 'TicketController@getUserticketRechazados2']);


    //Index o Vista de los Beneficiarios
    Route::get('beneficiario', [ 'as' => 'facilitador.beneficiario.index', 'uses' => 'BeneficiarioController@index3']);
    //Formulario de Crear Beneficiario
    Route::get('beneficiario/create', [ 'as' => 'facilitador.beneficiario.create', 'uses' => 'BeneficiarioController@create3']);
    //Guardar Beneficiario
    Route::post('beneficiario', [ 'as' => 'facilitador.beneficiario', 'uses' => 'BeneficiarioController@store3']);
    //editar un Beneficiario
    Route::get('beneficiario/{id}/edit', [ 'as' => 'facilitador.beneficiario.edit', 'uses' => 'BeneficiarioController@edit3']);
    //Ver el Detalle de Un Beneficiario
    Route::get('beneficiario/{id}/show', [ 'as' => 'facilitador.beneficiario.show', 'uses' => 'BeneficiarioController@show2']);
    //Actualizar
    Route::put('beneficiario/{id}', [ 'as' => 'facilitador.beneficiario.update', 'uses' => 'BeneficiarioController@actualizar2']);
    //reporte beneficiario indivudual
    Route::get('beneficiario/reporteBenefiarioId/{id}/', [ 'as' => 'facilitador.beneficiario.reporteBenefiarioId', 'uses' => 'BeneficiarioController@beneficiarioReporteId']);
    //
    Route::get('beneficiario/getCedulaBeneficiario/{cedula}', 'BeneficiarioController@getCedulaBeneficiario2');
    /* Crud de Infocentro para el Facilitador */

    //index de Infocentro
    Route::get('infocentro', [ 'as' => 'facilitador.infocentro.index', 'uses' => 'InfocentroController@index2']);
    //Formulario de Crear Infocentro
    Route::get('infocentro/create', [ 'as' => 'facilitador.infocentro.create', 'uses' => 'InfocentroController@create2']);
    //Envio para guardar Infocentro.
    Route::post('infocentro', [ 'as' => 'facilitador.infocentro', 'uses' => 'InfocentroController@store2']);
    //Envio para editar Infocentro.
    Route::get('infocentro/{id}/edit', [ 'as' => 'facilitador.infocentro.edit', 'uses' => 'InfocentroController@edit2']);
    //Envio para actualizar el Infocentro.
    Route::put('infocentro/{id}', [ 'as' => 'facilitador.infocentro.update', 'uses' => 'InfocentroController@updateDos']);
    //Eliminar Infocentro 
    Route::get('infocentro/{id}/destroy', ['as' => 'facilitador.infocentro.destroy', 'uses' => 'InfocentroController@eliminar3']);


    /* Crud de Canaima para el Facilitador */

    //index de canaimas
    Route::get('canaima', [ 'as' => 'facilitador.canaima.index', 'uses' => 'canaimaController@index3']);
    //Formulario de Crear Canaima
    Route::get('canaima/create', [ 'as' => 'facilitador.canaima.create', 'uses' => 'canaimaController@create3']);
    //Envio para guardar Canaima.
    Route::post('canaima', [ 'as' => 'facilitador.canaima', 'uses' => 'canaimaController@store3']);
    //Formulario para editar Canaima.
    Route::get('canaima/{id}/edit', [ 'as' => 'facilitador.canaima.edit', 'uses' => 'canaimaController@edit3']);
    //Envio para actualizar Canaima.
    Route::put('canaima/{id}', [ 'as' => 'facilitador.canaima.update', 'uses' => 'canaimaController@update3']);
    //Eliminar Canaima 
    Route::get('canaima/{id}/destroy', ['as' => 'facilitador.canaima.destroy', 'uses' => 'canaimaController@eliminar3']);



    /* Crud de falla para el Facilitador */
    //index de fallas
    Route::get('falla', [ 'as' => 'facilitador.falla.index', 'uses' => 'FallasController@index3']);
    //Formulario de Crear Fallas
    Route::get('falla/create', [ 'as' => 'facilitador.falla.create', 'uses' => 'FallasController@create3']);
    //Envio para guardar fallas.
    Route::post('falla', [ 'as' => 'facilitador.falla', 'uses' => 'FallasController@store3']);
    //Envio para guardar fallas.
    Route::post('falla', [ 'as' => 'facilitador.falla', 'uses' => 'FallasController@store3']);
    //Formulario para editar fallas.
    Route::get('falla/{id}/edit', [ 'as' => 'facilitador.falla.edit', 'uses' => 'FallasController@edit3']);
    //Envio para actualizar fallas.
    Route::put('falla/{id}', [ 'as' => 'facilitador.falla.update', 'uses' => 'FallasController@update3']);
    //Eliminar falla 
    Route::get('falla/{id}/destroy', ['as' => 'facilitador.falla.destroy', 'uses' => 'FallasController@eliminar3']);

    /* Crud de falla para las Soluciones */
    //index de solucion
    Route::get('solucion', [ 'as' => 'facilitador.solucion.index', 'uses' => 'SolucionesController@index3']);
    //Formulario de Crear soluciones
    Route::get('solucion/create', [ 'as' => 'facilitador.solucion.create', 'uses' => 'SolucionesController@create3']);
    //Envio para guardar soluciones.
    Route::post('solucion', [ 'as' => 'facilitador.solucion', 'uses' => 'SolucionesController@store3']);
    //Envio para guardar soluciones.
    Route::post('solucion', [ 'as' => 'facilitador.slucion', 'uses' => 'SolucionesController@store3']);
    //Formulario para editar soluciones.
    Route::get('solucion/{id}/edit', [ 'as' => 'facilitador.solucion.edit', 'uses' => 'SolucionesController@edit3']);
    //Envio para actualizar soluciones.
    Route::put('solucion/{id}', [ 'as' => 'facilitador.solucion.update', 'uses' => 'SolucionesController@update3']);
    //Eliminar solucion 
    Route::get('solucion/{id}/destroy', ['as' => 'facilitador.solucion.destroy', 'uses' => 'SolucionesController@eliminar3']);
});
