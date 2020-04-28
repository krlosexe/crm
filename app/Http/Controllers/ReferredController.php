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
class ReferredController extends Controller
{
    public function store(Request $request){
        

        $affiliate = Clients::where("code_client", $request["code"])->first();

        $request["id_affiliate"]    = $affiliate["id_cliente"];
        $request["id_user_asesora"] = $affiliate["id_user_asesora"];

        $permitted_chars        = '0123456789abcdefghijklmnopqrstuvwxyz';
        $code                   = substr(str_shuffle($permitted_chars), 0, 4);
        $request["code_client"] = strtoupper($code);


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
            "body"   => "Se ah registrado un Referido",
            "data"   => ['type' => 'refferers']
    
        ];
    
        $code = SendNotifications($ConfigNotification);







       $User =  User::create([
            "email"       => $request["email"],
            "password"    => Hash::make("123456789"),
            "id_rol"      => 19,
            "id_client"   => $cliente["id_cliente"]
        ]);





        $datos_personales                   = new datosPersonaesModel;
        $datos_personales->nombres          = $request["nombres"];
        $datos_personales->apellido_p       = "afasfasf";
        $datos_personales->apellido_m       = "afasfa";
        $datos_personales->n_cedula         = "12412124";
        $datos_personales->fecha_nacimiento = null;
        $datos_personales->telefono         = null;
        $datos_personales->direccion        = null;
        $datos_personales->id_usuario       = $User->id;
        $datos_personales->save();


        $data = array('mensagge' => "Los datos fueron registrados satisfactoriamente");    
        return response()->json($data)->setStatusCode(200);
        
    }
}
