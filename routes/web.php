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




Route::get('masajes', function () {
    return view('citas.masajes.gestion');
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


Route::get('masajes/client/{id_client}/{option}', function ($id_client, $option) {
    return view('catalogos.clientes.masajes.gestion', ["id_client" => $id_client,"option" => $option,]);
});



Route::get('surgeries/client/{id_client}/{option}', function ($id_client, $option) {
    return view('catalogos.clientes.surgeries.gestion', ["id_client" => $id_client,"option" => $option,]);
});


Route::get('revision-appointment/client/{id_client}/{option}', function ($id_client, $option) {
    return view('catalogos.clientes.revisiones.gestion', ["id_client" => $id_client,"option" => $option,]);
});


Route::get('tasks/migrate/clients', "TasksController@Migrate");

Route::get('client-import', function () {
    return view('catalogos.clientes.import');
});




Route::get('logs/session', "TasksController@Migrate");


Route::get('logs-asesoras', function () {
    return view('Reports.events_clients.gestion');
});



Route::get('Session', function () {
    return view('Reports.sessions.gestion');
});



Route::get('forms_credit/{id_line}', function ($id_line) {
    return view('forms.credit', ["id_line" => $id_line]);
});


Route::get('forms_autorizacion/{id_line}', function ($id_line) {
    return view('forms.autorizacion', ["id_line" => $id_line]);
});



Route::get('ReportEventAsesora', function () {
    return view('Reports.envents_advisers.gestion');
});



Route::get('prueba', function () {
    return view('forms.prueba');
});




Route::get('change_name', 'ClientsController@changeName');



Route::get('codes', 'ClientsController@GenerateCodes');


Route::get('form-prp/{id_line}', function ($id_line) {
    return view('forms.prp', ["id_line" => $id_line]);
});



Route::get('form-prp/{id_line}/{id_asesora}', function ($id_line, $id_asesora) {
    return view('forms.prpAsesora', ["id_line" => $id_line, "id_asesora" => $id_asesora]);
});


Route::get('form-prp-luisa/{id_line}/{id_asesora}', function ($id_line, $id_asesora) {
    return view('forms.prpLuisaP', ["id_line" => $id_line, "id_asesora" => $id_asesora]);
});



Route::get('affiliate/{code}', function ($code) {
    return view('affiliate.web', ["code" => $code]);
});

Route::get('clients/reffereds/{id_client}', function ($id_client) {
    return view('catalogos.clientes.reffereds.gestion', ["id_client" => $id_client]);
});


Route::get("create_user_prp", "ClientsController@CreateUserPrp");


Route::get('clients/view/{id}', function ($id) {
    return view('catalogos.clientes.show', ["id" => $id]);
});




Route::get('schedule', function () {
    return view('Reports.schedule.gestion');
});




Route::get('form-covid/{id_line}', function ($id_line) {

    if($id_line == 2){
        $name_line = strtoupper("Clínica Especialistas del Poblado");
    }

    if($id_line == 9){
        $name_line = strtoupper("Clínica Laser");
    }

    return view('forms.form-covid', ["id_line" => $id_line, "name_line" => $name_line]);
});



Route::get('form-bioseguridad/{id_line}', function ($id_line) {

    if($id_line == 2){
        $name_line = strtoupper("Clínica Especialistas del Poblado");
    }

    if($id_line == 9){
        $name_line = strtoupper("Clínica Laser");
    }

    if($id_line == 16){
        $name_line = strtoupper("Planmed");
    }



    return view('forms.form-bioseguridad', ["id_line" => $id_line, "name_line" => $name_line]);
});






Route::get('gallery', function () {
    return view('configuracion.gallery.gestion');
});



Route::get('gallety-cinic', function () {
    return view('configuracion.gallery.clinic.gestion');
});




Route::get('form_satisfaction_survey/intro/{id_client}', function ($id_client) {

    $client = DB::table("clientes")
                    ->select("clientes.*", "users.*", "datos_personales.*", "clientes.nombres as name_client", "clinic.nombre as name_clinic")
                    ->join("users", "users.id", "=", "clientes.id_user_asesora")
                    ->join("datos_personales", "datos_personales.id_usuario", "=", "users.id")
                    ->join("clinic", "clinic.id_clinic", "=", "clientes.clinic", 'left')
                    ->where("id_cliente", $id_client)->first();

    return view('satisfaction_survey.intro', ["data_client" => $client]);
});





Route::get('form_satisfaction_survey/{id_client}', function ($id_client) {

    $client = DB::table("clientes")
                    ->select("clientes.*", "users.*", "datos_personales.*", "clinic.nombre as name_clinic")
                    ->join("users", "users.id", "=", "clientes.id_user_asesora")
                    ->join("datos_personales", "datos_personales.id_usuario", "=", "users.id")
                    ->join("clinic", "clinic.id_clinic", "=", "clientes.clinic", 'left')
                    ->where("id_cliente", $id_client)->first();

  

    return view('satisfaction_survey.form', ["data_client" => $client]);
});





Route::get('califications', function () {
    return view('tasks.advisers.gestion');
});



Route::get('financing', function () {
    return view('financing.gestion');
});













