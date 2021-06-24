<?php

namespace App\Http\Controllers;

use App\Clients;
use App\ClientInformationAditionalSurgery;
use App\ClientClinicHistory;
use App\ClientCreditInformation;
use App\User;
use App\datosPersonaesModel;
use App\Auditoria;
use Mail;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class formsClientController extends Controller
{

    public function formsCreditClient(Request $request){
        $id_line =  $request["id_line"];
        $id_user =  $request["id_user"];

        $users = User::join("users_line_business", "users_line_business.id_user", "=", "users.id")
                        ->where("users.id", $id_user)
                        ->first();

        if($users){

            $client = Clients::where("identificacion", $request["identificacion"])->first();
            if(($client) && ($request["identificacion"] != "")){

                DB::table('clientes')->where("id_cliente", $client["id_cliente"])
                            ->update(['id_user_asesora' => $users["id"], "id_line" => $request["id_line"]]);


                DB::table('auditoria')->where("cod_reg", $client["id_cliente"])
                            ->where("tabla", "clientes")
                            ->update(['fec_update' => date("Y-m-d H:i:s")]);

            }else{


                $request["id_user_asesora"] =  $users["id"];

                $permitted_chars        = '0123456789abcdefghijklmnopqrstuvwxyz';
                $code                   = substr(str_shuffle($permitted_chars), 0, 4);
                $request["code_client"] = strtoupper($code);
                $request["origen"]      = "Formulario Credito";


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


                isset($request["password"]) ? $request["password"] = md5($request["password"]) : $request["password"] = md5("123456789");
                $User =  User::create([
                    "email"       => $request["email"],
                    "password"    => $request["password"],
                    "id_rol"      => 17,
                    "id_client"   => $id_client
                ]);

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

            }

            $subject = "Formulario de Credito : ".$request["nombres"]."  Interesado en Financiacion";

            $for = $users["email"];
            //$for = "cardenascarlos18@gmail.com";

            $request["msg"]  = "Un Paciente a registrado un Formulario de Credito";
            $request["apellidos"]        = ".";
            $request["direccion"]        = ".";
            $request["fecha_nacimiento"] = date("Y-m-d");
            Mail::send('emails.forms',$request->all(), function($msj) use($subject,$for){
                $msj->from("crm@pdtagencia.com","CRM");
                $msj->subject($subject);
                $msj->to($for);
            });


        }

        $data = array('mensagge' => "Los datos fueron registrados satisfactoriamente");
        return response()->json($data)->setStatusCode(200);

    }
}