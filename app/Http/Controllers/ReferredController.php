<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clients;
use App\AuthUsersApp;
use App\Auditoria;
use App\ClientInformationAditionalSurgery;
use App\ClientClinicHistory;
use App\ClientCreditInformation;
use App\User;

use App\datosPersonaesModel;
use Illuminate\Support\Facades\Hash;

use DB;
use Mail;
class ReferredController extends Controller
{
    public function store(Request $request){


        $affiliate = Clients::where("code_client", $request["code"])->first();


        $request["id_affiliate"]    = $affiliate["id_cliente"];
        $request["id_user_asesora"] = $affiliate["id_user_asesora"];
        $request["id_line"]         = $affiliate["id_line"];

        $permitted_chars        = '0123456789abcdefghijklmnopqrstuvwxyz';
        $code                   = substr(str_shuffle($permitted_chars), 0, 4);
        $request["code_client"] = strtoupper($code);

        $data = Clients::where("identificacion", $request["identificacion"])->first();



        if($data){
            $data = array('mensagge' => "El paciente ya se encuentra en la base de datos");
            return response()->json($data)->setStatusCode(400);
        }
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


        $data_adviser   = AuthUsersApp::where("id_user", $request["id_user_asesora"])->first();

        $data_affiliate = AuthUsersApp::join("users", "users.id", "=", "auth_users_app.id_user")
                                        ->where("users.id_client", $affiliate["id_cliente"])
                                        ->first();


        $ConfigNotification = [
            "tokens" => [$data_adviser["token_notifications"], $data_affiliate["token_notifications"]],

            "tittle" => "PRP",
            "body"   => "Se ha registrado un Referido",
            "data"   => ['type' => 'refferers']

        ];

        $code = SendNotifications($ConfigNotification);


        $data = array('mensagge' => "Los datos fueron registrados satisfactoriamente");
        return response()->json($data)->setStatusCode(200);

    }








    public function storeV2(Request $request){


        $affiliate = Clients::where("id_cliente", $request["affiliate"])->first();
        $request["id_affiliate"]    = $affiliate["id_cliente"];
        $request["id_user_asesora"] = $affiliate["id_user_asesora"];
        $request["id_line"]         = $affiliate["id_line"];
        $request["city"]            = null;
        $request["origen"]          = $affiliate["code_client"];

        $permitted_chars        = '0123456789abcdefghijklmnopqrstuvwxyz';
        $code                   = substr(str_shuffle($permitted_chars), 0, 4);
        $request["code_client"] = strtoupper($code);

        $data = Clients::where("identificacion", $request["identificacion"])->first();



        if($data){
            $data = array('mensagge' => "El paciente ya se encuentra en la base de datos");
            return response()->json($data)->setStatusCode(400);
        }
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



        $user_receive = DB::table("users")->where("id", $affiliate["id_user_asesora"])->first();

        $data["msg"]     = "Ingreso de Referido App, Nombre: ".$cliente["nombres"]." Cedula: ".$cliente["identificacion"];
        $data["subject"] = "Ingreso de Referido App, Nombre: ".$cliente["nombres"];
        $data["for"]     = $user_receive->email;
        $this->SendEmail($data);




        $data = array('mensagge' => "Los datos fueron registrados satisfactoriamente");
        return response()->json($data)->setStatusCode(200);

    }





    public function get($id, $name = 0, $state = 0){


        $afiliada = Clients::where("id_affiliate", $id)
                        ->where(function ($query) use ($name) {
                            if($name != "0"){
                                $query->where("clients.name", 'like', '%'.$name.'%');
                            }
                        }) ->where("clientes.state", "Afiliada")->get();

        $Agendada = Clients::where("id_affiliate", $id)->where(function ($query) use ($name) {
                            if($name != "0"){
                                $query->where("clients.name", 'like', '%'.$name.'%');
                            }
                        })->where("clientes.state", "Agendada")->get();


        $Aprobada_Descartada = Clients::where("id_affiliate", $id)->where(function ($query) use ($name) {
                            if($name != "0"){
                                $query->where("clients.name", 'like', '%'.$name.'%');
                            }
                        })->where("clientes.state", "Aprobada / Descartada")->get();


        $Asesorada_No_Agendada = Clients::where("id_affiliate", $id)->where(function ($query) use ($name) {
                            if($name != "0"){
                                $query->where("clients.name", 'like', '%'.$name.'%');
                            }
                        })->where("clientes.state", "Asesorada No Agendada")->get();




        $Demandada = Clients::where("id_affiliate", $id)->where(function ($query) use ($name) {
                            if($name != "0"){
                                $query->where("clients.name", 'like', '%'.$name.'%');
                            }
                        })->where("clientes.state", "Demandada")->get();



        $Descartada = Clients::where("id_affiliate", $id)->where(function ($query) use ($name) {
                            if($name != "0"){
                                $query->where("clients.name", 'like', '%'.$name.'%');
                            }
                        })->where("clientes.state", "Descartada")->get();



        $Llamadano_Asesorada = Clients::where("id_affiliate", $id)->where(function ($query) use ($name) {
                            if($name != "0"){
                                $query->where("clients.name", 'like', '%'.$name.'%');
                            }
                        })->where("clientes.state", "Llamada no Asesorada")->get();



        $No_Asistio = Clients::where("id_affiliate", $id)->where(function ($query) use ($name) {
                            if($name != "0"){
                                $query->where("clients.name", 'like', '%'.$name.'%');
                            }
                        })->where("clientes.state", "No Asistio")->get();


        $No_Contactada = Clients::where("id_affiliate", $id)->where(function ($query) use ($name) {
                            if($name != "0"){
                                $query->where("clients.name", 'like', '%'.$name.'%');
                            }
                        })->where("clientes.state", "No Contactada")->get();


        $No_Contesta = Clients::where("id_affiliate", $id)->where(function ($query) use ($name) {
                            if($name != "0"){
                                $query->where("clients.name", 'like', '%'.$name.'%');
                            }
                        })->where("clientes.state", "No Contesta")->get();



         $Operada = Clients::where("id_affiliate", $id)->where(function ($query) use ($name) {
                            if($name != "0"){
                                $query->where("clients.name", 'like', '%'.$name.'%');
                            }
                        })->where("clientes.state", "Operada")->get();


        $Procedimiento = Clients::where("id_affiliate", $id)->where(function ($query) use ($name) {
                            if($name != "0"){
                                $query->where("clients.name", 'like', '%'.$name.'%');
                            }
                        })->where("clientes.state", "Procedimiento")->get();


        $Programada = Clients::where("id_affiliate", $id)->where(function ($query) use ($name) {
                            if($name != "0"){
                                $query->where("clients.name", 'like', '%'.$name.'%');
                            }
                        })->where("clientes.state", "Programada")->get();


        $Re_Agendada_Valoracion = Clients::where("id_affiliate", $id)->where(function ($query) use ($name) {
                            if($name != "0"){
                                $query->where("clients.name", 'like', '%'.$name.'%');
                            }
                        })->where("clientes.state", "Re Agendada a Valoracion")->get();


        $Valorada = Clients::where("id_affiliate", $id)->where(function ($query) use ($name) {
                            if($name != "0"){
                                $query->where("clients.name", 'like', '%'.$name.'%');
                            }
                        })->where("clientes.state", "Valorada")->get();


        $Valorada_Descartada = Clients::where("id_affiliate", $id)->where(function ($query) use ($name) {
                            if($name != "0"){
                                $query->where("clients.name", 'like', '%'.$name.'%');
                            }
                        })->where("clientes.state", "Valorada / Descartada")->get();

    $Aprobada = Clients::where("id_affiliate", $id)->where(function ($query) use ($name) {
                            if($name != "0"){
                                $query->where("clients.name", 'like', '%'.$name.'%');
                            }
                        })->where("clientes.state", "Aprobada")->get();

        $data = [
            ["name" => "Afiliada", "child" => $afiliada ],
            ["name" => "Agendada", "child" => $Agendada ],
            ["name" => "Aprobada / Descartada", "child" => $Aprobada_Descartada ],
            ["name" => "Asesorada No Agendada", "child" => $Asesorada_No_Agendada ],
            ["name" => "Demandada", "child" => $Demandada ],
            ["name" => "Descartada", "child" => $Descartada ],
            ["name" => "Llamada no Asesorada", "child" => $Llamadano_Asesorada ],
            ["name" => "No Asistio", "child" => $No_Asistio ],
            ["name" => "No Contactada", "child" => $No_Contactada ],
            ["name" => "No Contesta", "child" => $No_Contesta ],
            ["name" => "Operada", "child" => $Operada ],
            ["name" => "Procedimiento", "child" => $Procedimiento ],
            ["name" => "Programada", "child" => $Programada ],
            ["name" => "Re Agendada a Valoracion", "child" => $Re_Agendada_Valoracion ],
            ["name" => "Valorada", "child" => $Valorada ],
            ["name" => "Valorada / Descartada", "child" => $Valorada_Descartada ],
            ["name" => "Aprobada", "child" => $Aprobada ]
        ];
        return response()->json($data)->setStatusCode(200);
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


}
