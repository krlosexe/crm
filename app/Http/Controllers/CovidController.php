<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use DB;
class CovidController extends Controller
{
    public function store(Request $request){
       
        
        $line = DB::table("lines_business")->where("id_line", $request["id_line"])->first();

        $subject = $line->nombre_line." CUESTIONARIO DE ABORDAJE AL PACIENTE : $request[nombres]";

        $for = "basededatospacientes2020@gmail.com";
 
        $request["msg"]  = "Linea: $line->nombre_line";
        $request["sintomas"] = implode(",", $request["sintomas"]);

        $request["enfermendades"] = implode(",", $request["enfermendades"]);

        Mail::send('emails.covid',$request->all(), function($msj) use($subject,$for){
            $msj->from("cardenascarlos18@gmail.com","CRM");
            $msj->subject($subject);
            $msj->to($for);
        });

        $data = array('mensagge' => "Los datos fueron registrados satisfactoriamente");    
        return response()->json($data)->setStatusCode(200);
    }


    public function Bioseguridad(Request $request){
       
        $line = DB::table("lines_business")->where("id_line", $request["id_line"])->first();

        $subject = $line->nombre_line." CUESTIONARIO CUMPLIMIENTO DE PROTOCOLO DE BIOSEGURIDAD PARA LOS TRABAJADORES : $request[nombres]";


        if($request["id_line"] == 2){
            $for = "datosclinicacep@gmail.com";
        }
    
        if($request["id_line"] == 9){
            $for = "datosclinicalaser@gmail.com";
        }
    
        if($request["id_line"] == 16){
            $for = "cardenascarlos18@gmail.com";
        }
        
 
        $request["msg"]  = "Linea: $line->nombre_line";
        $request["sintomas"] = implode(",", $request["sintomas"]);

        Mail::send('emails.bioseguridad',$request->all(), function($msj) use($subject,$for){
            $msj->from("cardenascarlos18@gmail.com","CRM");
            $msj->subject($subject);
            $msj->to($for);
        });

        $data = array('mensagge' => "Los datos fueron registrados satisfactoriamente");    
        return response()->json($data)->setStatusCode(200);
    }
    
}
