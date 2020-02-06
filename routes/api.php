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
Route::get('get-asesoras-business-line/{id}', 'UsuariosController@GetAsesorasByBusinessLine');


Route::resource('modulos', 'ModulosController');
Route::post('status-modulo/{id}/{status}', 'ModulosController@status');


Route::resource('funciones', 'FuncionesController');
Route::post('status-funciones/{id}/{status}', 'FuncionesController@status');


Route::get('list-funciones', 'FuncionesController@listFunciones');

Route::get('verify-permiso', 'Login@VerifyPermiso');

Route::resource('roles', 'RolesController');
Route::post('status-rol/{id}/{status}', 'RolesController@status');


Route::resource('clients', 'ClientsController');
Route::get('status-cliente/{id}/{status}', 'ClientsController@status');


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


Route::resource('valuations', 'ValuationsController');
Route::get('valuations/client/{id_client}', 'ValuationsController@Clients');
Route::post('valuations/status/{id}/{status}', 'ValuationsController@status');



Route::resource('preanesthesia', 'PreanesthesiaController');
Route::get('preanesthesia/client/{id_client}', 'PreanesthesiaController@Clients');
Route::post('preanesthesia/status/{id}/{status}', 'PreanesthesiaController@status');

Route::resource('surgeries', 'SurgeriesController');
Route::get('surgeries/client/{id_client}', 'SurgeriesController@Clients');
Route::post('surgeries/status/{id}/{status}', 'SurgeriesController@status');



Route::resource('tasks', 'TasksController');
Route::post('tasks/status/{id}/{status}', 'TasksController@status');


Route::get('calendar/tasks', 'CalendarController@getTask');
Route::get('calendar/queries', 'CalendarController@getQueries');
Route::get('calendar/valuations', 'CalendarController@getValuations');
Route::get('calendar/surgeries', 'CalendarController@Surgeries');
Route::get('calendar/revision', 'CalendarController@Revision');

Route::get('calendar/preanesthesia', 'CalendarController@Preanesthesia');


Route::post('tasks/today', 'CalendarController@Today');



Route::get('notifications/tasks', 'NotificationsController@Tasks');
Route::get('notifications/queries', 'NotificationsController@Queries');
Route::get('notifications/valuations', 'NotificationsController@Valuations');
Route::get('notifications/preanestesia', 'NotificationsController@PreAnestisia');
Route::get('notifications/surgeries', 'NotificationsController@Surgeries');
Route::get('notifications/revision', 'NotificationsController@Revision');

Route::get('notifications/get', 'NotificationsController@Get');
Route::post('notifications/read', 'NotificationsController@Read');
Route::get('notifications/generate', 'NotificationsController@Generate');