<?php

namespace App\Http\Controllers;

use App\Auditoria;
use App\Valuations;
use App\Comments;
use App\FollwersEvents;
use App\ValuationsPhoto;
use App\LogsClients;
use App\Clients;
use DB;
use Mail;
use Image;
use App\User;
use App\AuthUsersApp;

use App\ClientCreditInformation;
use Illuminate\Http\Request;

class ValuationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($this->VerifyLogin($request["id_user"],$request["token"])){

            $rol     = $request["rol"];
            $id_user = $request["id_user"];

            $adviser = 0;
            if(isset($request["adviser"])){
              $adviser = $request["adviser"];
            }


            $overdue = "all";
            if(isset($request["overdue"])){
              $overdue = $request["overdue"];
            }




            $date_init = 0;
            if(isset($request["date_init"]) && $request["date_init"] != ""){
                $date_init = $request["date_init"];
            }


            $date_finish = 0;
            if(isset($request["date_finish"]) && $request["date_finish"] != ""){
                $date_finish = $request["date_finish"];
            }





            $valuations = Valuations::select("valuations.*", "valuations.id_asesora_valoracion as id_asesora", "valuations.clinic as id_clinic",
                                             "valuations.status as status_valuations*", "auditoria.*", "users.email as email_regis", "clientes.*",
                                            "valuations.status as status_valuations", "valuations.clinic as id_clinic")

                                ->join("auditoria", "auditoria.cod_reg", "=", "valuations.id_valuations")
                                ->join("clientes", "clientes.id_cliente", "=", "valuations.id_cliente")
                                ->join("users", "users.id", "=", "auditoria.usr_regins")
                                ->where("auditoria.tabla", "valuations")
                                ->where("auditoria.status", "!=", "0")

                                ->with("followers")
                                ->with("photos")
                                
                                ->where(function ($query) use ($rol, $id_user) {
                                    if($rol == "Asesor"){
                                        $query->where("clientes.id_user_asesora", $id_user);
                                    }
                                })



                                ->where(function ($query) use ($overdue) {
                                    if($overdue == "overdue"){
                                        $query->where("valuations.fecha", "<" ,date("Y-m-d"));
                                    }
                                })

                                ->where(function ($query) use ($adviser) {
                                    if($adviser != 0){
                                        $query->whereIn("auditoria.usr_regins", $adviser);
                                        $query->Orwhere("valuations.id_asesora_valoracion", $adviser);
                                    }
                                }) 



                                ->where(function ($query) use ($date_init) {
                                    if($date_init != 0){
                                        $query->where("valuations.fecha", ">=", $date_init);
                                    }
                                }) 

                                ->where(function ($query) use ($date_finish) {
                                    if($date_finish != 0){
                                        $query->where("valuations.fecha", "<=", $date_finish);
                                    }
                                }) 





                                ->orderBy("valuations.id_valuations", "DESC")
                                ->get();



            if($rol == "Asesor"){

                $valuations_follow = Valuations::select("valuations.*", "valuations.id_asesora_valoracion as id_asesora", "valuations.clinic as id_clinic",
                                             "valuations.status as status_valuations*", "auditoria.*", "users.email as email_regis", "clientes.*",
                                            "valuations.status as status_valuations", "valuations.clinic as id_clinic")

                                ->join("auditoria", "auditoria.cod_reg", "=", "valuations.id_valuations")
                                ->join("clientes", "clientes.id_cliente", "=", "valuations.id_cliente")
                                ->join("users", "users.id", "=", "auditoria.usr_regins")
                                ->where("auditoria.tabla", "valuations")
                                ->where("auditoria.status", "!=", "0")

                                ->join("followers_events", "followers_events.id_event", "=", "valuations.id_valuations")

                                
                                ->with("followers")
                                ->with("photos")
                        

                                ->where("followers_events.id_user", $id_user)
                                ->where("followers_events.tabla", "valuations")

                                ->orderBy("valuations.id_valuations", "DESC")
                                ->get();


                foreach($valuations_follow as $key => $value){
                  $valuations[] = $value;
                }
            }
            echo json_encode($valuations);
        }else{
            return response()->json("No esta autorizado")->setStatusCode(400);
        }

    }



    public function getToday(){
       
        $valuations = Valuations::selectRaw("valuations.fecha, valuations.time, valuations.code as valoration_code, clientes.id_cliente as id_client,clientes.nombres as name_client, CONCAT(datos_personales.nombres, ' ', datos_personales.apellido_p) as name_adviser, u2.id as user_id, auditoria.usr_regins as user_asesora")

                ->join("auditoria", "auditoria.cod_reg", "=", "valuations.id_valuations")
                ->join("clientes", "clientes.id_cliente", "=", "valuations.id_cliente")
                ->join("users", "users.id", "=", "auditoria.usr_regins")
                ->join("datos_personales", "datos_personales.id_usuario", "=", "users.id")

                ->join("users as u2", "u2.id_client", "=", "clientes.id_cliente")


                ->where("auditoria.tabla", "valuations")
                ->where("auditoria.status", "!=", "0")
                ->where("valuations.fecha", date("Y-m-d"))
                ->where("valuations.clinic", 9)

                ->orderBy("valuations.time", "ASC")
                ->get();

        return response()->json($valuations)->setStatusCode(200);

    }



    public function getTodayClient($user_id){



        $user = User::where("id", $user_id)->first();

        if($user["id_rol"] == 9 || $user["id_rol"] == 6){


            $valuations = Valuations::selectRaw("valuations.fecha, valuations.time, valuations.code as valoration_code, 
                                                clientes.id_cliente as id_client,clientes.nombres as name_client,
                                                 CONCAT(datos_personales.nombres, ' ', datos_personales.apellido_p) as name_adviser, auditoria.usr_regins as user_id")

                                ->join("auditoria", "auditoria.cod_reg", "=", "valuations.id_valuations")
                                ->join("clientes", "clientes.id_cliente", "=", "valuations.id_cliente")
                                ->join("users", "users.id", "=", "auditoria.usr_regins")
                                ->join("datos_personales", "datos_personales.id_usuario", "=", "users.id")


                                ->where("auditoria.tabla", "valuations")
                                ->where("auditoria.status", "!=", "0")
                                ->where("valuations.fecha", date("Y-m-d"))
                                ->where("auditoria.usr_regins", $user_id)

                                ->orderBy("valuations.fecha", "ASC")
                                ->orderBy("valuations.time", "ASC")
                                ->get();




            return response()->json($valuations)->setStatusCode(200);



        }else{


            $valuations = Valuations::selectRaw("valuations.fecha, valuations.time, valuations.code as valoration_code, clientes.id_cliente as id_client,clientes.nombres as name_client, CONCAT(datos_personales.nombres, ' ', datos_personales.apellido_p) as name_adviser, u2.id as user_id")

                    ->join("auditoria", "auditoria.cod_reg", "=", "valuations.id_valuations")
                    ->join("clientes", "clientes.id_cliente", "=", "valuations.id_cliente")
                    ->join("users", "users.id", "=", "auditoria.usr_regins")
                    ->join("datos_personales", "datos_personales.id_usuario", "=", "users.id")

                    ->join("users as u2", "u2.id_client", "=", "clientes.id_cliente")

                    ->where("auditoria.tabla", "valuations")
                    ->where("auditoria.status", "!=", "0")
                    // ->where("valuations.fecha", date("Y-m-d"))
                    ->where("u2.id", $user_id)

                    ->orderBy("valuations.time", "ASC")
                    ->first();



            if($valuations){

                $data = DB::table("valuations_photo")->where("code", $valuations["valoration_code"])->get();
    
                if(sizeof($data) > 0){
                    $valuations["photos"] = 1;
                }else{
                    $valuations["photos"] = 0;
                }
    
    
                $data_hc = DB::table("client_clinic_history")
                                ->where("id_client", $valuations["id_client"])
                                ->whereNotNull("eps")
                                ->get();
    
    
                if(sizeof($data_hc) > 0){
                    $valuations["history_clinic"] = 1;
                }else{
                    $valuations["history_clinic"] = 0;
                }
    
    
    
                if($valuations["fecha"] == date("Y-m-d")){
                    $valuations["is_today"] = 1;
                }else{
                    $valuations["is_today"] = 0;
                }
    
                return response()->json($valuations)->setStatusCode(200);
    
            }else{
                return response()->json([])->setStatusCode(200);
            }


        }


        
    

    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

            $state_px = $request["state_px"];
     
            $hora_init = strtotime( $request["time"] );
            $hora_end  = strtotime( $request["time_end"] );

            

            

            $valid = Valuations::where("fecha", $request["fecha"])
                                ->where("time_end", ">=", $request["time"])
                                ->where("time",     "<=", $request["time"])
                                ->get();


            if($hora_init >= $hora_end){
                $data = array('mensagge' => "La hora desde no puede ser mayor o igual a la hora hasta");    
                return response()->json($data)->setStatusCode(400); 
            }


            $request["pay_consultation"] == 1 ? $request["pay_consultation"] = 1 : $request["pay_consultation"] = 0;


            if($file = $request->file('acquittance_file')){
                $destinationPath = 'img/valuations/acquittance';
                $file->move($destinationPath,$file->getClientOriginalName());
                $request["acquittance"] = $file->getClientOriginalName();
            }

            $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
            $code = substr(str_shuffle($permitted_chars), 0, 4);
            
            $request["code"] = strtoupper($code);
            $store = Valuations::create($request->all());




            $request["table"]    = "valuations";
            $request["id_event"] = $store["id_valuations"];

            
            if($request->comment != "<p><br></p>"){
                Comments::create($request->all());
            }

            $auditoria              = new Auditoria;
            $auditoria->tabla       = "valuations";
            $auditoria->cod_reg     = $store["id_valuations"];
            $auditoria->status      = 1;
            $auditoria->fec_regins  = date("Y-m-d H:i:s");
            $auditoria->usr_regins  = $request["id_user"];
            $auditoria->save();



            $followers = [];
            if(isset($request->followers)){

                foreach($request->followers as $key => $value){
                    $array = [];
                    $array["id_event"]    = $store["id_valuations"];
                    $array["id_user"]     = $value;
                    $array["tabla"]       = "valuations";
                    array_push($followers, $array);
                    FollwersEvents::create($array);
                }
                
            }


            DB::table("events_client")->insert([
                "event"     => "Valoracion",
                "id_client" => $request["id_cliente"],
                "id_event"  => $store["id_valuations"]
            ]);



            
            $clinic = DB::table("clinic")->where("id_clinic", $request["clinic"])->first();

            $version["id_user"]   = $request["id_user"];
            $version["id_client"] = $request["id_cliente"];
            $version["event"]     = "Agendo Cita de Valoracion para el dia $request[fecha] a las $request[time] con el Doctor $request[surgeon] en la clinica ".$clinic->nombre;

            LogsClients::create($version);






            $user = DB::table("users")->where("id_client", $request["id_cliente"])->first();



            $users_client = DB::table("auth_users_app_financing")->selectRaw("auth_users_app_financing.token_notifications")
                                    ->where("auth_users_app_financing.id_user", $user->id)
                                    ->first();


            if($users_client){

                $FCM_token = $users_client->token_notifications;

                $url = "https://fcm.googleapis.com/fcm/send";
                $token = $FCM_token;
                $serverKey = 'AAAA3cdYfsY:APA91bF1mZUGbz72Z-qZhvT4ZFTwj6IUxAIZn9cchDvBxtmj47oRX6JKK8u8-thLD94GBUiRRGJqVndybDASTjHLwiRTkQlqyYqyCf4Oqt3nTqdeyh246t5KSXcPWUvY9fSp1bbOrg_L';
                $title = "Tu cita de valoracion fue Agendada";
                $body = "Tu cita de Valoracion fue agendada para el dia $request[fecha]";
                $notification = array('title' =>$title , 'body' => $body, 'sound' => 'default', 'badge' => '1');
                $arrayToSend = array('to' => $token, 'notification' => $notification,'priority'=>'high');
                $json = json_encode($arrayToSend);
                $headers = array();
                $headers[] = 'Content-Type: application/json';
                $headers[] = 'Authorization: key='. $serverKey;
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
                curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
                curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                //Send the request
                $response = curl_exec($ch);
                //Close request
                if ($response === FALSE) {
                    die('FCM Send Error: ' . curl_error($ch));
                }
                curl_close($ch);


            }
          
            if($state_px != "0"){
                $data_client = Clients::select("state")->find($request["id_cliente"]);

                DB::table("clientes")->where("id_cliente", $request["id_cliente"])->update(["state" => $state_px]);

               
                if($data_client->state != $state_px){
                    
                    $version["id_user"]   = $request["id_user"];
                    $version["id_client"] = $request["id_cliente"];
                    $version["event"]     = "Actualizo el estado de: ".$data_client->state." a ".$request['state_px'];
    
                    LogsClients::create($version);
                }

            }

            


            if ($store) {
                $data = array('mensagge' => "Los datos fueron registrados satisfactoriamente");    
                return response()->json($data)->setStatusCode(200);
            }else{
                return response()->json("A ocurrido un error")->setStatusCode(400);
            }

    }




    public function Clients(Request $request, $client)
    {

            $rol     = $request["rol"];
            $id_user = $request["id_user"];

            $valuations = Valuations::select("valuations.*", "valuations.id_asesora_valoracion as id_asesora", "valuations.status as status_valuations*",
                                             "auditoria.*", "users.email as email_regis", "clientes.*", "valuations.status as status_valuations", "valuations.clinic as id_clinic")
                                ->join("auditoria", "auditoria.cod_reg", "=", "valuations.id_valuations")
                                ->join("clientes", "clientes.id_cliente", "=", "valuations.id_cliente")
                                ->join("users", "users.id", "=", "auditoria.usr_regins")
                                ->where("auditoria.tabla", "valuations")
                                ->where("auditoria.status", "!=", "0")
                                ->where("valuations.id_cliente", $client)


                                ->with("comments")
                                ->with("photos")
                                ->with("followers")
                                
                                ->orderBy("valuations.id_valuations", "DESC")
                                ->get();


            return response()->json($valuations)->setStatusCode(200);
        
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Valuations  $valuations
     * @return \Illuminate\Http\Response
     */
    public function show(Valuations $valuations)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Valuations  $valuations
     * @return \Illuminate\Http\Response
     */
    public function edit(Valuations $valuations)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Valuations  $valuations
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $valuations)
    {
        if ($this->VerifyLogin($request["id_user"],$request["token"])){



            $state_px = $request["state_px"];

            
            if($file = $request->file('file')){
                $destinationPath = 'img/valuations/cotizaciones';
                $file->move($destinationPath,$file->getClientOriginalName());
                $request["cotizacion"] = $file->getClientOriginalName();
            }

            $valid = Valuations::where("fecha", $request["fecha"])
                                ->where("time_end", ">=", $request["time"])
                                ->where("time",     "<=", $request["time"])
                                ->where("id_valuations", "!=", $valuations)
                                ->get();

            // if(sizeof($valid) > 0){
            //     $data = array('mensagge' => "Ya existen valoraciones en ese Horario");    
            //     return response()->json($data)->setStatusCode(400); 
            // }



            $hora_init = strtotime( $request["time"] );
            $hora_end  = strtotime( $request["time_end"] );

            if($hora_init >= $hora_end){

                $data = array('mensagge' => "La hora desde no puede ser mayor o igual a la hora hasta");    
                return response()->json($data)->setStatusCode(400); 
            }





            $request["pay_consultation"] == 1 ? $request["pay_consultation"] = 1 : $request["pay_consultation"] = 0;


            if($file = $request->file('acquittance_file')){
                $destinationPath = 'img/valuations/acquittance';
                $file->move($destinationPath,$file->getClientOriginalName());
                $request["acquittance"] = $file->getClientOriginalName();
            }


            $queries = Valuations::find($valuations)->update($request->all());

            
            if(isset($request->comment)){
                if($request->comment != "<p><br></p>"){

                    $array = [];
                    $array["id_event"]   = $valuations;
                    $array["table"]      = "valuations";
                    $array["id_user"]    = $request["id_user"];
                    $array["comment"]    = $request->comment;
                    Comments::insert($array);
                }
            }
            


            


            if(isset($request->followers)){

                FollwersEvents::where("id_event", $valuations)->delete();
                $followers = [];
                foreach($request->followers as $key => $value){
                    $array = [];
                    $array["id_event"]    = $valuations;
                    $array["id_user"]     = $value;
                    $array["tabla"]       = "valuations";
                    FollwersEvents::create($array);
                }
                
            }


            if(isset($request["clinic"])){
                $clinic    = DB::table("clinic")->where("id_clinic", $request["clinic"])->first();
                $name_clinic = $clinic->nombre;
            }else{
                $name_clinic = "";
            }
            
            $valuation = DB::table("valuations")->where("id_valuations", $valuations)->first();
          
   
            $version["id_user"]   = $request["id_user"];
            $version["id_client"] = $valuation->id_cliente;
            $version["event"]     = "Actualizo Cita de Valoracion para el dia $request[fecha] a las $request[time] con el Doctor $request[surgeon] en la clinica ".$name_clinic;

            LogsClients::create($version);




            if($state_px != "0"){
                $data_client = Clients::select("state")->find($valuation->id_cliente);

                DB::table("clientes")->where("id_cliente", $valuation->id_cliente)->update(["state" => $state_px]);

               
                if($data_client->state != $state_px){
                    
                    $version["id_user"]   = $request["id_user"];
                    $version["id_client"] = $valuation->id_cliente;
                    $version["event"]     = "Actualizo el estado de: ".$data_client->state." a ".$request['state_px'];
    
                    LogsClients::create($version);
                }

            }










            if ($queries) {
                $data = array('mensagge' => "Los datos fueron registrados satisfactoriamente");    
                return response()->json($data)->setStatusCode(200);
            }else{
                return response()->json("A ocurrido un error")->setStatusCode(400);
            }

        }else{
            return response()->json("No esta autorizado")->setStatusCode(400);
        }
    }


    public function status($id, $status, Request $request)
    {
       
        $auditoria =  Auditoria::where("cod_reg", $id)
                                    ->where("tabla", "valuations")->first();
        $auditoria->status = $status;

        if($status == 0){
            $auditoria->usr_regmod = 86;
            $auditoria->fec_regmod = date("Y-m-d");
        }
        $auditoria->save();

        $data = array('mensagge' => "Los datos fueron actualizados satisfactoriamente");    
        return response()->json($data)->setStatusCode(200);
       
    }



    public function ValidateCode($code){

        $data = Valuations::select("valuations.*", "clientes.nombres", "clientes.apellidos", 

                                    "client_clinic_history.eps",
                                    "client_clinic_history.height",
                                    "client_clinic_history.weight",
                                    "client_clinic_history.number_children",
                                    "client_clinic_history.alcohol",
                                    "client_clinic_history.smoke",
                                    "client_clinic_history.previous_surgery",
                                    "client_clinic_history.major_disease",
                                    "client_clinic_history.drink_medication",
                                    "client_clinic_history.allergic_medication"

                                )

                            ->join("clientes", "clientes.id_cliente", "=", "valuations.id_cliente")
                            ->join("client_clinic_history", "client_clinic_history.id_client", "=", "valuations.id_cliente")

                            ->where("code", $code)
                            ->first();
        if($data){

            sleep(2);
            return response()->json($data)->setStatusCode(200);

        }else{

            sleep(2);
            return response()->json("Codigo Invalido")->setStatusCode(400);
            
        }
        

    }


    public function StorePhotos(Request $request){

        $folder_valoration = "img/valuations/".$request["code"];
        if(!is_dir($folder_valoration)){
            mkdir($folder_valoration, 0755);
        }

        foreach($request["foto"] as $value){

            $code          = uniqid();
            $folder_photos = $folder_valoration."/".$code;


            if(!is_dir($folder_photos)){
                mkdir($folder_photos, 0755);
            }

            $img      = str_replace('data:image/png;base64,', '', $value);
            $fileData = base64_decode($img);
            $fileName = 'original.png';
            file_put_contents($folder_photos."/".$fileName, $fileData);

            
            $imageResize = Image::make($folder_photos."/".$fileName);
            $imageResize->orientate()
            ->fit(75, 75, function ($constraint) {
                $constraint->upsize();
            })
            ->save($folder_photos."/small.png");


            $imageResizeMedium = Image::make($folder_photos."/".$fileName);
            $imageResizeMedium->orientate()
            ->fit(300, 300, function ($constraint) {
                $constraint->upsize();
            })
            ->save($folder_photos."/medium.png");


            $imageResizeLarge = Image::make($folder_photos."/".$fileName);
            $imageResizeLarge->orientate()
            ->fit(600, 600, function ($constraint) {
                $constraint->upsize();
            })
            ->save($folder_photos."/large.png");

            ValuationsPhoto::create(["code" => strtoupper($request["code"]), "code_img" => $code]);
        }

        return response()->json("ok")->setStatusCode(200);
    }


    public function GetPhotos($code){

        $photos = ValuationsPhoto::where("code", $code)->get();

        $data = [
            "path"   => "img/valuations/$code",
            "photos" => $photos
        ];
        
        return response()->json($data)->setStatusCode(200);

    }



    public function DeleteCotizacion($id){
        $data["cotizacion"] = null;
        Valuations::find($id)->update($data);
        return response()->json("Ok")->setStatusCode(200);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Valuations  $valuations
     * @return \Illuminate\Http\Response
     */
    public function destroy(Valuations $valuations)
    {
        //
    }


    public function QtyMonth($user_id){
        
        $data = Valuations::selectRaw("count(id_valuations) as qty")
                            ->join("auditoria", "auditoria.cod_reg", "=", "valuations.id_valuations")
                            ->where("auditoria.tabla", "valuations")
                            ->where("valuations.status", 1)
                            ->where("auditoria.usr_regins", $user_id)
                            ->whereRaw("month(fecha) = ".date("m")." ")
                            ->first();

        return response()->json($data)->setStatusCode(200);

    }


    public function QtyMonthList($user_id){
        
        $data = Valuations::select("valuations.*")
                            ->join("auditoria", "auditoria.cod_reg", "=", "valuations.id_valuations")
                            ->where("auditoria.tabla", "valuations")
                            ->where("valuations.status", 1)
                            ->where("auditoria.usr_regins", $user_id)
                            ->whereRaw("month(fecha) = ".date("m")." ")
                            ->get();

        return response()->json($data)->setStatusCode(200);

    }



    public function RequestValoration(Request $request){


        $client = DB::table("clientes")->where("id_cliente", $request["id_client"])->first();

        ClientCreditInformation::find($request["id_client"])->update(["have_initial" => $request["have_initial"], "reported" => $request["reported"]]);





        $mensaje = "El Px $client->nombres codigo : $client->code_client ha solicitado una cita de Valoracion para el dia : $request[date], tiene Inicial ? :  $request[have_initial]";

        $data["table"]    = "clients";
        $data["id_event"] = $request["id_client"];
        $data["id_user"]  = $client->id_user_asesora;
        $data["comment"]  = $mensaje;

        Comments::create($data);



        $data_user = AuthUsersApp::where("id_user", $client->id_user_asesora)->first();

        $ConfigNotification = [
            "tokens" => [$data_user["token_notifications"]],
    
            "tittle" => "App de Financiacion",
            "body"   => $mensaje,
            "data"   => ['type' => 'refferers']
    
        ];
    
        $code = SendNotifications($ConfigNotification);



        
                
        $info_email = [
            "user_id" => $client->id_user_asesora,
            "issue"   => "App de Financiacion Px : $client->nombres",
            "mensage" => $mensaje,
        ];
                
        $this->SendEmail($info_email);





        return response()->json($client)->setStatusCode(200);
    }



    public function SendEmail($data){
    
        $user = User::find($data["user_id"]);
        $subject = $data["issue"];

        $for = "cardenascarlos18@gmail.com";
       // $for = $user["email"];

        $request["msg"] = $data["mensage"];

        Mail::send('emails.notification',$request, function($msj) use($subject,$for){
            $msj->from("cardenascarlos18@gmail.com","CRM");
            $msj->subject($subject);
            $msj->to($for);
        });

        return true;

    }

    



}
