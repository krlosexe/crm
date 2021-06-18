<?php

namespace App\Http\Controllers;

use App\HistoriaClinicaPreanestesia;
use App\HistoriaClinicaQuirurgica;
use App\HistoriaClinicaHistoria;
use App\HistoriaClinicaCunsultas;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HistoriasClinicasController extends Controller
{
   

    public function SaveFormPreanestesia(Request $request){
      

        HistoriaClinicaPreanestesia::updateOrCreate(
            ["id_client" => $request["id_client"]],
            $request->all()
        );

    }

    
    public function SaveFormQuirurgica(Request $request){
   
 
        HistoriaClinicaQuirurgica::updateOrCreate(
             ["id_client" => $request["id_client"]],
             $request->all()
         );
 
     }

     
     public function SaveFormhistoria(Request $request){
    
 
       $data_father = HistoriaClinicaHistoria::updateOrCreate(
             ["id_client" => $request["id_client"]],
             $request->all()
         ); 

         $data = [];
         foreach($request["consultas_data"] as $key => $consulta){
            $data["his_cons_consulta"]  = $consulta;
            $data["his_cons_valor"]     = $request["valorconsult_data"][$key];
            $data["his_cons_resultado"] = $request["resultadoconsult_data"][$key];
            $data["id_history_cliente_historia"] = $data_father->id;

            HistoriaClinicaCunsultas::insert($data);
         }

     }

     
     public function SaveFormconsulta(Request $request){
    
 
        HistoriaClinicaConsultas::updateOrCreate(
              ["id_client" => $request["id_client"]],
              $request->all()
          );
 
      }




}
