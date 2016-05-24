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

});

Route::get("home", [
	'uses' => "HomeController@index",
	'as' => 'home',
]);

Route::get('login', [
	'uses' => 'HomeController@login',
	'as' => 'login'
]);

Route::post('login/entrar', [
	'uses' => 'HomeController@entrar',
	'as' => 'login'
]);

Route::get("salir", [
	'uses' => 'HomeController@salir',
	'as' => 'salir',
]);
