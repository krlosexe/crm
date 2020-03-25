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
}
