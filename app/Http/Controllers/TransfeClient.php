<?php

namespace App\Http\Controllers;

use App\User;
use App\Auditoria;
use App\Clients;
use Mail;
use DB;

use App\ClientInformationAditionalSurgery;
use App\ClientClinicHistory;
use App\ClientCreditInformation;

use App\Comments;
use App\datosPersonaesModel;

use Illuminate\Http\Request;

class TransfeClient extends Controller
{
    public function store(Request $request){


        $users = User::join("datos_personales", "datos_personales.id_usuario", "=", "users.id")
                        ->where("users.id", $request["id_adviser"])
                        ->first();

       if($users){

            $client = Clients::where("identificacion", $request["identificacion"])->get();
            if((sizeof($client) > 0) && ($request["identificacion"] != "")){

                foreach($client as $value){

                    $update = array(
                        "code_client"     => $request["code_client"],
                        "to_db"           => "1",
                        "origen"          =>  $request["origen"],
                        "telefono"        =>  $request["telefono"],
                        "id_user_asesora" =>  $users["id"],
                        "id_line"         =>  $request["id_line"]
                    );

                    Clients::find($value["id_cliente"])->update($update);
                    DB::table('auditoria')->where("cod_reg", $value["id_cliente"])
                            ->where("tabla", "clientes")
                            ->update(['fec_update' => date("Y-m-d H:i:s")]);

                    $id_client = $value["id_cliente"];

                    $comment = "Paciente Ingresa a travez de Reemision del Locales Comerciales, ".$request["origen"];

                    $data["table"]    = "clients";
                    $data["id_user"]  = $users["id"];
                    $data["id_event"] = $id_client;
                    $data["comment"]  = $comment;

                    Comments::create($data);


                    $subject = "Reemision Locales Comerciales";

                    $for = $users["email"];
                    $request["msg"]  = $request["origen"];

                    $request["apellidos"] = "";
                    $request["fecha_nacimiento"] = "";

                    Mail::send('emails.forms',$request->all(), function($msj) use($subject,$for){
                        $msj->from("cardenascarlos18@gmail.com","CRM");
                        $msj->subject($subject);
                        $msj->to($for);
                    });




                }

            }else{


                $request["id_user_asesora"] =  $users["id"];

                $permitted_chars        = '0123456789abcdefghijklmnopqrstuvwxyz';
                $code                   = substr(str_shuffle($permitted_chars), 0, 4);
                $request["code_client"] = strtoupper($code);


                $cliente = Clients::create($request->all());

                $request["id_client"] = $cliente["id_cliente"];





                $id_client = $cliente["id_cliente"];

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


                $update = User::find($users["id"]);
                $update->queue = 1;
                $update->save();




                $comment = "Paciente Ingresa a travez de Reemision del Locales Comerciales, ".$request["origen"];

                $data["table"]    = "clients";
                $data["id_user"]  = $users["id"];
                $data["id_event"] = $id_client;
                $data["comment"]  = $comment;

                Comments::create($data);



                $User =  User::updateOrCreate(
                    ["email" => $request["email"]],
                    [
                        "email"       => $request["email"],
                        "password"    => md5("123456789"),
                        "id_rol"      => 17,
                        "id_client"   => $id_client
                    ]
                );

                $datos_personales                   = new datosPersonaesModel;
                $datos_personales->nombres          = $request["nombres"];
                $datos_personales->apellido_p       = "";
                $datos_personales->apellido_m       = "afasfa";
                $datos_personales->n_cedula         = "12412124";
                $datos_personales->fecha_nacimiento = null;
                $datos_personales->telefono         = null;
                $datos_personales->direccion        = null;
                $datos_personales->id_usuario       = $User->id;
                $datos_personales->save();


                $subject = "Reemision Locales Comerciales";

                //$for = "cardenascarlos18@gmail.com";
                $for = $users["email"];
            //   $for = "cardenascarlos18@gmail.com";

                $request["msg"]  = $request["origen"];

                $request["apellidos"] = "";
                $request["fecha_nacimiento"] = "";

                Mail::send('emails.forms',$request->all(), function($msj) use($subject,$for){
                    $msj->from("cardenascarlos18@gmail.com","CRM");
                    $msj->subject($subject);
                    $msj->to($for);
                });

            }

       }


        $data = array('mensagge' => "El paciente fue reemitido a la Asesora ".$users["nombres"]. " ".$users["apellido_p"]);
        return response()->json($data)->setStatusCode(200);
    }
}
