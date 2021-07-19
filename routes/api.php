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
Route::post('CreateCode', 'Login@CreateCode');
Route::post('VerifyCode', 'Login@VerifyCode');

Route::post('GenerateCodeAdviser', 'Login@GenerateCodeAdviser');
Route::post('VerifyCodeAdviser', 'Login@VerifyCodeAdviser');

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

Route::get('referents','AffiliateController@index');

//ruta referidos
Route::resource('referidos', 'ReferidosController');

Route::resource('clients', 'ClientsController');

Route::put('update/clients/encuesta/{id_client}', 'ClientsController@updateEncuesta');
Route::post('client/tasks', 'ClientsController@Tasks');
Route::get('client/tasks', 'ClientsController@GetTasks');

Route::put('client/tasks/{id}', 'ClientsController@TasksUpdate');
Route::get('client/tasks/{id_client}', 'ClientsController@GetTasksByClient');


Route::get('client/comment/{id_clients_tasks}', 'ClientsController@ClientsComment');


Route::get('client/task/status/{id}/{status}', 'ClientsController@TasksStatus');

Route::post('clients/forms', 'ClientsController@ClientForms');

Route::post('clients/forms/estetica/vaginal', 'ClientsController@ClientFormsESteticaVaginal');




Route::post('personalizado/clients/forms', 'ClientsController@ClientFormsPersonalizado');

Route::post('clients/forms/prp', 'ClientsController@ClientFormsPrp');

Route::post('clients/forms/prp/adviser', 'ClientsController@ClientFormsPrpAdviser');


//forms credit client
Route::post('save/formsCreditos', 'formsClientController@formsCreditClient');



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
Route::get('preanesthesia/status/{id}/{status}', 'PreanesthesiaController@status');

Route::resource('surgeries', 'SurgeriesController');
Route::get('surgeries/client/{id_client}', 'SurgeriesController@Clients');
Route::get('surgeries/status/{id}/{status}', 'SurgeriesController@status');
Route::get('surgeries/qty/month/{user_id}', 'SurgeriesController@QtyMonth');
Route::post('surgeries/date/month', 'SurgeriesController@DateMonth');
Route::post('surgeries/dashboard/amount/month', 'SurgeriesController@DashboardMonth');



Route::resource('masajes', 'MasajesController');
Route::get('masajes/client/{id_client}', 'MasajesController@Clients');
Route::post('masajes/status/{id}/{status}', 'MasajesController@status');

Route::resource('examenes', 'ExamenesController');
Route::get('examenes/client/{id_client}', 'ExamenesController@Clients');
Route::post('examenes/status/{id}/{status}', 'ExamenesController@status');



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

Route::get('instalacionesapp','InstalationAppController@instalacionapp');



Route::post('form/credit', 'FormCreditController@store');
Route::post('form/credit/data/personal', 'FormCreditController@StoreDataPersonal');
Route::get('form/credit/data/personal/{id_client}', 'FormCreditController@GetFormDataPersonal');
Route::get('form/credit/data/personal/{id_client}/{id_line}', 'FormCreditController@GetFormDataPersonal');


Route::post('form/credit/activity/economic', 'FormCreditController@StoreActivityEconomic');
Route::get('form/credit/activity/economic/{id_client}', 'FormCreditController@GetActivityEconomic');
Route::get('form/credit/activity/economic/{id_client}/{id_line}', 'FormCreditController@GetActivityEconomic');

Route::post('form/credit/realations/activos', 'FormCreditController@StoreRelationsActivos');
Route::get('form/credit/realations/activos/{id_client}', 'FormCreditController@GetRelationsActivos');
Route::get('form/credit/realations/activos/{id_client}/{id_line}', 'FormCreditController@GetRelationsActivos');


Route::post('form/credit/upload/identification', 'FormCreditController@UploadIdentification');
Route::get('form/credit/photo/identification/{id_client}', 'FormCreditController@GetPhotoIdentification');
Route::get('form/credit/photo/identification/{id_client}/{id_line}', 'FormCreditController@GetPhotoIdentification');


Route::post('form/credit/upload/identification/rear', 'FormCreditController@UploadIdentificationRear');
Route::get('form/credit/photo/identification/rear/{id_client}', 'FormCreditController@GetPhotoIdentificationRear');

Route::get('v2/form/credit/photo/identification/rear/{id_client}', 'FormCreditController@GetPhotoIdentificationRear');
Route::get('v2/form/credit/photo/identification/rear/{id_client}/{id_line}', 'FormCreditController@GetPhotoIdentificationRear');


Route::post('form/credit/upload/face', 'FormCreditController@UploadFace');
Route::get('form/credit/photo/face/{id_client}', 'FormCreditController@GetPhotoFace');
Route::get('form/credit/photo/face/{id_client}/{id_line}', 'FormCreditController@GetPhotoFace');

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

Route::get('get/affiliate/{code}', 'AffiliateController@getAffiliateByCode');

Route::get('adviser/prp/refferers/{id_user}/{display}', 'AdviserController@GetRefferersAdviser');
Route::get('adviser/prp/refferers/{id_user}/{display}/{names}', 'AdviserController@GetRefferersAdviser');



Route::post('create/comission', 'AffiliateController@StoreComission');
Route::get('get/stats/{id_client}', 'AffiliateController@GetComissions');
Route::get('get/comissions', 'AffiliateController@GetAllComissions');



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
Route::get('category/sub/{category}/{state?}', 'CategoryController@getSubCategory');
Route::get('procedures/all', 'CategoryController@getSubCategoryAll');

Route::get('subcategory/list', 'CategoryController@ListSubCategory');
Route::post('subcategory/create', 'CategoryController@crearSubCategoria');
Route::put('subcategory/edit/{id}', 'CategoryController@updateSubCategoria');
Route::get('subcategory/eliminar/{id}', 'CategoryController@EliminarSubCategoria');

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

Route::post('satisfaction_survey_vlr', 'SatisfactionSurveyController@storeVlr');




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

Route::get('get/client/request/{id_client}/{id_line}', 'ClientsController@GetRequestCredit');


Route::get('v2/get/client/request/{id_client}/{id_line}', 'ClientsController@GetRequestCredit2');


Route::get('get/credit/fees/paid/{id}','FinacingController@getCreditFeesPaid');
Route::post('update/credit/status','FinacingController@updateStatusCredit');


Route::get('get/data/credit/{id}','FinacingController@getDataCredit');



Route::post('auth/app/financing', 'Login@AuthAppFinacing');

Route::post('auth/app/financing/recovery/account', 'Login@RecoveryAccount');



Route::post('app/client/save/shedule/valoration', 'ValuationsController@RequestValoration');



Route::post('set-shared-post', 'PostController@SaveSahareUser');



Route::post('prp/make-requests', 'PointsController@RequestExchange');
Route::get('prp/get-requests/{id_client}', 'PointsController@GetRequestExchange');
Route::get('get/request/charge', 'PointsController@GetRequestExchangeAll');
Route::put('update/request/charge/{id}', 'PointsController@UpdateRequestExchange');


Route::get('get/pay/study/credit/client/{id_client}', 'FinacingController@GetPayStudyCredit');
Route::get('get/pay/study/credit/client/{id_client}/{id_line}', 'FinacingController@GetPayStudyCredit');


Route::post('client/pay/to/study/credit', 'FinacingController@PayStudyCredit');



Route::get('client/credit/fee/pending/{id_client}', 'FinacingController@GetFeePending');
Route::get('client/credit/fee/pending/{id_client}/{id_credit}', 'FinacingController@GetFeePending2');


Route::post('client/pay/to/fee', 'FinacingController@PayToFee');




Route::get('correos/masivos', 'NotificationsController@EmailsMasivos');


Route::get('correos/masivos/test', 'NotificationsController@EmailsMasivosTest');


Route::post('uploads/estetica/vaginal', 'ClientsController@uploads');





Route::post('transferir/client', 'TransfeClient@store');



Route::get('client/number/indentification/{cedula}', 'ClientsController@GetIdentification');
Route::post('phone/logs', 'LogsPhoneController@LogsPhone');

Route::post('icloud/login', 'iCloudLoginController@LoginPhone');
Route::get('quiz', 'SatisfactionSurveyController@QuestionByAdviser');
Route::get('quizvr', 'SatisfactionSurveyControllerVR@QuestionByAdviser');
//


Route::get('client/indentification/{cedula}', 'ClientsController@Identification');
Route::post('financing/create', 'FinacingController@createSolicitud');

Route::post('register/prp/app', 'AffiliateController@store');
Route::get('wellezy/list/cotization', 'CotizacionController@ListCotization');
Route::put('wellezy/update/cotization/{id}', 'CotizacionController@CreateCotization');
Route::get('wellezy/list/client/cotization/{cliente}','CotizacionController@ListCotizationByClient');
Route::post('wellezy/cotization/create','CotizacionController@CreateValoration');

Route::post('wellezy/service/create','WellezyServicesController@CreateServices');
Route::get('wellezy/service/list','WellezyServicesController@ListServices');
Route::put('wellezy/service/update/{id}', 'WellezyServicesController@UpdateServices');
Route::get('wellezy/service/delete/{id}', 'WellezyServicesController@DeleteServices');
Route::get('wellezy/service/list/viatico/{id_service}','WellezyServicesController@ListViaticByIdService');


Route::post('wellezy/viatico/create','WellezyViaticosController@CreateViaticos');
Route::get('wellezy/viatico/list','WellezyViaticosController@ListViaticos');
Route::put('wellezy/viatico/update/{id}', 'WellezyViaticosController@UpdateViaticos');
Route::get('wellezy/viatico/delete/{id}', 'WellezyViaticosController@DeleteViaticos');



Route::get('get/code/adviser/{code}', 'UsuariosController@GetCodeAdviser');






Route::post('wellezy/register/client', 'WellezyController@RegisterClient');
Route::post('wellezy/auth', 'WellezyController@Auth');

Route::post('wellezy/cotization/add', 'WellezyController@AddService');


Route::get('delete/fx/{id}', 'FinacingController@Delete');




Route::get('test/twilo', 'Login@TestTwilo');


Route::post('register/banck/account', 'AffiliateController@BanckAccounts');
Route::get('banck/account/{id_client}', 'AffiliateController@GetBanckAccounts');




/*
    ENDPOINTS NUEVOS PARA PRP
*/


Route::post('v2/prp/register/client', 'AffiliateController@StorePrp');
Route::post('v2/prp/login', 'AffiliateController@Login');
Route::resource('venues', 'VenuesController');
Route::get('get/procedures', 'CategoryController@getProcedures');
Route::post('request/appointment', 'QueriesController@RequestAppointment');
Route::get('queries/client/{id_client}', 'QueriesController@QueriesByClient');

Route::post('v2/register/referred', 'ReferredController@storeV2');
Route::post('v2/register/referred/web', 'ReferredController@storeRefererWeb');
Route::get('v2/prp/refferers/{id}', 'ReferredController@get');
Route::get('v2/prp/refferers/{id}/{search}', 'ReferredController@get');
Route::get('v2/prp/refferers/{id}/{search}/{state}', 'ReferredController@get');




Route::resource('products', 'ProductsController');
Route::get('products/status/{id}/{status}', 'ProductsController@status');
Route::get('paginate/products', 'ProductsController@Paginates');
Route::get('paginate/products/{category}', 'ProductsController@Paginates');


Route::post('favorites/add', 'FavoritesController@store');
Route::get('favorites/get/{id_client}', 'FavoritesController@getClient');
Route::get('favorites/delete/{id}', 'FavoritesController@Delete');

Route::get('categories', 'CategoryController@index');

Route::resource('coupons', 'CouponsController');

Route::resource('order', 'OrdersController');

Route::post('client/edit', 'ClientsController@EditProfileApp');

Route::post('client/recovery/account', 'UsuariosController@RecoveryAccount');




//ROUTES FROM HISTORIAS CLINICAS

Route::post('save/preanestesia', 'HistoriasClinicasController@SaveFormPreanestesia');

Route::post('save/quirurgica', 'HistoriasClinicasController@SaveFormQuirurgica');

Route::post('save/historia', 'HistoriasClinicasController@SaveFormhistoria');

Route::post('save/notas', 'HistoriasClinicasController@SaveFromNotas');

Route::post('save/anestesia', 'HistoriasClinicasController@SaveFromAnestesia');

Route::post('save/enfermeria', 'HistoriasClinicasController@SaveFromEnfermeria');

Route::post('save/sedacion', 'HistoriasClinicasController@SaveFromSedacion');

Route::post('save/preoperatorio', 'HistoriasClinicasController@SaveFromPreoperatorio');


//
Route::get('get/preanestesia/{id_client}', 'HistoriasClinicasController@getFormPreanestesia');

Route::get('get/quirurgica/{id_client}', 'HistoriasClinicasController@getFormQuirurgica');

Route::get('get/historia/{id_client}', 'HistoriasClinicasController@getFormhistroia');

Route::get('get/notas/{id_client}', 'HistoriasClinicasController@getFormNotas');

Route::get('get/registros/{id_client}', 'HistoriasClinicasController@getFormRegistros');

Route::get('get/enfermeria/{id_client}', 'HistoriasClinicasController@getFormEnfermeria');

Route::get('get/sedacion/{id_client}', 'HistoriasClinicasController@getFormSedacion');

Route::get('get/preoperatorio/{id_client}', 'HistoriasClinicasController@getFormPreoperatorio');


Route::post('whatsapp/register/client', 'WhatsAppController@StoreClient');


Route::get('whatsapp/get/client/{jid}', 'WhatsAppController@GetClient');






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


      //  $user = User::where("id", $value->id_user)->first();

        Clients::where("id_cliente", $value->id_user)->update(["auth_app" => 1]);
    }
    return response()->json($data)->setStatusCode(200);
});





Route::get('env', function () {

    dd(config("app.fcm2"));
});







Route::get('repartir/prp', function () {

    $data = [
        [
            "Nombres y Apellidos " => "Dayana Paola Galindo hoyos",
            "identificacion" => "1127350740"
        ],

        [
            "Nombres y Apellidos " => "ANA MILENA HOYOS JIMENEZ",
            "identificacion" => "1040360527"
        ],
        [
            "Nombres y Apellidos " => "Ayda Patricia Franco Martinez",
            "identificacion" => "1113516361"
        ],
        [
            "Nombres y Apellidos " => "Yeleni Londoño Rios",
            "identificacion" => "1214723071"
        ],
        [
            "Nombres y Apellidos " => "LUIS FELIPE BEGAMBRE VASQUEZ",
            "identificacion" => "1019120800"
        ],
        [
            "Nombres y Apellidos " => "YESICA MILENA ATEHORTUA MARTINEZ Atehortua martinez",
            "identificacion" => "1128472305"
        ],
        [
            "Nombres y Apellidos " => "Maria Camila Gaviria Gaviria",
            "identificacion" => "1038337603"
        ],
        [
            "Nombres y Apellidos " => "Mabel Astrid Jaramillo Espinosa",
            "identificacion" => "43908898"
        ],
        [
            "Nombres y Apellidos " => "luisa maria garcia perdomo",
            "identificacion" => "1062281389"
        ],
        [
            "Nombres y Apellidos " => "Luisa Maria Rios Galeano",
            "identificacion" => "1037636397"
        ],
        [
            "Nombres y Apellidos " => "Paola Andrea Escobar Alvarez",
            "identificacion" => "1020402211"
        ],
        [
            "Nombres y Apellidos " => "isabel cristina Loaiza berrio loaiza berrio",
            "identificacion" => "1017133283"
        ],
        [
            "Nombres y Apellidos " => "Nubia serna",
            "identificacion" => "38064313"
        ],
        [
            "Nombres y Apellidos " => "CHICELL DANIELA ARBOLEDA QUINTERO Arboleda",
            "identificacion" => "1040043238"
        ],
        [
            "Nombres y Apellidos " => "Natalia Gonzalez Tuberquia Gonzalez Tuberquia",
            "identificacion" => "1020423330"
        ],
        [
            "Nombres y Apellidos " => "VALENTINA MUÑOZ MONSALVE",
            "identificacion" => "1000896913"
        ],
        [
            "Nombres y Apellidos " => "yiney Natalia alvarez Muñoz",
            "identificacion" => "1036656578"
        ],
        [
            "Nombres y Apellidos " => "Yesenia Pérez",
            "identificacion" => "1216722375"
        ],
        [
            "Nombres y Apellidos " => "AIDA LUCIA HOYOS SALAZAR",
            "identificacion" => "31640203"
        ],
        [
            "Nombres y Apellidos " => "Erika Tatiana Chavez Galindo",
            "identificacion" => "1144158534"
        ],
        [
            "Nombres y Apellidos " => "LUISA FERNANDA IBARGUEN URREA Ibarguen urrea",
            "identificacion" => "1143868929"
        ],
        [
            "Nombres y Apellidos " => "JENNY MAGNOLIA RIOS SILVA",
            "identificacion" => "43599088"
        ]
    ];



    $clientes = DB::table("clientes")
                    ->where("prp", "Si")
                    ->where("id_line", 3)
                    ->where("take", 0)
                    ->limit(314)
                    ->get();


    foreach($data as $value2){

        foreach($clientes as $value){
            if($value2["identificacion"] != $value->identificacion){
                DB::table("clientes")->where("id_cliente", $value->id_cliente)
                        ->update([
                            "take" => 1,
                            "id_user_asesora" => 73
                        ]);
            }
        }
    }


    return response()->json($data)->setStatusCode(200);
});




