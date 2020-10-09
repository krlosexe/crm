<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function SaveSahareUser(Request $request){

        $data = DB::table("shared_post")->insert($request->all());
        return response()->json($data)->setStatusCode(200);
    }
}
