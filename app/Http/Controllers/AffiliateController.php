<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClientInformationAditionalSurgery;
use App\ClientClinicHistory;
use App\Notification;
use App\AuthUsersApp;
use App\ClientCreditInformation;
use App\Auditoria;
use App\Comments;
use App\Clients;
use App\User;
use DB;
use Mail;

use App\BanckAccounts;
class AffiliateController extends Controller
{


    public function getAffiliateByCode($code){

        $data = DB::table("clientes")->where("code_client", $code)->first();

        if($data){
            return response()->json($data)->setStatusCode(200);
        }else{
            return response()->json("El codigo no existe")->setStatusCode(400);
        }

    }


    public function index(Request $request)
    {
        $rol     = $request["rol"];
        $id_user = $request["id_user"];


        if ($this->VerifyLogin($request["id_user"],$request["token"])){

            $business_line = 0;
            if(isset($request["business_line"])){
                $business_line = $request["business_line"];
            }

            $adviser = 0;
            if(isset($request["adviser"])){
              $adviser = $request["adviser"];
            }

            $search = 0;
            if(isset($request["search"]) && $request["search"] != ""){
                $search = $request["search"];
            }

            $date_init = 0;
            if(isset($request["date_init"]) && $request["date_init"] != ""){
              $date_init = $request["date_init"];
            }

            $date_finish = 0;
            if(isset($request["date_finish"]) && $request["date_finish"] != ""){
              $date_finish = $request["date_finish"];
            }

            $city = 0;
            if(isset($request["city"])){
                $city = $request["city"];
            }

            $have_inital = 0;
            if(isset($request["have_inital"])){
                $have_inital = $request["have_inital"];
            }

            $to_prp = 0;
            if(isset($request["to_prp"])){
                $to_prp = $request["to_prp"];
            }

            
           
                $referidos_usu = DB::table("users")->where("id", $request["id_user"])->first();
                $id_referido = $referidos_usu->id_client;    
                $rol_refe    = $referidos_usu->id_rol;
            

            $procedure = 0;
            if(isset($request["procedure"])){
                $procedure = $request["procedure"];
            }

            $use_app = 0;
            if(isset($request["use_app"])){
                $use_app = $request["use_app"];
            }

            $cumple = 0;
            if(isset($request["cumple"])){
                $cumple = $request["cumple"];
            }

            $state  = $request["state"];
            $origen = $request["origen"];

            ini_set('memory_limit', '-1');


            
    $data = Clients::select("clientes.*", "cl2.nombres as name_affiliate", "client_information_aditional_surgery.*" , "client_clinic_history.*",
                            "clientc_credit_information.*", "auditoria.*", "user_registro.email as email_regis", "datos_personales.nombres as name_register",
                            "datos_personales.apellido_p as apellido_register", "lines_business.nombre_line","dp2.nombres as name_update",
                            "dp2.apellido_p as apellido_update","citys.nombre as name_city"
                         )

                        ->join("auditoria", "auditoria.cod_reg", "=", "clientes.id_cliente")
                        ->join("client_information_aditional_surgery", "client_information_aditional_surgery.id_client", "=", "clientes.id_cliente")
                        ->join("lines_business", "lines_business.id_line", "=", "clientes.id_line", "left")

                        ->join("client_clinic_history", "client_clinic_history.id_client", "=", "clientes.id_cliente")
                        ->join("clientc_credit_information", "clientc_credit_information.id_client", "=", "clientes.id_cliente")
                        ->join("users", "users.id_client", "=", "clientes.id_cliente", "left")
//->join("clients_procedures", "clients_procedures.id_client", "=", "clientes.id_cliente", "left")

                        ->join("valuations", "valuations.id_cliente", "=", "clientes.id_cliente", "left")
                        ->join('datos_personales', 'datos_personales.id_usuario', '=', 'clientes.id_user_asesora')

                        ->join('datos_personales as dp2', 'dp2.id_usuario', '=', 'auditoria.usr_update', "left")
                        ->join('citys', 'citys.id_city', '=', 'clientes.city', "left")
                        ->join("clientes as cl2", "cl2.id_cliente", "=", "clientes.id_affiliate", "left")

                        ->withCount('CountSactficationSuvarvy')
                        ->withCount('CountSactficationSuvarvyVlr')
                        
                        ->where(function ($query) use ($procedure) {
                                if($procedure != 0){
// $query->join("clients_procedures", "clients_procedures.id_client", "=", "clientes.id_cliente", "left");
//$query->where("clients_procedures.id_sub_category", $procedure);
                                }
                            })

                        ->where(function ($query) use ($cumple) {
                                if($cumple != 0){
                                $query->whereRaw("MONTH(clientes.fecha_nacimiento) = $cumple");
                                }
                            })

                        ->where(function ($query) use ($search) {
                                if($search != "0"){
                                $query->where("clientes.nombres", 'like', '%'.$search.'%');
                                $query->orWhere("clientes.identificacion", 'like', '%'.$search.'%');
                                $query->orWhere("clientes.telefono", 'like', '%'.$search.'%');
                                $query->orWhere("clientes.code_client", 'like', '%'.$search.'%');
                                $query->orWhere("clientes.origen", 'like', '%'.$search.'%');
                                $query->orWhere("clientes.email", 'like', '%'.$search.'%');
                                }
                            })

                        ->where(function ($query) use ($state) {
                                if($state != "0"){
                                $query->where("clientes.state", $state);
                                }
                            })

                        ->where(function ($query) use ($city) {
                                if($city != 0){
                                $query->where("clientes.city", $city);
                                }
                            })

                        ->where(function ($query) use ($rol_refe,$id_referido) {
                                if($rol_refe =="22"){
                                $query->where("clientes.id_affiliate", $id_referido);
                                }
                            })

                        ->where(function ($query) use ($have_inital) {
                                if($have_inital == 1){
                                $query->whereNotNull("clientc_credit_information.have_initial");
                                $query->whereRaw('clientc_credit_information.have_initial LIKE "%si%"');
                                }
                            })

                        ->where(function ($query) use ($to_prp) {
                                if($to_prp == 1){
                                $query->where("clientes.prp", "Si");
                                }
                            })

                        ->where(function ($query) use ($use_app) {
                                if($use_app == 1){
                                $query->where("clientes.auth_app", 1);
                                }
                            })

                        ->where(function ($query) use ($business_line) {
                                if($business_line != 0){
                                $query->whereIn("clientes.id_line", $business_line);
                                }
                            })

                        ->where(function ($query) use ($adviser) {
                                if($adviser != 0){
// $query->join("valuations", "valuations.id_cliente", "=", "clientes.id_cliente", "left");
                                $query->whereIn("clientes.id_user_asesora", $adviser);
                                $query->Orwhere("valuations.id_asesora_valoracion", $adviser);
                                    }
                            })

                        ->where(function ($query) use ($origen) {
                                if($origen == "Formulario"){
                                $query->where("clientes.origen", "Formulario Web");
                                }

                                if($origen == "Otros"){
                                $query->where("clientes.to_db", 0);
                                $query->where("clientes.pauta", 0);
                                $query->where("clientes.origen", "!=","Formulario Web");
                                $query->OrwhereNull('clientes.origen');
                                }
                            })

                        ->where(function ($query) use ($date_init, $to_prp) {
                                if($date_init != 0 && $to_prp == 0){
                                $query->where("auditoria.fec_update", ">=", $date_init." 00:00:00");
                                }

                                if($date_init != 0 && $to_prp == 1){
                                $query->where("clientes.created_prp", ">=", $date_init);
                                }
                            })

                        ->where(function ($query) use ($date_finish, $to_prp) {
                                if($date_finish != 0 && $to_prp == 0){
                                $query->where("auditoria.fec_update", "<=", $date_finish." 23:59:59");
                                }

                                if($date_finish != 0 && $to_prp == 1){
                                $query->where("clientes.created_prp", "<=", $date_finish);
                                }
                            })


                        ->with("logs")
                        ->with("phones")
                        ->with("emails")
                        ->with("procedures")

                        ->where("auditoria.tabla", "clientes")
                        ->join("users as user_registro", "user_registro.id", "=", "auditoria.usr_regins")

                        ->where("auditoria.status", "!=", "0")


// ->orderBy("clientes.id_cliente", "DESC")
// ->orderBy("auditoria.fec_regins", "DESC")
                        ->orderBy("auditoria.fec_update", "DESC")

                        ->paginate(10);



$data->map(function($item) {
    $item->surgeries = DB::table("clients_procedures")
                        ->select("sub_category.name")
                        ->join("sub_category", "sub_category.id", "=", "clients_procedures.id_sub_category")
                        ->where("id_client", $item->id_cliente)->get();


    $item->date_surgerie = DB::table("surgeries")
                            ->select("fecha")
                            ->where("id_cliente", $item->id_cliente)
                            ->orderBy("surgeries.id_surgeries", "DESC")
                            ->first();


    $item->date_valoration = DB::table("valuations")
                            ->select("fecha")
                            ->where("id_cliente", $item->id_cliente)
                            ->orderBy("valuations.id_valuations", "DESC")
                            ->first();
    return $item;
});




return response()->json($data)->setStatusCode(200);
}else{
return response()->json("No esta autorizado")->setStatusCode(400);
}
}

    public function StorePrp(Request $request){


        $refered = false;
        $client = Clients::where("identificacion",  $request["identificacion"])->first();

        if($client){
            return response()->json("Ya te encuentras registrado en nuetra base de datos")->setStatusCode(400);
        }else{

            if($request["promotion_code"] != null){



                $user = DB::table("users")
                        ->join("users_line_business", "users_line_business.id_user", "=", "users.id")
                        ->where("code_user", $request["promotion_code"])
                        ->where("code_user", "!=",0)
                        ->first();



                if($user){
                    $request["id_user_asesora"] = $user->id;
                    $request["id_line"] = $user->id_line;
                }else{
                    $client = DB::table("clientes")->where("code_client", $request["promotion_code"])->first();


                    if($client){
                        $request["id_user_asesora"] = $client->id_user_asesora;
                        $request["id_affiliate"]    = $client->id_cliente;
                        $request["id_line"]         = $client->id_line;




                        $refered =  true;
                    }else{
                        return response()->json("El código de promocion es invalido")->setStatusCode(400);
                    }
                }
            }else{
                $user = User::join("users_line_business", "users_line_business.id_user", "=", "users.id")
                                ->where("users_line_business.id_line", $request["id_line"])
                                ->inRandomOrder()
                                ->first();

                $request["id_user_asesora"] = $user->id;
            }

            $permitted_chars        = '0123456789abcdefghijklmnopqrstuvwxyz';
            $code                   = substr(str_shuffle($permitted_chars), 0, 4);
            $request["code_client"] = strtoupper($code);

            $request["password"]    = md5($request["password"]);
            $request["origen"]      = "PRP Asesora";
            $request["prp"]         = "Si";
            $request["to_db"]       = "1";
            $request["created_prp"] = date("Y-m-d");
            $request["auth_app"]    = "1";




            $cliente = Clients::create($request->all());
            $request["id_client"] = $cliente["id_cliente"];

            ClientInformationAditionalSurgery::create($request->all());
            ClientClinicHistory::create($request->all());
            ClientCreditInformation::create($request->all());


            $auditoria              = new Auditoria;
            $auditoria->tabla       = "clientes";
            $auditoria->cod_reg     = $cliente["id_cliente"];
            $auditoria->status      = 1;
            $auditoria->fec_regins  = date("Y-m-d H:i:s");
            $auditoria->fec_update  = date("Y-m-d H:i:s");
            $auditoria->usr_regins  = $request["id_user_asesora"];
            $auditoria->save();



            $token_user  = AuthUsersApp::where("id_user", $cliente["id_cliente"])->get();

            foreach ($token_user as $key => $value) {
                $value->delete();
            }


            $token = bin2hex(random_bytes(64));

            $AuthUsers                       = new AuthUsersApp;
            $AuthUsers->id_user              = $cliente["id_cliente"];
            $AuthUsers->token                = $token;
            $AuthUsers->token_notifications  = $request["fcmToken"];
            $AuthUsers->save();






            if ($cliente) {
                $user_receive = User::where("id", $request["id_user_asesora"])->inRandomOrder()->first();

                $data["msg"]     = "Ingreso de Px por Aplicacion, Nombre: ".$request["nombres"]." Cedula: ".$request["identificacion"];
                $data["subject"] = "Ingreso de Px por Aplicacion, Nombre: ".$request["nombres"];
                $data["for"]     = $user_receive->email;
                $this->SendEmail($data);

                if($refered){

                    $token_fcm = config("app.fcm2");

                    if($request["id_line"] == 17){
                        $token_fcm = "AAAAg-p1HsU:APA91bHJHYE__7tBgvxXHPbMwR2cm7-KyYOknyMz7fAfBYm34YrFMF9QK4FieAEPL54o7EPXilihGevzxoBSf3X4CCHAswTk9NctvFTYY1ftYTYI5hj_-qXVFtCizHHzM060Ojphq62q";
                    }
                    if($request["id_line"] == 3){
                        $token_fcm = "AAAADwEmOL8:APA91bGN_99QtWkpjpvLTjByVISmGtM7qZSgvZNixW1o7d1udxNp_hHI8n6Tn-ukuGgmnLAIABuWYo-Kdea253E-jE1tCVBLQmRikVBbdxy2Th-j64BAr80U9FeCpr3gGmPW66W58ZYF";
                    }
                    if($request["id_line"] == 16){
                        $token_fcm = "AAAA5qKc4M8:APA91bG3q9BAo323Bje7_eIs8sGa-G37pRr67n4IgYK8xnoYHsSOx397JPecFVVaWCHfHjcqiaTFOjaZPbEtzXbzakZ2kwWqP_2x9RT3_Z883-lKpbRRgALZSq5MXK51Cb-W6Db5xAQu";
                    }


                    if($request["id_line"] == 2){
                        $token_fcm = "AAAAJdN9JHM:APA91bEXsAKoXgwiQEDZUeqyxlLnEjyxvIP7rKKOQVV7s0bu5IfzZmPJ6E-iCCjtjUuRa70Xb_IXE8yPBU0crw4U_fPMfLIiP6l-sSohylin9-Jspst0qqBwe6jqP4qQsXkFsU__W5wx";
                    }
                    if($request["id_line"] == 18){
                        $token_fcm = "AAAAJdN9JHM:APA91bEXsAKoXgwiQEDZUeqyxlLnEjyxvIP7rKKOQVV7s0bu5IfzZmPJ6E-iCCjtjUuRa70Xb_IXE8yPBU0crw4U_fPMfLIiP6l-sSohylin9-Jspst0qqBwe6jqP4qQsXkFsU__W5wx";
                    }
                    if($request["id_line"] == 22){
                        $token_fcm = "AAAAJdN9JHM:APA91bEXsAKoXgwiQEDZUeqyxlLnEjyxvIP7rKKOQVV7s0bu5IfzZmPJ6E-iCCjtjUuRa70Xb_IXE8yPBU0crw4U_fPMfLIiP6l-sSohylin9-Jspst0qqBwe6jqP4qQsXkFsU__W5wx";
                    }


                    $url = "https://fcm.googleapis.com/fcm/send";
                    $token = $client->fcmToken;
                    $serverKey = $token_fcm;
                    $title = "Se ha registrado un nuevo referido";
                    $body = "Nombre: ".$request["nombres"]. " Cedula: ".$request["identificacion"];
                    $notification = array('title' => $title, 'body' => $body, 'sound' => 'default', 'badge' => '1');
                    $arrayToSend = array('to' => $token, 'notification' => $notification, 'priority' => 'high');
                    $json = json_encode($arrayToSend);
                    $headers = array();
                    $headers[] = 'Content-Type: application/json';
                    $headers[] = 'Authorization: key=' . $serverKey;
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                    //Send the request
                    $response = curl_exec($ch);

                    curl_close($ch);



                    $data["msg"]     = "Ingreso de Referido, Nombre: ".$request["nombres"]." Cedula: ".$request["identificacion"];
                    $data["subject"] = "Ingreso de Referido, Nombre: ".$request["nombres"];
                    $data["for"]     = $client->email;
                    $this->SendEmail($data);
                }
                return response()->json($cliente)->setStatusCode(200);
            }else{
                return response()->json("A ocurrido un error")->setStatusCode(400);
            }




        }

        return response()->json($request->all())->setStatusCode(200);

    }




    public function Login(Request $request){

        if($request["email"] == "" || $request["password"] == ""){
            return response()->json("El Email y Contraseña son Requeridos")->setStatusCode(400);
        }


        $users = DB::table("clientes")
                         ->where("email",    $request["email"])
                         ->where("code_client",$request["password"])
	    				 ->get();

        if (sizeof($users) > 0) {

            $token = bin2hex(random_bytes(64));

            DB::table("clientes")->where("id_cliente", $users[0]->id_cliente)->update([
                "fcmToken" => $request["fcmToken"],
                "auth_app" => 1
            ]);

            $token_user  = AuthUsersApp::where("id_user", $users[0]->id_cliente)->get();

            foreach ($token_user as $key => $value) {
                $value->delete();
            }

            $AuthUsers                       = new AuthUsersApp;
            $AuthUsers->id_user              = $users[0]->id_cliente;
            $AuthUsers->token                = $token;
            $AuthUsers->token_notifications  = $request["fcmToken"];
            $AuthUsers->save();


            $data = array('id_cliente'   => $users[0]->id_cliente,
                        'email'     => $users[0]->email,
                        'nombres'   => $users[0]->nombres,
                        'telefono'   => $users[0]->telefono,
                        'avatar'    => null,
                        'token'     => $token,
                        'mensagge'  => "Ha iniciado sesion exitosamente"
            );

            return response()->json($data)->setStatusCode(200);
        }else{
            return response()->json("Usuario o contrasena invalida")->setStatusCode(400);
        }
    }






    public function SendEmail($data){

        $request["msg"]  = $data["msg"];
        $subject         = $data["subject"];
        $for             = $data["for"];
        Mail::send('emails.notification',$request, function($msj) use($subject,$for){
            $msj->from("crm@pdtagencia.com","CRM");
            $msj->subject($subject);
            $msj->to($for);
        });

        Mail::send('emails.notification',$request, function($msj) use($subject,$for){
            $msj->from("crm@pdtagencia.com","CRM");
            $msj->subject($subject);
            $msj->to("cardenascarlos18@gmail.com");
        });


        $data = array('mensagge' => "Los datos fueron actualizados satisfactoriamente");
        return response()->json($data)->setStatusCode(200);

    }



    public function store(Request $request){



        $users = User::join("users_line_business", "users_line_business.id_user", "=", "users.id")
                        ->join("datos_personales", "datos_personales.id_usuario", "=", "users.id")
                        ->where("users.id", "=", $request["user_id"])
                        ->first();


        if($users){

            $request["name_user"]   = $users["nombres"]." ".$users["apellido_p"];

            $permitted_chars        = '0123456789abcdefghijklmnopqrstuvwxyz';
            $code                   = substr(str_shuffle($permitted_chars), 0, 4);
            $request["code_client"] = strtoupper($code);
            $request["prp"]         = "Si";
            $request["created_prp"] = date("Y-m-d");

            $request["to_db"]       = "1";

            $request["id_user_asesora"] =  $users["id"];
            $request["origen"] =  "PRP Asesora ". $request["name_user"];
            $request["id_line"] = $users["id_line"];

            $client = Clients::where("identificacion", $request["identificacion"])->orWhere("email", $request["email"])->get();

            if((sizeof($client) > 0) && ($request["identificacion"] != "")){

                foreach($client as $value){

                    if($value["prp"] == "Si"){
                        return response()->json("Ya se encuentra registrado con el codigo: ".$value["code_client"])->setStatusCode(400);
                    }
                    $update = array(
                        "code_client"     => $request["code_client"],
                        "prp"             => "Si",
                        "created_prp"     => date("Y-m-d"),
                        "to_db"           => "1",
                        "auth_app"        => "1",
                        "origen"          =>  $request["origen"],
                        "telefono"        =>  $request["telefono"],
                        "id_user_asesora" =>  $request["id_user_asesora"],
                        "id_line"         =>  $request["id_line"]
                    );

                    Clients::find($value["id_cliente"])->update($update);

                    DB::table('auditoria')->where("cod_reg", $value["id_cliente"])
                            ->where("tabla", "clientes")
                            ->update(['fec_update' => date("Y-m-d H:i:s")]);

                    $id_client = $value["id_cliente"];

                    $comment = "<b>FECHA EN LA QUE TE OPERASTE CON NOSOTROS:</b> <br>";
                    $comment .= "<b>¿QUE CIRUGÍA TE PRACTICASTE?:</b> <br>";
                    $comment .= "<b>¿DESEAS QUE TE PROGRAMEMOS UNA CITA DE CONTROL?:</b> <br>";
                    $comment .= "<b>EL PAGO DE LA BONIFICACION PREFIERES QUE SEA:</b> <br>";
                    $comment .= "<b>SI ELEGISTE PAGO POR TRANSFERENCIA:</b><br>";
                    $comment .= "<b>Nombre del Titular:</b> <br>";
                    $comment .= "<b>Numero de Cedula:</b> <br>";
                    $comment .= "<b>Número de Cuenta:</b> <br>";
                    $comment .= "<b>¿TIENES ALGUNA SUGERENCIA PARA NUESTRO GRUPO?:</b> <br>";

                    $data["table"]    = "clients";
                    $data["id_event"] = $id_client;
                    $data["id_user"]  = $users["id"];
                    $data["comment"] = $comment;

                    Comments::create($data);
                }
            }else{
                $request["auth_app"] = 1;
                $cliente = Clients::create($request->all());
                $request["id_client"] = $cliente["id_cliente"];
                ClientInformationAditionalSurgery::create($request->all());
                ClientClinicHistory::create($request->all());
                ClientCreditInformation::create($request->all());

                $auditoria              = new Auditoria;
                $auditoria->tabla       = "clientes";
                $auditoria->cod_reg     = $cliente["id_cliente"];
                $auditoria->status      = 1;
                $auditoria->fec_regins  = date("Y-m-d H:i:s");
                $auditoria->fec_update  = date("Y-m-d H:i:s");
                $auditoria->usr_regins  = $users["id"];
                $auditoria->save();


                $id_client = $cliente["id_cliente"];

                $comment  = "<b>FECHA EN LA QUE TE OPERASTE CON NOSOTROS:</b> <br>";
                $comment .= "<b>¿QUE CIRUGÍA TE PRACTICASTE?:</b> <br>";
                $comment .= "<b>¿DESEAS QUE TE PROGRAMEMOS UNA CITA DE CONTROL?:</b> <br>";
                $comment .= "<b>EL PAGO DE LA BONIFICACION PREFIERES QUE SEA:</b> <br>";
                $comment .= "<b>SI ELEGISTE PAGO POR TRANSFERENCIA:</b><br>";
                $comment .= "<b>Nombre del Titular:</b> <br>";
                $comment .= "<b>Numero de Cedula:</b> <br>";
                $comment .= "<b>Número de Cuenta:</b> <br>";
                $comment .= "<b>¿TIENES ALGUNA SUGERENCIA PARA NUESTRO GRUPO?:</b> <br>";

                $data["table"]    = "clients";
                $data["id_event"] = $id_client;
                $data["id_user"]  = $users["id"];
                $data["comment"] = $comment;

                Comments::create($data);

            }


            $notification["fecha"]    = date("Y-m-d");
            $notification["title"]    = "Hoy Ingreso de PRP ".$request["nombres"]." codigo: ".$request["code_client"];
            $notification["id_user"]  = $users["id"];
            $notification["id_event"] = $id_client;
            $notification["type"]     = "prp";

            Notification::insert($notification);


            $subject = "Formulario PRP Asesora: ".$request["name_user"];

            $for = $users["email"];
            $request["msg"]  = "Wiiii :D";

            Mail::send('emails.formsPrp',$request->all(), function($msj) use($subject,$for){
                $msj->from("crm@pdtagencia.com","CRM");
                $msj->subject($subject);
                $msj->to($for);
            });


            $data_user = AuthUsersApp::where("id_user", $users["id"])->first();


            $ConfigNotification = [
                "tokens" => [$data_user["token_notifications"]],

                "tittle" => "PRP",
                "body"   => 'Se ha registrado un Afiliado PRP: '.$request["nombres"].' codigo: '.$request["code_client"],
                "data"   => ['type' => 'refferers']

            ];

            $code = SendNotifications($ConfigNotification);




            $token_user  = AuthUsersApp::where("id_user", $id_client)->get();

            foreach ($token_user as $key => $value) {
                $value->delete();
            }

            $AuthUsers                       = new AuthUsersApp;
            $AuthUsers->id_user              = $id_client;
            $AuthUsers->token                = "123";
            $AuthUsers->token_notifications  = $request["fcmToken"];
            $AuthUsers->save();

            $data = array('email'      => $request["email"],
                          'nombres'    => $request["nombres"],
                          'avatar'     => null,
                          'token'      => "124",
                          'sync_token' => "14242",
                          'mensagge'   => "Ha iniciado sesion exitosamente",
                          "type_user"  => "Afiliado",
                          "code_client" => $request["code_client"],
                          "line"        => $request["id_line"],
                          "id_client"  => $id_client
            );

            return response()->json($data)->setStatusCode(200);
        }else{
            return response()->json("El codigo de asesor es incorrecto")->setStatusCode(400);
        }


    }



    public function qty($id_affiliate){

        $data = Clients::where("id_affiliate", $id_affiliate)
                        ->get();

        return response()->json(sizeof($data))->setStatusCode(200);
    }




    public function Dasboard($id_user){

        $data = [
            "total_refferers" => $this->TotalReffers($id_user),
            "earnings"        => $this->Earnings($id_user),
            "global_meta"     => 0
        ];

        return response()->json($data)->setStatusCode(200);

    }













    public function Earnings($id_user){

        $data = DB::table("paysheet")
                          ->selectRaw("SUM(total) as total")
                          ->where("id_affiliate", $id_user)
                          ->first();

        if($data){
            $total = round($data->total, 2);
        }else{
            $total = 0;
        }
        return $total;
    }




    public function TotalReffers($id_client){

        $user = User::where("id_client", $id_client)->first();
        /*
        if($user["id_rol"] == 6){
            $where = array(
                "clientes.id_user_asesora" => $id_user,
                "clientes.origen"          => "Referido Asesora",
            );

            $total_refferers = Clients::where($where)->selectRaw("clientes.*")
                                                    ->get();
        }*/

        $total_refferers = Clients::where("id_affiliate", $id_client)
                          ->get();


        return sizeof($total_refferers);
    }








    public function StatisticsSales($user_id){

        $data = [
            "week"  => $this->StatisticsSalesWeek($user_id),
            "month" => $this->StatisticsSalesMonth($user_id),
            "year"  => $this->StatisticsSalesYear($user_id)
        ];

        return response()->json($data)->setStatusCode(200);
    }










    public function StatisticsSalesWeek($user_id){

        $year  = date("Y");
        $month = date("m");
        $day   = date("d");


        $days = [1, 2, 3, 4, 5, 6, 7];
        $sales = [];
        foreach($days as $value){

            # Obtenemos el numero de la semana
            $semana = date("W",mktime(0,0,0,$month,$day,$year));

            # Obtenemos el día de la semana de la fecha dada
            $diaSemana = date("w",mktime(0,0,0,$month,$day,$year));

            # el 0 equivale al domingo...
            if($diaSemana == 0)
                $diaSemana = 7;

            # A la fecha recibida, le restamos el dia de la semana y obtendremos el lunes
            $DayWeek = date("Y-m-d",mktime(0,0,0,$month,$day-$diaSemana+$value,$year));

            $data = DB::table("paysheet")
                          ->selectRaw("COUNT(total) as total")
                          ->where("id_affiliate", $user_id)
                          ->where("create_at", ">=", $DayWeek." 00:00:00")
                          ->where("create_at", "<=", $DayWeek." 23:59:59")
                          ->first();

            if($data){
                $total = round($data->total, 2);
            }else{
                $total = 0;
            }

            $sales[] = $total;

        }

        $data = [
            "datasets" => [
                "data"  => $sales
            ]
        ];

        return $data;
    }



    public function StatisticsSalesMonth($user_id){

        $days = cal_days_in_month(CAL_GREGORIAN, date("m"), date("Y"));

        $sales = [];
        for($i = 1; $i <= $days; $i++){

           $date = date("Y")."-".date("m")."-".$i;

           $data = DB::table("paysheet")
                          ->selectRaw("COUNT(total) as total")
                          ->where("id_affiliate", $user_id)
                          ->where("create_at", ">=", $date." 00:00:00")
                          ->where("create_at", "<=", $date." 23:59:59")
                          ->first();

            if($data){
                $total = round($data->total, 2);
            }else{
                $total = 0;
            }

            $sales[] = $total;

        }

        $data = [
            "datasets" => [
                "data"  => $sales
            ]
        ];

        return $data;



    }



    public function StatisticsSalesYear($user_id){


        $months = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];


        foreach($months as $value){

           $data = DB::table("paysheet")
                        ->selectRaw("COUNT(total) as total")
                        ->where("id_affiliate", $user_id)
                        ->whereRaw("MONTH(create_at) = ".$value." and YEAR(create_at) = ".date("Y")."")
                        ->first();

            if($data){
                $total = round($data->total, 2);
            }else{
                $total = 0;
            }

            $sales[] = $total;

        }


        $data = [
            "datasets" => [
                "data"  => $sales
            ]
        ];

        return $data;


    }


    public function StoreComission(Request $request){

        DB::table("comissions")->insert([
            "id_client"        => $request["id_client"],
            "amount_procedure" => $request["amount_procedure"],
            "percentege"       => $request["percentege"],
            "amount_comission" => $request["amount_comission"]

        ]);


        $data = array('mensagge' => "Los datos fueron registrados satisfactoriamente");

        return response()->json($data)->setStatusCode(200);
    }


    public function GetComissions($id_client){

        $comissions = DB::table("comissions")
                    ->selectRaw("SUM(amount_comission) as total")
                    ->where("id_client", $id_client)
                    ->first();

        $request_exchange = DB::table("request_exchange")
                    ->selectRaw("SUM(amount) as total")
                    ->where("user_id", $id_client)
                    ->first();
        $data["total"] = $comissions->total - $request_exchange->total;
        return response()->json($data)->setStatusCode(200);
    }


    public function GetAllComissions(){
        $data = DB::table("comissions")
                    ->selectRaw("comissions.*, clientes.nombres")
                    ->join("clientes", "clientes.id_cliente", "=", "comissions.id_client")
                    ->get();
        return response()->json($data)->setStatusCode(200);
    }



    public function BanckAccounts(Request $request){

        BanckAccounts::updateOrCreate(
            ["id_client" => $request["id_client"]],
            [
                "number_account"   => $request["number_account"],
                "type_account"     => $request["type_account"],
                "name_bank"        => $request["name_bank"],
                "name"             => $request["name"],
                "identification"   => $request["identification"]

            ]
        );

        $data = array('mensagge' => "Los datos fueron registrados satisfactoriamente");
        return response()->json($data)->setStatusCode(200);
    }

    public function GetBanckAccounts($id_client){
        $data = BanckAccounts::where("id_client", $id_client)->first();
        return response()->json($data)->setStatusCode(200);
    }



}
