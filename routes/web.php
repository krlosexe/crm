<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::post('auth', 'Login@Auth');
Route::get('logout/{id}', 'Login@Logout');

Route::get('/dashboard', function () {
    return view('dashboard');
});


Route::get('/users', function () {
    return view('perfiles.Users.gestion');
});


Route::get('rol', function () {
    return view('perfiles.Roles.gestion');
});


Route::get('modules', function () {
    return view('perfiles.Modulos.gestion');
});


Route::get('funciones', function () {
    return view('perfiles.Funciones.gestion');
});


Route::get('clients', function () {
    return view('catalogos.clientes.gestion');
});


Route::get('clients/tasks/{id_client}/{option}', function ($id_client, $option) {
    return view('catalogos.clientes.tasks.gestion', ["id_client" => $id_client, "option" => $option]);
});



Route::get('citys', function () {
    return view('configuracion.citys.gestion');
});

Route::get('clinics', function () {
    return view('configuracion.clinics.gestion');
});




Route::get('queries', function () {
    return view('citas.queries.gestion');
});



Route::get('revision-appointment', function () {
    return view('citas.revision.gestion');
});


Route::get('business-lines', function () {
    return view('configuracion.lineas-negocio.gestion');
});


Route::get('valuations', function () {
    return view('citas.valuations.gestion');
});


Route::get('preanesthesia', function () {
    return view('citas.preanesthesia.gestion');
});



Route::get('surgeries', function () {
    return view('citas.surgeries.gestion');
});


Route::get('tasks', function () {
    return view('tasks.gestion');
});


Route::get('calendar', function () {
    return view('calendar.general.gestion');
});




Route::get('import', 'ImportController@clients');


Route::get('import_tasks', 'ImportController@ImportTasks');


Route::get('import/calendar', 'ImportController@Calendar');


Route::get('forms/{id_user}/{id_line}', function ($id_user, $id_line) {
    return view('forms.form', ["id_user" => $id_user, "id_line" => $id_line]);
});


Route::get('forms/cirufacil/{id_user}/{id_line}', function ($id_user, $id_line) {
    return view('forms_cirufacil.form', ["id_user" => $id_user, "id_line" => $id_line]);
});

Route::get('valuations/client/{id_client}/{option}', function ($id_client, $option) {
    return view('catalogos.clientes.valuations.gestion', ["id_client" => $id_client,"option" => $option,]);
});


Route::get('preanesthesia/client/{id_client}/{option}', function ($id_client, $option) {
    return view('catalogos.clientes.preanesthesia.gestion', ["id_client" => $id_client,"option" => $option,]);
});



Route::get('surgeries/client/{id_client}/{option}', function ($id_client, $option) {
    return view('catalogos.clientes.surgeries.gestion', ["id_client" => $id_client,"option" => $option,]);
});


Route::get('revision-appointment/client/{id_client}/{option}', function ($id_client, $option) {
    return view('catalogos.clientes.revisiones.gestion', ["id_client" => $id_client,"option" => $option,]);
});
