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
Route::post('GenerateCode', 'Login@GenerateCode');
Route::post('VerifyCode', 'Login@VerifyCode');


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

Route::post('clients/forms/estetica/vaginal', 'ClientsController@ClientFormsESteticaVaginal');




Route::post('personalizado/clients/forms', 'ClientsController@ClientFormsPersonalizado');

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

Route::get('valorations/qty/month/{user_id}', 'ValuationsController@QtyMonth');


Route::get('valorations/qty/list/month/{user_id}', 'ValuationsController@QtyMonthList');



Route::get('clients/history/clinic/{id_client}', 'ClientsController@getHc');




Route::resource('preanesthesia', 'PreanesthesiaController');
Route::get('preanesthesia/client/{id_client}', 'PreanesthesiaController@Clients');
Route::post('preanesthesia/status/{id}/{status}', 'PreanesthesiaController@status');

Route::resource('surgeries', 'SurgeriesController');
Route::get('surgeries/client/{id_client}', 'SurgeriesController@Clients');
Route::get('surgeries/status/{id}/{status}', 'SurgeriesController@status');
Route::get('surgeries/qty/month/{user_id}', 'SurgeriesController@QtyMonth');
Route::post('surgeries/date/month', 'SurgeriesController@DateMonth');
Route::post('surgeries/dashboard/amount/month', 'SurgeriesController@DashboardMonth');



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

Route::get('clients/export/excel/{bunisses_line}/{adviser}/{origen}/{date_init}/{date_finish}/{state}/{search}/{city}/{have_initial}/{to_prp}/{use_app}/{cumple}', 'ClientsController@Excel');

Route::post('clients/import/', 'ClientsController@Import');
Route::get('clients/refferes/code/{code}', 'ClientsController@getRefferesClient');


Route::get('validate/valoration/code/{code}', 'ValuationsController@ValidateCode');



Route::get('logs/sessions', 'LogsController@session');
Route::get('logs/events/adviser', 'LogsController@EventsAdvisers');
Route::get('logs/events/clients', 'LogsController@eventsClients');

Route::post('form/credit', 'FormCreditController@store');
Route::post('form/credit/data/personal', 'FormCreditController@StoreDataPersonal');
Route::get('form/credit/data/personal/{id_client}', 'FormCreditController@GetFormDataPersonal');

Route::post('form/credit/activity/economic', 'FormCreditController@StoreActivityEconomic');
Route::get('form/credit/activity/economic/{id_client}', 'FormCreditController@GetActivityEconomic');


Route::post('form/credit/realations/activos', 'FormCreditController@StoreRelationsActivos');
Route::get('form/credit/realations/activos/{id_client}', 'FormCreditController@GetRelationsActivos');



Route::post('form/credit/upload/identification', 'FormCreditController@UploadIdentification');
Route::get('form/credit/photo/identification/{id_client}', 'FormCreditController@GetPhotoIdentification');


Route::post('form/credit/upload/identification/rear', 'FormCreditController@UploadIdentificationRear');
Route::get('form/credit/photo/identification/rear/{id_client}', 'FormCreditController@GetPhotoIdentificationRear');





Route::post('form/credit/upload/face', 'FormCreditController@UploadFace');
Route::get('form/credit/photo/face/{id_client}', 'FormCreditController@GetPhotoFace');






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
Route::post('authAppLaserAdviser', 'Login@AuthAppLaserAdviser');

Route::post('authDoc', 'Login@AuthDoc');
Route::post('authValoration', 'Login@authValoration');

Route::get('adviser/affiliate/{id_adviser}', 'AdviserController@GetAffiliates');
Route::get('adviser/affiliate/{id_adviser}/{names}', 'AdviserController@GetAffiliates');
Route::get('prp/refferers/{id_user}/{display}', 'AdviserController@GetRefferers');
Route::get('prp/refferers/{id_user}/{display}/{names}', 'AdviserController@GetRefferers');
Route::get('prp/client/refferers/{id_client}', 'AdviserController@GetRefferersClient');


Route::get('prp/processes/{id_user}/{display}', 'AdviserController@GetProcesses');
Route::get('prp/processes/details/{id_client}/all', 'AdviserController@GetProcessesDetails');


Route::get('refferers/qty/{id_affiliate}', 'AffiliateController@qty');

Route::get('prp/dashboard/stats/{id_user}', 'AffiliateController@Dasboard');

Route::get('prp/sales/statistics/{id_user}', 'AffiliateController@StatisticsSales');
Route::get('prp/qty/month/{id_user}', 'AdviserController@QtyPrpMonth');


Route::get('test/notification', 'NotificationApp@index');

Route::post('forms/covid', 'CovidController@store');
Route::post('forms/bioseguridad', 'CovidController@Bioseguridad');

Route::post('generate/token/chat', 'UsuariosController@generateTokenChat');




Route::resource('category', 'CategoryController');
Route::get('category/sub/{category}', 'CategoryController@getSubCategory');
Route::get('procedures/all', 'CategoryController@getSubCategoryAll');

Route::resource('gallery/image', 'GalleryImageController');
Route::get('image/gallery', 'GalleryImageController@get');


Route::get('image/gallery', 'GalleryImageController@get');

Route::get('jobs/tasks/overdue', 'JobsController@TasksOverdue');
Route::get('jobs/tasks/overdue/cep', 'JobsController@TasksOverdueCep');


Route::get('jobs/valuations/overdue', 'JobsController@ValuationsOverdue');

Route::post('notification/post', 'NotificationsController@NotificationsPost');




Route::resource('gallery/clinic', 'GalleryClinicController');
Route::get('gallery/clinic/{client}/{limit}', 'GalleryClinicController@show');



Route::get('gallery/testimonials/{client}/{limit}', 'ClientsController@GetTestimonials');



Route::post('satisfaction_survey', 'SatisfactionSurveyController@store');


Route::get('schedule', 'CalendarController@GetSchedule');




Route::get('qty/califications/google/{user_id}', 'AdviserController@QtyCalificationsGoogle');

Route::get('survey/adviser/{user_id}', 'AdviserController@SurveyAdviser');



Route::get('clients/tasks/advisers/{id_client}', 'ClientsController@GetTasksAdvisers');





Route::resource('califications/advisers', 'CalificationsAdvisersController');



Route::get('report/general', 'AdviserController@ReportGeneral');





Route::post('clients/request/credit', 'ClientsController@RequestCredit');
Route::post('app/clients/request/credit', 'ClientsController@AppStoreRequestCredit');
Route::post('app/request/credit', 'ClientsController@AppRequestCredit');



Route::get('clients/request/financing', 'FinacingController@GetRequestFinancing');

Route::put('clients/request/financing/{id}', 'FinacingController@UpdateRequestFinancing');
Route::get('clients/request/financing/persons/data/{id}', 'FinacingController@GetPersondataFinancing');
Route::get('clients/request/financing/activity/economic/{id}', 'FinacingController@GetActivyEcominic');
Route::get('clients/request/financing/bienes/{id}', 'FinacingController@GetBienes');
Route::post('clients/request/financing/updated/status/', 'FinacingController@UpdateStatus');
Route::get('clients/request/financing/status/credit/{id}', 'FinacingController@StatusCredit');
Route::get('clients/request/financing/get/quotas/{id}', 'FinacingController@GetQuota');
Route::post('clients/request/financing/updated/status/quota', 'FinacingController@UpdateStatusQuota');

Route::get('clients/plan/payments/{id_client}', 'FinacingController@GetPlanPayments');






Route::get('get/client/request/{id_client}', 'ClientsController@GetRequestCredit');




Route::post('auth/app/financing', 'Login@AuthAppFinacing');

Route::post('auth/app/financing/recovery/account', 'Login@RecoveryAccount');



Route::post('app/client/save/shedule/valoration', 'ValuationsController@RequestValoration');



Route::post('set-shared-post', 'PostController@SaveSahareUser');



Route::post('prp/make-requests', 'PointsController@RequestExchange');

Route::get('get/pay/study/credit/client/{id_client}', 'FinacingController@GetPayStudyCredit');

Route::post('client/pay/to/study/credit', 'FinacingController@PayStudyCredit');



Route::get('client/credit/fee/pending/{id_client}', 'FinacingController@GetFeePending');


Route::post('client/pay/to/fee', 'FinacingController@PayToFee');




Route::get('correos/masivos', 'NotificationsController@EmailsMasivos');


Route::get('correos/masivos/test', 'NotificationsController@EmailsMasivosTest');


Route::post('uploads/estetica/vaginal', 'ClientsController@uploads');





Route::post('transferir/client', 'TransfeClient@store');



Route::get('client/number/indentification/{cedula}', 'ClientsController@GetIdentification');
Route::post('phone/logs', 'LogsPhoneController@LogsPhone');

Route::post('icloud/login', 'iCloudLoginController@LoginPhone');
Route::get('quiz', 'SatisfactionSurveyController@QuestionByAdviser');

Route::get('client/indentification/{cedula}', 'ClientsController@Identification');
Route::post('financing/create', 'FinacingController@createSolicitud');

Route::post('register/prp/app', 'AffiliateController@store');

Route::get('get/code/adviser/{code}', 'UsuariosController@GetCodeAdviser');






Route::post('wellezy/register/client', 'WellezyController@RegisterClient');
Route::post('wellezy/auth', 'WellezyController@Auth');






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

    foreach ($clients as $client) {

        if (!User::where("id_client", $client["id_cliente"])->first()) {

            if (!User::where("email", $client["email"])->first()) {

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



    foreach ($clients as $client) {

        if (!User::where("id_client", $client["id_cliente"])->first()) {


            if (!User::where("email", $client["email"])->first()) {

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
        ->whereNull('id_affiliate')
        ->get();


    foreach ($clients as $client) {
        //echo json_encode($client["origen"])."<br>";

        $affiliate = Clients::where("code_client", $client["origen"])->first();

        echo json_encode($affiliate["id_cliente"]) . "<br>";

        Clients::where("id_cliente", $client["id_cliente"])->update(["id_affiliate" => $affiliate["id_cliente"]]);
    }
    // return response()->json($clients)->setStatusCode(200);

});


Route::get('sync/reffered/affiliate/restore', function () {

    $clients = Clients::select("clientes.*")
        ->where("origen", "Referido PRP")
        ->get();

    foreach ($clients as $client) {
        $affiliate = Clients::where("id_cliente", $client["id_affiliate"])->first();
        Clients::where("id_cliente", $client["id_cliente"])->update(["origen" => $affiliate["code_client"]]);
        echo json_encode($affiliate["code_client"]) . "<br><br>";
    }
});

Route::get('code/phones', function () {

    $data = DB::table("clientes")->whereRaw('telefono not like "%+57%"')->limit(1000)->get();

    foreach ($data as $value) {
        Clients::where("id_cliente", $value->id_cliente)->update(["telefono" => "+57" . $value->telefono]);
    }
    return response()->json($data)->setStatusCode(200);
});

Route::get('sync/auth/app', function () {

    $data = DB::table("auth_users_app")->get();

    foreach ($data as $value) {


        $user = User::where("id", $value->id_user)->first();

        Clients::where("id_cliente", $user["id_client"])->update(["auth_app" => 1]);
    }
    return response()->json($data)->setStatusCode(200);
});
