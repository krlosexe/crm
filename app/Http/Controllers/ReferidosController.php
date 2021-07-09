<?php

namespace App\Http\Controllers;

use Mail;
use App\AuthUsersApp;
use App\AuthUserAppFinancing;
use App\Clients;
use App\Auditoria;
use App\ClientClinicHistory;
use App\ClientCreditInformation;
use App\ClientInformationAditionalSurgery;
use App\ClientsProcedure;
use App\Surgeries;

use App\ClientsTasks;
use App\ClientsTasksFollowers;
use App\ClientsTasksComments;
use App\User;
use App\datosPersonaesModel;
use App\Comments;
use App\Notification;
use App\Valuations;
use App\GalleryImage;
use App\FollwersEvents;
use App\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\LogsClients;

use App\Exports\ClientsExport;
use Maatwebsite\Excel\Facades\Excel;

use Orchestra\Parser\Xml\Facade as XmlParser;

use DB;
use DateTime;
use PhpParser\Node\Stmt\TryCatch;


use App\RevisionAppointment;
use App\AppointmentsAgenda;

class ReferidosController extends Controller
{


/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //if ($this->VerifyLogin($request["id_user"],$request["token"])){

            $messages = [
                'required' => 'El Campo :attribute es requirdo.',
                'unique'   => 'El Campo :attribute ya se encuentra en uso.'
            ];

            if($request["identificacion"] != null){
               $valid = Clients::where("identificacion", $request["identificacion"])->get();

               if(sizeof($valid) > 0){
                    return response()->json("Numero de Identificacion se encuentra registrado en la base de datos")->setStatusCode(400);
               }
            }

            User::where("email", $request["email"])->delete();

            $user_find = User::where("email", $request["email"])->first();

            if($user_find){
                return response()->json("El Correo ya se encuentra registrado en la tabla de usuarios, comuniquese con Carlos Cardenas o Cambie el Correo")->setStatusCode(400);
            }

            $request["identificacion_verify"] == 1 ? $request["identificacion_verify"] = 1 : $request["identificacion_verify"] = 0;
            $validator = Validator::make($request->all(), [
                'nombres'         => 'required'
            ], $messages);

//

             $id_usersere    = User::where("id", $request["id_user"])->first();

             $request["id_affiliate"]   = $id_usersere->id_client;
             $id_asesoras    = Clients::where("id_cliente",$request["id_affiliate"])->first();
            $request["id_user_asesora"]= $id_asesoras->id_user_asesora;

     //        dd($request["id_user_asesora"]);

             
            if ($validator->fails()) {
                return response()->json($validator->errors())->setStatusCode(400);
            }else{


                $permitted_chars        = '0123456789abcdefghijklmnopqrstuvwxyz';
                $code                   = substr(str_shuffle($permitted_chars), 0, 4);
                $request["code_client"] = strtoupper($code);


                $request["nombres"] = rtrim($request["nombres"]." ".$request["apellidos"]);

                $cliente = Clients::create($request->all());

                $request["id_client"] = $cliente["id_cliente"];

                ClientInformationAditionalSurgery::create($request->all());
                ClientClinicHistory::create($request->all());
                ClientCreditInformation::create($request->all());


                if($request["sub_category"]){

                    foreach($request["sub_category"] as $procedure){
                        $array_procedure = [
                            "id_client"       => $cliente["id_cliente"],
                            "id_sub_category" => $procedure
                        ];
                        ClientsProcedure::create($array_procedure);
                    }

                }

                $User =  User::create([
                    "email"       => $request["email"],
                    "password"    => md5("123456789"),
                    "id_rol"      => 17,
                    "id_client"   => $cliente["id_cliente"]
                ]);

                $datos_personales                   = new datosPersonaesModel;
                $datos_personales->nombres          = $request["nombres"];
                $datos_personales->apellido_p       = "";
                $datos_personales->apellido_m       = ".";
                $datos_personales->n_cedula         = "12412124";
                $datos_personales->fecha_nacimiento = null;
                $datos_personales->telefono         = null;
                $datos_personales->direccion        = null;
                $datos_personales->id_usuario       = $User->id;
                $datos_personales->save();

                if(isset($request["telefono2"])){
                    foreach($request["telefono2"] as $value){

                        DB::table('clients_phone_aditional')->insert([
                            'id_cliente' => $cliente["id_cliente"],
                            'phone' => $value
                        ]);

                    }
                }

                if(isset($request["email2"])){
                    foreach($request["email2"] as $value){

                        DB::table('clients_email_aditional')->insert([
                            'id_cliente' => $cliente["id_cliente"],
                            'email' => $value
                        ]);

                    }
                }

                $request["table"]    = "clients";
                $request["id_event"] = $cliente["id_cliente"];

                if(isset($request["comment"]) && $request["comment"] != "<p><br></p>"){
                    Comments::create($request->all());
                }



                $auditoria              = new Auditoria;
                $auditoria->tabla       = "clientes";
                $auditoria->cod_reg     = $cliente["id_cliente"];
                $auditoria->status      = 1;
                $auditoria->usr_regins  = $request["id_user"];
                $auditoria->fec_regins  = date("Y-m-d H:i:s");
                $auditoria->fec_update  = date("Y-m-d H:i:s");
                $auditoria->save();





                if(isset($request["create_task_client"]) && ($request["create_task_client"] == 1)){

                    $request["id_client"] = $cliente["id_cliente"];
                    $store_task = ClientsTasks::create($request->all());

                    $auditoria              = new Auditoria;
                    $auditoria->tabla       = "clients_tasks";
                    $auditoria->cod_reg     = $store_task["id_clients_tasks"];
                    $auditoria->status      = 1;
                    $auditoria->fec_regins  = date("Y-m-d H:i:s");
                    $auditoria->usr_regins  = $request["id_user"];
                    $auditoria->save();


                    $followers = [];
                    foreach($request->followers as $key => $value){
                        $array = [];
                        $array["id_task"]     = $store_task["id_clients_tasks"];
                        $array["id_follower"] = $value;
                        array_push($followers, $array);
                    }

                    ClientsTasksFollowers::insert($followers);
                }





                if(isset($request["create_valorations_client"]) && ($request["create_valorations_client"] == 1)){

                    $valoration = [
                        "id_cliente"       => $cliente["id_cliente"],
                        "clinic"           => $request["clinic_valoration"],
                        "surgeon"          => $request["surgeon"],
                        "fecha"            => $request["fecha_valoration"],
                        "time"             => $request["time_valoration"],
                        "time_end"         => $request["time_end"],
                        "type"             => $request["type"],
                        "pay_consultation" => $request["pay_consultation"],
                        "code_prp"         => $request["code_prp"],
                        "way_to_pay"       => $request["way_to_pay"],
                        "status"           => 0
                    ];


                    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
                    $code = substr(str_shuffle($permitted_chars), 0, 4);

                    $valoration["code"] = $code;

                    $request["pay_consultation"] == 1 ? $valoration["pay_consultation"] = 1 : $valoration["pay_consultation"] = 0;

                    if($file = $request->file('acquittance_file')){
                        $destinationPath = 'img/valuations/acquittance';
                        $file->move($destinationPath,$file->getClientOriginalName());
                        $valoration["acquittance"] = $file->getClientOriginalName();
                    }


                    $valoration = Valuations::create($valoration);


                    $request["table"]    = "valuations";
                    $request["id_event"] = $valoration["id_valuations"];
                    $request["comment"]  = $request->comment_valorations;

                    if($request->comment_valorations != "<p><br></p>"){
                        Comments::create($request->all());
                    }


                    $followers = [];
                    if(isset($request->followers_valoration)){

                        foreach($request->followers_valoration as $key => $value){
                            $array = [];
                            $array["id_event"]    = $valoration["id_valuations"];
                            $array["id_user"]     = $value;
                            $array["tabla"]       = "valuations";
                            array_push($followers, $array);
                            FollwersEvents::create($array);
                        }

                    }




                    $auditoria              = new Auditoria;
                    $auditoria->tabla       = "valuations";
                    $auditoria->cod_reg     = $valoration["id_valuations"];
                    $auditoria->status      = 1;
                    $auditoria->fec_regins  = date("Y-m-d H:i:s");
                    $auditoria->usr_regins  = $request["id_user"];
                    $auditoria->save();



                }






               // $mensaje = "Bienvenido, tus datos de acceso son: ".$request["email"]." clave: 123456789";

               // $info_email = [
                   // "user_id" => $User->id,
                   // "issue"   => "Bienvenido",
                   // "mensage" => $mensaje,
                //];

              //  $this->SendEmail($info_email);



                if ($cliente) {
                    $data = array('mensagge' => "Los datos fueron registrados satisfactoriamente");
                    return response()->json($data)->setStatusCode(200);
                }else{
                    return response()->json("A ocurrido un error")->setStatusCode(400);
                }
            }

        // }else{
        //     return response()->json("No esta autorizado")->setStatusCode(400);
        // }


    }










}