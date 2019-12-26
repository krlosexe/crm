<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});




Route::post('verify-token', 'Login@VerifyToken');

Route::resource('user', 'UsuariosController');
Route::post('status-user/{id}/{status}', 'UsuariosController@statusUser');
Route::get('get-asesoras', 'UsuariosController@GetAsesoras');

Route::resource('modulos', 'ModulosController');
Route::post('status-modulo/{id}/{status}', 'ModulosController@status');


Route::resource('funciones', 'FuncionesController');
Route::post('status-funciones/{id}/{status}', 'FuncionesController@status');


Route::get('list-funciones', 'FuncionesController@listFunciones');

Route::get('verify-permiso', 'Login@VerifyPermiso');

Route::resource('roles', 'RolesController');
Route::post('status-rol/{id}/{status}', 'RolesController@status');


Route::resource('clients', 'ClientsController');
Route::post('status-cliente/{id}/{status}', 'ClientsController@status');


Route::resource('city', 'CityController');
Route::post('status-city/{id}/{status}', 'CityController@status');

Route::resource('clinic', 'ClinicController');
Route::post('status-clinic/{id}/{status}', 'ClinicController@status');


Route::resource('line-business', 'LinesBusinessController');
Route::post('status-line/{id}/{status}', 'LinesBusinessController@status');


Route::resource('queries', 'QueriesController');
Route::post('status-queries/{id}/{status}', 'QueriesController@status');


Route::resource('revision/appointment', 'RevisionAppointmentController');
Route::post('revision/appointment/status/{id}/{status}', 'RevisionAppointmentController@status');

