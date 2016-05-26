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




Route::group(['prefix' => 'admin'], function(){
	# ruta de roles
	Route::resource('roles', 'RolesController');
	Route::resource('usuarios', 'UsuariosController');
	Route::resource('Instructores', 'InstructoresController');
	Route::resource('Competencias', 'CompetenciasController');
	Route::resource('Resultados', 'ResultadosController');
	Route::resource('Unidades', 'UnidadController');


	Route::get('usuarios/{id}/destroy', [
		'uses' => 'UsuariosController@destroy',
		'as' => 'admin.usuarios.destroy',
	]);

	Route::post('usuarios/storeAjx', [
			'uses' => 'UsuariosController@storeAjx',
			'as' => 'admin.usuarios.storeAjx'
	]);

	Route::get('roles/{id}/destroy',[
		'uses' => 'RolesController@destroy',
		'as' => 'admin.roles.destroy',
	]);

	Route::get('Instructores/{id}/destroy', [
		'uses' => 'InstructoresController@destroy',
		'as' => 'admin.Instructores.destroy',
	]);

	Route::get('Competencias/{id}/destroy', [
		'uses' => 'CompetenciasController@destroy',
		'as' => 'admin.Competencias.destroy',
	]);

	Route::get('Resultados/{id}/destroy', [
		'uses' => 'ResultadosController@destroy',
		'as' => 'admin.Resultados.destroy',
	]);

	Route::get('Unidades/{id}/destroy', [
		'uses' => 'UnidadController@destroy',
		'as' => 'admin.Unidades.destroy',
	]);

});
