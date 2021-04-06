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
}
