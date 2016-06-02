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

// Route::get('/', function () {
//     // return view('welcome');
// });

Route::get('/', 'HomeController@login');




Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'JPermisos', 'MidMenu']], function(){
	# ruta de roles
	Route::resource('roles', 'RolesController');
	Route::resource('usuarios', 'UsuariosController');

	Route::resource('rutas', 'RutasController');

	Route::resource('Instructores', 'InstructoresController');
	Route::resource('Competencias', 'CompetenciasController');
	Route::resource('Resultados', 'ResultadosController');
	Route::resource('Unidades', 'UnidadController');
	Route::resource('Criterios', 'CriteriosController');
	Route::resource('Procesos', 'ProcesosController');
	Route::resource('Conocimientos', 'ConocimientosController');

	Route::resource('companies', 'CompaniesController');
	Route::resource('centers', 'CentersController');
	Route::resource('sectors', 'SectorsController');
	Route::resource('areas', 'AreasController');
	Route::resource('programs', 'ProgramsController');

//	Route::resource('company', 'CompaniesController');
//	Route::resource('centers', 'CentersController');
//	Route::resource('sectors', 'SectorsController');
//	Route::resource('areas', 'AreasController');
//	Route::resource('programs', 'ProgramsController');
        
        Route::get('unidades/{id}/documentos/listar', [
            'uses' => 'UnidadController@listarDocumentos',
            'as' => 'admin.unidad.documentos.listar',
        ]);
        
        Route::get('Unidades/{id}/documento/proponer', [
            'uses' => 'UnidadController@proponerDocumento',
            'as' => 'admin.unidad.documentos.proponer',
        ]);
        
        Route::post('unidad/{id}/documentos/guardarPropuesta', [
            'uses' => 'UnidadController@guardarPropuesta',
            'as' => 'unidad.documentos.proponer.guardar',
        ]);
        
        Route::get('unidad/{uni}/{id}/documentos/aprobar', [
            'uses' => 'UnidadController@aprobar',
            'as' => 'admin.unidades.documentos.aprobar',
        ]);


	Route::get('usuarios/{id}/destroy', [
		'uses' => 'UsuariosController@destroy',
		'as' => 'admin.usuarios.destroy',
	]);


	Route::get('roles/{id}/destroy',[
		'uses' => 'RolesController@destroy',
		'as' => 'admin.roles.destroy',
	]);


	Route::get('rutas/{id}/destroy',[
		'uses' => 'RutasController@destroy',
		'as' => 'admin.rutas.destroy',
	]);
	Route::get('permisos/gestionar', [
		'uses' => 'PermisosController@index',
		'as' => 'admin.permisos.gestionar',
	]);
	Route::get('permisos/gestionar', [
		'uses' => 'PermisosController@index',
		'as' => 'admin.permisos.gestionar',
	]);
	Route::post('permisos/permisosAjx', [
		'uses' => 'PermisosController@ajx',
		'as' => 'admin.permisos.permisosAjx',
	]);	
	Route::post('usuarios/storeAjx', [
		'uses' => 'UsuariosController@storeAjx',
		'as' => 'admin.usuarios.storeAjx'
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

	Route::get('Criterios/{id}/destroy', [
		'uses' => 'CriteriosController@destroy',
		'as' => 'admin.Criterios.destroy',
	]);

	Route::get('Procesos/{id}/destroy', [
		'uses' => 'ProcesosController@destroy',
		'as' => 'admin.Procesos.destroy',
	]);

	Route::get('Conocimientos/{id}/destroy', [
		'uses' => 'ConocimientosController@destroy',
		'as' => 'admin.Conocimientos.destroy',
	]);

	Route::get('usuarios/{id}/destroy', [
		'uses' => 'UsuariosController@destroy',
		'as' => 'admin.usuarios.destroy',
	]);

	Route::get('companies/{id}/destroy', [
		'uses' => 'CompaniesController@destroy',
		'as' => 'admin.companies.destroy',
	]);
	Route::get('centers/{id}/destroy', [
		'uses' => 'CentersController@destroy',
		'as' => 'admin.centers.destroy',
	]);
	Route::get('sectors/{id}/destroy', [
		'uses' => 'SectorsController@destroy',
		'as' => 'admin.sectors.destroy',
	]);

	/*Route::get('areas/{id}/destroy', [
		'uses' => 'AreasController@destroy',
		'as' => 'admin.areas.destroy',
	]);*/
	Route::get('programs/{id}/destroy', [
		'uses' => 'ProgramsController@destroy',
		'as' => 'admin.programs.destroy',
	]);
        
        Route::get('/', [
            'uses' => 'AdministracionController@index',
            'as' => 'admin',
        ]);        
});

//Route::get('admin', [
//    'uses' => 'AdministracionController@index',
//    'as' => 'admin',
//]);

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
