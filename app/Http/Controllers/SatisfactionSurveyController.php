<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class SatisfactionSurveyController extends Controller
{
    public function store(Request $request){
        
        DB::table("satisfaction_survey")->insert($request->all());

        return response()->json("Ok")->setStatusCode(200);

    }
}
