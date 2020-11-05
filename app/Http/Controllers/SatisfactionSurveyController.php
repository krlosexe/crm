<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\SatisfactionSurvey;

class SatisfactionSurveyController extends Controller
{
    public function store(Request $request){
        
        DB::table("satisfaction_survey")->insert($request->all());

        return response()->json("Ok")->setStatusCode(200);

    }
    public function QuestionByAdviser(Request $request)
    {
        try {

            $data = SatisfactionSurvey::with('client:id_cliente,nombres')
                ->with('user.date_person')
                ->when($request->month, function ($q) use ($request) {
                    return $q->whereRaw("month(created_prp) = $request->month");
                })
                ->get();
            return response()->json($data)->setStatusCode(200);
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
