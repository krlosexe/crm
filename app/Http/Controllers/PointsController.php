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
}
