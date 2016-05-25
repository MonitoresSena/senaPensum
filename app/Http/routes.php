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
	Route::resource('company', 'CompaniesController');
	Route::resource('centers', 'CentersController');
	Route::resource('sectors', 'SectorsController');
	Route::resource('areas', 'AreasController');
	Route::resource('programs', 'ProgramsController');

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

	Route::get('usuarios/{id}/destroy', [
		'uses' => 'UsuariosController@destroy',
		'as' => 'admin.usuarios.destroy',
	]);

	Route::get('company/{id}/destroy', [
		'uses' => 'CompaniesController@destroy',
		'as' => 'admin.companies.destroy',
	]);

	Route::get('center/{id}/destroy', [
		'uses' => 'CentersController@destroy',
		'as' => 'admin.centers.destroy',
	]);

	Route::get('sector/{id}/destroy', [
		'uses' => 'SectorsController@destroy',
		'as' => 'admin.sector.destroy',
	]);

	Route::get('area/{id}/destroy', [
		'uses' => 'AreasController@destroy',
		'as' => 'admin.usuarios.destroy',
	]);
	Route::get('programs/{id}/destroy', [
		'uses' => 'ProgramsController@destroy',
		'as' => 'admin.programs.destroy',
	]);	
});
