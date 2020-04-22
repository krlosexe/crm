<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clients;
class AdviserController extends Controller
{
    public function GetAffiliates($id_adviser){
       
        $where = array(
            "id_user_asesora" => $id_adviser,
            "prp"             => "Si"
        );
        $data = Clients::where($where)
                        ->select("clientes.*", "users.img_profile as avatar")
                        ->join("users", "users.id_client", "clientes.id_cliente")
                        ->get();
        return response()->json($data)->setStatusCode(200);
    }


    public function GetTotalRefferers($id_adviser){

       
        $where = array(
            "clientes.id_user_asesora" => $id_adviser,
            "clientes.origen"          => "Referido PRP",
        );


        $data = Clients::where($where)
                        ->select("clientes.*", "cl2.nombres as name_affiliate", "client_information_aditional_surgery.name_surgery as interes","auditoria.fec_regins")
                        ->join("client_information_aditional_surgery", "client_information_aditional_surgery.id_client", "=", "clientes.id_cliente")
                        ->join("auditoria", "auditoria.cod_reg", "=", "clientes.id_cliente")
                        ->join("clientes as cl2", "cl2.id_cliente", "=", "clientes.id_affiliate")
                        ->whereNotNull('clientes.id_affiliate')
                        ->where("auditoria.tabla", "clientes")
                        ->get();

        return response()->json($data)->setStatusCode(200);

    }   
}
