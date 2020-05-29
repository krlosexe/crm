<?php

use Illuminate\Http\Request;

use App\User;
use App\Clients;
use App\datosPersonaesModel;

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

Route::get('clients/code/{code}', 'ClientsController@ShowByCode');



Route::resource('city', 'CityController');
Route::post('status-city/{id}/{status}', 'CityController@status');

Route::resource('clinic', 'ClinicController');
Route::post('status-clinic/{id}/{status}', 'ClinicController@status');


Route::resource('line-business', 'LinesBusinessController');
Route::get('lines/bussiness', 'LinesBusinessController@get');
Route::post('status-line/{id}/{status}', 'LinesBusinessController@status');


Route::resource('queries', 'QueriesController');
Route::post('status-queries/{id}/{status}', 'QueriesController@status');


Route::resource('revision/appointment', 'RevisionAppointmentController');
Route::get('revision/appointment/client/{id_client}', 'RevisionAppointmentController@Clients');
Route::post('revision/appointment/status/{id}/{status}', 'RevisionAppointmentController@status');


Route::resource('valuations', 'ValuationsController');
Route::get('valuations/client/{id_client}', 'ValuationsController@Clients');
Route::get('valuations/status/{id}/{status}', 'ValuationsController@status');
Route::get('valorations/today', 'ValuationsController@getToday');
Route::get('valorations/today/{user_id}', 'ValuationsController@getTodayClient');
Route::get('clients/history/clinic/{id_client}', 'ClientsController@getHc');

Route::resource('preanesthesia', 'PreanesthesiaController');
Route::get('preanesthesia/client/{id_client}', 'PreanesthesiaController@Clients');
Route::post('preanesthesia/status/{id}/{status}', 'PreanesthesiaController@status');

Route::resource('surgeries', 'SurgeriesController');
Route::get('surgeries/client/{id_client}', 'SurgeriesController@Clients');
Route::get('surgeries/status/{id}/{status}', 'SurgeriesController@status');



Route::resource('masajes', 'MasajesController');
Route::get('masajes/client/{id_client}', 'MasajesController@Clients');
Route::post('masajes/status/{id}/{status}', 'MasajesController@status');





Route::resource('tasks', 'TasksController');
Route::get('tasks/status/{id}/{status}', 'TasksController@status');


Route::get('calendar/tasks', 'CalendarController@getTask');
Route::get('calendar/tasks/clients', 'CalendarController@getTaskClients');
Route::get('calendar/queries', 'CalendarController@getQueries');
Route::get('calendar/valuations', 'CalendarController@getValuations');
Route::get('calendar/surgeries', 'CalendarController@Surgeries');
Route::get('calendar/revision', 'CalendarController@Revision');
Route::get('calendar/masajes', 'CalendarController@Masajes');



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

Route::get('clients/export/excel/{bunisses_line}/{adviser}/{origen}/{date_init}/{date_finish}/{state}/{search}/{city}', 'ClientsController@Excel');

Route::post('clients/import/', 'ClientsController@Import');

Route::get('validate/valoration/code/{code}', 'ValuationsController@ValidateCode');



Route::get('logs/sessions', 'LogsController@session');
Route::get('logs/events/adviser', 'LogsController@EventsAdvisers');
Route::get('logs/events/clients', 'LogsController@eventsClients');

Route::post('form/credit', 'FormCreditController@store');


Route::post('form/authorization/studio/credit', 'FormCreditController@storeAutorization');


Route::post('valoration/submit/photo', 'ValuationsController@StorePhotos');
Route::get('valorations/photos/{code}', 'ValuationsController@GetPhotos');
Route::get('clients/comments/{id_client}', 'ClientsController@GetComments');


Route::get('clients-list', 'ClientsController@List');


Route::post('clients/update/hc/{id_cliente}', 'ClientsController@UpdateHc');

Route::post('v2/clients/update/hc/{user_id}', 'ClientsController@UpdateHcByUserId');



Route::post('comment/task/client', 'ClientsController@AddCommentTask');


Route::get('tasks/comments/{id}', 'ClientsController@GetCommentsTasks');


Route::post('comments/{tabla}', 'CommentsController@store');
Route::get('comments/{tabla}/{id}', 'CommentsController@get');


Route::post('register/referred', 'ReferredController@store');


Route::post('authApp', 'Login@AuthApp');

Route::post('authDoc', 'Login@AuthDoc');
Route::post('authValoration', 'Login@authValoration');

Route::get('adviser/affiliate/{id_adviser}', 'AdviserController@GetAffiliates');
Route::get('prp/refferers/{id_user}/{display}', 'AdviserController@GetRefferers');
Route::get('prp/client/refferers/{id_client}', 'AdviserController@GetRefferersClient');


Route::get('prp/refferers/processes/{id_user}/{display}', 'AdviserController@GetProcesses');
Route::get('prp/refferers/processes/details/{id_client}/all', 'AdviserController@GetProcessesDetails');

Route::get('refferers/qty/{id_affiliate}', 'AffiliateController@qty');

Route::get('prp/dashboard/stats/{id_user}', 'AffiliateController@Dasboard');

Route::get('prp/sales/statistics/{id_user}', 'AffiliateController@StatisticsSales');

Route::get('test/notification', 'NotificationApp@index');

Route::post('forms/covid', 'CovidController@store');
Route::post('forms/bioseguridad', 'CovidController@Bioseguridad');

Route::post('generate/token/chat', 'UsuariosController@generateTokenChat');




Route::resource('category', 'CategoryController');
Route::get('category/sub/{category}', 'CategoryController@getSubCategory');

Route::resource('gallery/image', 'GalleryImageController');
Route::get('image/gallery', 'GalleryImageController@get');


Route::get('image/gallery', 'GalleryImageController@get');

Route::get('jobs/tasks/overdue', 'JobsController@TasksOverdue');
Route::get('jobs/valuations/overdue', 'JobsController@ValuationsOverdue');

Route::post('notification/post', 'NotificationsController@NotificationsPost');








Route::get('generate/token/chat', function () {
    
    $users = User::get();

    //UPDATE users SET sync_token = Right( MD5(created_at), 20 )

    return response()->json($users)->setStatusCode(200);

});


Route::get('generate/token/sync', function () {
    $users = User::get();
    return response()->json($users)->setStatusCode(200);
});



Route::get('create/users/affiliate', function () {
    
    $clients = Clients::where("prp", "Si")->get();

    foreach($clients as $client){

        if(!User::where("id_client", $client["id_cliente"])->first()){

            if(!User::where("email", $client["email"])->first()){
                
                $User =  User::create([
                    "email"       => $client["email"],
                    "password"    => md5("123456789"),
                    "id_rol"      => 17,
                    "id_client"   => $client["id_cliente"]
                ]);
            
            
                $datos_personales                   = new datosPersonaesModel;
                $datos_personales->nombres          = $client["nombres"];
                $datos_personales->apellido_p       = "";
                $datos_personales->apellido_m       = "afasfa";
                $datos_personales->n_cedula         = "12412124";
                $datos_personales->fecha_nacimiento = null;
                $datos_personales->telefono         = null;
                $datos_personales->direccion        = null;
                $datos_personales->id_usuario       = $User->id;
                $datos_personales->save();
            }

        }

    }
    


    return response()->json($clients)->setStatusCode(200);

});







Route::get('create/users/reffers', function () {
    
    $clients = Clients::select("clientes.*", "users.id")
                        // ->where("prp", "=", "No") 
                        ->join("users", "users.id_client", "=", "clientes.id_cliente", "left")
                        ->whereNull("clientes.prp")
                        ->whereNotNull("clientes.email")
                        ->whereNull("users.id")
                        ->where("clientes.email", "!=", "")

                        ->where("clientes.id_cliente", ">", 49571)
                        ->limit(1000)
                        ->get();
    
    
    
    foreach($clients as $client){

        if(!User::where("id_client", $client["id_cliente"])->first()){


            if(!User::where("email", $client["email"])->first()){
                
                $User =  User::create([
                    "email"       => $client["email"],
                    "password"    => md5("123456789"),
                    "id_rol"      => 19,
                    "id_client"   => $client["id_cliente"]
                ]);
            
            
                $datos_personales                   = new datosPersonaesModel;
                $datos_personales->nombres          = $client["nombres"];
                $datos_personales->apellido_p       = "";
                $datos_personales->apellido_m       = "afasfa";
                $datos_personales->n_cedula         = "12412124";
                $datos_personales->fecha_nacimiento = null;
                $datos_personales->telefono         = null;
                $datos_personales->direccion        = null;
                $datos_personales->id_usuario       = $User->id;
                $datos_personales->save();

            }


        }

    }
    
    return response()->json($clients)->setStatusCode(200);

    

});






Route::get('sync/reffered/affiliate', function () {
    
    $clients = Clients::select("clientes.*")
                        ->where("origen", "!=", "Chat")
                        ->where("origen", "!=", "face")
                        ->where("origen", "!=", "cep")
                        ->whereRaw("length(origen) = 4")
                        ->get();
    
    
    foreach($clients as $client){
       //echo json_encode($client["origen"])."<br>";

        $affiliate = Clients::where("code_client", $client["origen"])->first();

        echo json_encode($affiliate["id_cliente"])."<br>";

        //Clients::where("id_cliente", $client["id_cliente"])->update(["id_affiliate" => $affiliate["id_cliente"], "origen" => "Referido PRP"]);
        Clients::where("id_cliente", $client["id_cliente"])->update(["id_affiliate" => $affiliate["id_cliente"]]);
    }                        
  // return response()->json($clients)->setStatusCode(200);

});





Route::get('restart/data/client', function () {
    
    $clients = DB::table("clientes_temp")->selectRaw("id_cliente, origen")->where("origen", "!=", "Chat")
                        ->where("origen", "!=", "face")
                        ->where("origen", "!=", "cep")
                        ->whereRaw("length(origen) = 4")
                        ->get();
    
    foreach($clients as $client){


        Clients::where("id_cliente", $client->id_cliente)->update(["origen" => $client->origen]);
    }
    
    
    return response()->json($clients)->setStatusCode(200);

});


