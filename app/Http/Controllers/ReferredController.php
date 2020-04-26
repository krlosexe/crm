<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clients;
use App\AuthUsersApp;
use App\Auditoria;
use App\ClientInformationAditionalSurgery;
use App\ClientClinicHistory;
use App\ClientCreditInformation;
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



        $data_user = AuthUsersApp::where("id_user", $request["id_user_asesora"])->first();


        $ConfigNotification = [
            "tokens" => [$data_user["token_notifications"]],
    
            "tittle" => "PRP",
            "body"   => "Se ah registrado un Referido",
            "data"   => ['type' => 'refferers']
    
          ];
    
        $code = SendNotifications($ConfigNotification);



        $data = array('mensagge' => "Los datos fueron registrados satisfactoriamente");    
        return response()->json($data)->setStatusCode(200);
        
    }
}
