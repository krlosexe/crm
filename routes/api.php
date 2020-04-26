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


Route::post('auth', 'Login@Auth');



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});




Route::post('verify-token', 'Login@VerifyToken');

Route::resource('user', 'UsuariosController');
Route::post('status-user/{id}/{status}', 'UsuariosController@statusUser');
Route::get('get-asesoras', 'UsuariosController@GetAsesoras');
Route::get('get-asesoras-business-line/{id}', 'UsuariosController@GetAsesorasByBusinessLine');


Route::post('get-asesoras-business-line', 'UsuariosController@GetAsesorasByBusinessLineArray');




Route::resource('modulos', 'ModulosController');
Route::post('status-modulo/{id}/{status}', 'ModulosController@status');


Route::resource('funciones', 'FuncionesController');
Route::post('status-funciones/{id}/{status}', 'FuncionesController@status');


Route::get('list-funciones', 'FuncionesController@listFunciones');

Route::get('verify-permiso', 'Login@VerifyPermiso');

Route::resource('roles', 'RolesController');
Route::post('status-rol/{id}/{status}', 'RolesController@status');


Route::resource('clients', 'ClientsController');
Route::post('client/tasks', 'ClientsController@Tasks');
Route::get('client/tasks', 'ClientsController@GetTasks');
Route::put('client/tasks/{id}', 'ClientsController@TasksUpdate');
Route::get('client/tasks/{id_client}', 'ClientsController@GetTasksByClient');
Route::get('client/task/status/{id}/{status}', 'ClientsController@TasksStatus');

Route::post('clients/forms', 'ClientsController@ClientForms');

Route::post('clients/forms/prp', 'ClientsController@ClientFormsPrp');

Route::post('clients/forms/prp/adviser', 'ClientsController@ClientFormsPrpAdviser');



Route::post('clients/forms/prp/adviser/luisa', 'ClientsController@ClientFormsPrpAdviserLuisa');


Route::get('clients/identification/{identification}', 'ClientsController@GetByIdentification');
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
Route::get('revision/appointment/client/{id_client}', 'RevisionAppointmentController@Clients');
Route::post('revision/appointment/status/{id}/{status}', 'RevisionAppointmentController@status');


Route::resource('valuations', 'ValuationsController');
Route::get('valuations/client/{id_client}', 'ValuationsController@Clients');
Route::post('valuations/status/{id}/{status}', 'ValuationsController@status');



Route::resource('preanesthesia', 'PreanesthesiaController');
Route::get('preanesthesia/client/{id_client}', 'PreanesthesiaController@Clients');
Route::post('preanesthesia/status/{id}/{status}', 'PreanesthesiaController@status');

Route::resource('surgeries', 'SurgeriesController');
Route::get('surgeries/client/{id_client}', 'SurgeriesController@Clients');
Route::get('surgeries/status/{id}/{status}', 'SurgeriesController@status');



Route::resource('tasks', 'TasksController');
Route::post('tasks/status/{id}/{status}', 'TasksController@status');


Route::get('calendar/tasks', 'CalendarController@getTask');
Route::get('calendar/tasks/clients', 'CalendarController@getTaskClients');
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



Route::get('email/forms', 'NotificationsController@Email');
Route::post('email/forms', 'NotificationsController@Email');

Route::get('clients/export/excel/{bunisses_line}/{adviser}/{origen}/{date_init}/{date_finish}/{state}/{search}', 'ClientsController@Excel');

Route::post('clients/import/', 'ClientsController@Import');

Route::get('validate/valoration/code/{code}', 'ValuationsController@ValidateCode');



Route::get('logs/sessions', 'LogsController@session');
Route::get('logs/events/adviser', 'LogsController@EventsAdvisers');

Route::post('form/credit', 'FormCreditController@store');


Route::post('form/authorization/studio/credit', 'FormCreditController@storeAutorization');


Route::post('valoration/submit/photo', 'ValuationsController@StorePhotos');
Route::get('clients/comments/{id_client}', 'ClientsController@GetComments');


Route::get('clients-list', 'ClientsController@List');


Route::post('clients/update/hc/{id_cliente}', 'ClientsController@UpdateHc');





Route::post('comment/task/client', 'ClientsController@AddCommentTask');


Route::get('tasks/comments/{id}', 'ClientsController@GetCommentsTasks');


Route::post('comments/{tabla}', 'CommentsController@store');
Route::get('comments/{tabla}/{id}', 'CommentsController@get');


Route::post('register/referred', 'ReferredController@store');


Route::post('authApp', 'Login@AuthApp');

Route::get('adviser/affiliate/{id_adviser}', 'AdviserController@GetAffiliates');
Route::get('prp/refferers/{id_user}/{display}', 'AdviserController@GetRefferers');
Route::get('prp/refferers/processes/{id_user}/{display}', 'AdviserController@GetProcesses');

Route::get('refferers/qty/{id_affiliate}', 'AffiliateController@qty');

Route::get('prp/dashboard/stats/{id_user}', 'AffiliateController@Dasboard');



Route::get('prp/sales/statistics/{id_user}', 'AffiliateController@StatisticsSales');


Route::get('test/notification', 'NotificationApp@index');


Route::post('forms/covid', 'CovidController@store');



