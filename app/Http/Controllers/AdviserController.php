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
        $data = Clients::where($where)->get();
        return response()->json($data)->setStatusCode(200);
    }
}
