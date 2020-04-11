<?php

namespace App\Http\Controllers;

use App\Comments;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Request $request, $tabla){


        $array = [];
        $array["id_event"]   = $request["id"];
        $array["table"]      = $tabla;
        $array["id_user"]    = $request["id_user"];
        $array["comment"]    = $request["comment"];
        Comments::insert($array);


        return response()->json("Ok")->setStatusCode(200);

    }
}
