<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\FormCreditDatosGenerales;
use App\FormCreditConyuge;
use App\FormCreditActividadEconomicaAdress;
use App\FormCreditIngresosEgresos;
use App\FormCreditProcedure;
use App\FormCreditRelacionActivos;
use App\FormCreditReferencias;

use Mail;

use App\User;
use App\FormAutorizationStudioCredit;
class FormCreditController extends Controller
{
    public function store(Request $request){

        $form = FormCreditDatosGenerales::create($request->all());

        $request["id_form"] = $form->id;

        FormCreditConyuge::create($request->all());
        FormCreditActividadEconomicaAdress::create($request->all());
        FormCreditIngresosEgresos::create($request->all());

        if(isset($request["procedure"])){

            $procedimientos = $request["procedure"];

            foreach($procedimientos as $value){
                $array["procedure"] = $value;
                $array["id_form"]   = $request["id_form"];

                FormCreditProcedure::create($array);
            }

        }
        

        FormCreditRelacionActivos::create($request->all());
        FormCreditReferencias::create($request->all());
        return response()->json("Ok")->setStatusCode(200);
    }


    public function storeAutorization(Request $request){

        FormAutorizationStudioCredit::create($request->all());


        $users = User::join("users_line_business", "users_line_business.id_user" , "=", "users.id")
                        ->where("users_line_business.id_line", $request["id_line"])
                        ->get();

        
        
        foreach($users as $user){
           
            $subject = "AUTORIZACION PARA CONSULTA Y REPORTE A CENTRALES DE BANCOS DE DATOS";
            //$for = "cardenascarlos18@gmail.com";
            $for = $user["email"];

            $request["msg"]  = "Un Paciente dio Autroizacion para Consulta y Reporte a Centrales de Bancos de Datos";

           Mail::send('emails.forms_authorization',$request->all(), function($msj) use($subject,$for){
                $msj->from("cardenascarlos18@gmail.com","CRM");
                $msj->subject($subject);
                $msj->to($for);
            });

        }



        return response()->json("Ok")->setStatusCode(200);
        
    }
}
