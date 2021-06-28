<?php

namespace App\Http\Controllers;

use App\Clients;
use App\Auditoria;
use App\ClientInformationAditionalSurgery;
use App\ClientClinicHistory;
use App\ClientCreditInformation;
use Illuminate\Http\Request;

class WhatsAppController extends Controller
{
    public function StoreClient(Request $request){

        $client = Clients::where("identificacion",  $request["identificacion"])->first();

        if($client || $request["identificacion"] == ""){
            return response()->json("El Px ya se encuentra en Base de Datos")->setStatusCode(400);
        }else{


            $permitted_chars        = '0123456789abcdefghijklmnopqrstuvwxyz';
            $code                   = substr(str_shuffle($permitted_chars), 0, 4);
            $request["code_client"] = strtoupper($code);

            $request["password"]    = md5($request["password"]);

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

            return response()->json($cliente)->setStatusCode(200);
        }

    }

    public function GetClient($jid){
        $cliente = Clients::where("jid", $jid)->first();

        if($cliente){
            return response()->json($cliente)->setStatusCode(200);
        }else{
            return response()->json(false)->setStatusCode(400);
        }

    }
}
