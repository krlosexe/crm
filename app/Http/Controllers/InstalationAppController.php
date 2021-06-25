<?php

namespace App\Http\Controllers;


use DB;
use Illuminate\Http\Request;
class InstalationAppController{

    public function instalacionapp(Request $request){


        $adviser = $request["adviser"] ;
        $mes  = $request["mes"];
        $data = DB::table("auth_users_app")
                    ->selectRaw("auth_users_app.*, clientes.nombres, datos_personales.nombres as name_asesora, datos_personales.apellido_p as apellido_asesora")
                    ->join("clientes", "clientes.id_cliente", "=", "auth_users_app.id_user")
                    ->join("users", "users.id", "=", "clientes.id_user_asesora")
                    ->join("datos_personales", "datos_personales.id_usuario", "=", "users.id")

                    ->where(function ($query) use ($adviser) {
                        if($adviser != 0){
                            $query->where("clientes.id_user_asesora", $adviser);
                        }
                    })
                    ->where(function ($query) use ($mes) {
                        if($mes != 0){
                            $query->whereRaw("MONTH(auth_users_app.date_auth) = ".$mes."");
                            $query->whereRaw("YEAR(auth_users_app.date_auth) = ".date("Y")."");
                        }
                    })
                    
                    ->get();

        return response()->json($data)->setStatusCode(200);


    }


    
}