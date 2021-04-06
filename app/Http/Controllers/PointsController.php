<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class PointsController extends Controller
{
    public function RequestExchange(Request $request){

        $data = DB::table("request_exchange")->insert($request->all());
        return response()->json($data)->setStatusCode(200);
    }

    public function GetRequestExchange($id_client){

        $data = DB::table("request_exchange")->where("user_id", $id_client)->get();
        return response()->json($data)->setStatusCode(200);
    }


    public function GetRequestExchangeAll(){

        $data = DB::table("request_exchange")
                    ->selectRaw("request_exchange.*, clientes.nombres")
                    ->join("clientes", "clientes.id_cliente", "=", "request_exchange.user_id")
                    ->get();



        foreach($data as $value){
            $comissions = DB::table("comissions")
                    ->selectRaw("SUM(amount_comission) as total")
                    ->where("id_client", $value->user_id)
                    ->first();

            $request_exchange = DB::table("request_exchange")
                    ->selectRaw("SUM(amount) as total")
                    ->where("user_id", $value->user_id)
                    ->first();

            $value->balance = $comissions->total - $request_exchange->total;
        }

        
        
        return response()->json($data)->setStatusCode(200);
    }


    public function UpdateRequestExchange(Request $request, $id){
        $request_exchange = DB::table("request_exchange")->where("id", $id)->update([
            "status" => $request["status"]
        ]);

        $data = array('mensagge' => "Los datos fueron registrados satisfactoriamente");    
        return response()->json($data)->setStatusCode(200);
    }

    
}
