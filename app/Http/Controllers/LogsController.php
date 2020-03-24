<?php

namespace App\Http\Controllers;

use App\LogsSession;

use Illuminate\Http\Request;

class LogsController extends Controller
{
    public function session(Request $request){

        $adviser = 0;
        if(isset($request["adviser"])){
            $adviser = $request["adviser"];
        }

        $data = LogsSession::select("logs_sessions.*", "datos_personales.nombres as name_responsable", 
                                    "datos_personales.apellido_p as last_name_responsable")

                            ->join("datos_personales", "datos_personales.id_usuario", "=", "logs_sessions.id_user")

                            ->where(function ($query) use ($adviser) {
                                if($adviser != 0){
                                    $query->where("logs_sessions.id_user", $adviser);
                                }
                            })

                            ->orderBy("logs_sessions.id", "DESC")
                            ->get();

        return response()->json($data)->setStatusCode(200);
    }
}
