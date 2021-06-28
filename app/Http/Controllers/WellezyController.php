<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clients;
use App\ClientInformationAditionalSurgery;
use App\ClientClinicHistory;
use App\ClientCreditInformation;
use App\Auditoria;
use App\WellezyCotization;
class WellezyController extends Controller
{
    public function RegisterClient(Request $request){

        $request["password"] = md5($request["password"]);
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



        $data = array('email'     => $request["email"],
                      'nombres'   => $request["nombres"],
                      'line'      => $request["id_line"],
                      'id_client' => $request["id_client"],
                      'mensagge'  => "Ha iniciado sesion exitosamente"
        );


        return response()->json($data)->setStatusCode(200);
    }


    public function Auth(Request $request){

        $client = Clients::where("email", $request["email"])->where("password", md5($request["password"]))->first();

        if($client){

            $data = array('email'     => $client->email,
                          'nombres'   => $client->nombres,
                          'line'      => $client->id_line,
                          'id_client' => $client->id_cliente,
                          'mensagge'  => "Ha iniciado sesion exitosamente"
            );
            return response()->json($data)->setStatusCode(200);
        }else{
            return response()->json("Email or password was not correct")->setStatusCode(400);
        }

    }


    public function AddService(Request $request){

        WellezyCotization::create([
            "id_padre"             => $request->id_padre,
            "id_cliente"           => 0,
            "amount_surgery"       => 0,
            "decription_aditional" => "0",
            "id_service"           => $request->id_service,
            "price_aditional"      => 0
        ]);

        return response()->json("ok")->setStatusCode(200);

    }
}
