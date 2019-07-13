<?php

Route::redirect('/', '/login');

Route::redirect('/home', '/admin');

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    

    Route::get('/', 'HomeController@index')->name('home');

    /********************************************************Inventario*/
    Route::delete('softwares/destroy', 'SoftwareController@massDestroy')->name('softwares.massDestroy');

    Route::resource('softwares', 'SoftwareController');
    
    Route::delete('perifericos/destroy', 'PerifericoController@massDestroy')->name('perifericos.massDestroy');

    Route::delete('perifericos/caracteristicasdelete', 'PerifericoController@caracteristicaDelete')->name('periferico.caracteristica.delete');

    Route::post('perifericos/caracteristicascreate', 'PerifericoController@caracteristicaCreate')->name('periferico.caracteristica.store');


     Route::resource('perifericos', 'PerifericoController');
    
     Route::delete('caracteristicas/destroy', 'CaracteristicaController@massDestroy')->name('caracteristicas.massDestroy');

     Route::resource('caracteristicas', 'CaracteristicaController');
    
     Route::delete('equipos/destroy', 'EquipoController@massDestroy')->name('equipos.massDestroy');

     Route::delete('equipos/caracteristicasdelete', 'EquipoController@caracteristicaDelete')->name('equipo.caracteristica.delete');
    

    Route::post('equipos/caracteristicascreate', 'EquipoController@caracteristicaCreate')->name('equipo.caracteristica.store');
    
     Route::resource('equipos', 'EquipoController');

     /********************************************************Inventario Pivot*/
  

    
    

    

     /********************************************Gestion de usuarios*/
    Route::get('user-actions', 'UserActionsController@index')->name('user-actions.index');

    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');

    Route::resource('permissions', 'PermissionsController');

    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');

    Route::resource('roles', 'RolesController');

    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');

    Route::resource('users', 'UsersController');


    /***********************************************Clientes*/
	Route::delete('clientes/destroy', 'ClienteController@massDestroy')->name('clientes.massDestroy');

    Route::resource('clientes', 'ClienteController');

    /******************************************************Configuraciones Generales*/
    Route::delete('dependencias/destroy', 'DependenciaController@massDestroy')->name('dependencias.massDestroy');

     Route::resource('dependencias', 'DependenciaController');

     Route::delete('edificios/destroy', 'EdificioController@massDestroy')->name('edificios.massDestroy');

     Route::resource('edificios', 'EdificioController');

     Route::delete('areas/destroy', 'AreaController@massDestroy')->name('areas.massDestroy');

     Route::resource('areas', 'AreaController');
	 Route::delete('tipos/destroy', 'TipoController@massDestroy')->name('tipos.massDestroy');

     Route::resource('tipos', 'TipoController');

   /***********************************************Ticket*/
    Route::resource('tickets', 'TicketController');
    Route::resource('ticketsequipos', 'TicketEquipoController');
    Route::resource('ticketssoftwares', 'TicketSoftwareController');
    Route::resource('ticketsapoyos', 'TicketApoyoController');
    Route::resource('ticketseventos', 'TicketEventoController');
    Route::resource('ticketsadiestramientos', 'TicketAdiestramientoController');



 /***********************************************Ticket*/
    Route::get('useractions', 'UserActionsController@index')->name('useractions.index');






});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
