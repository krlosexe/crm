<?php

namespace App\Http\Controllers;

use App\HistoriaClinicaPreanestesia;
use App\HistoriaClinicaQuirurgica;
use App\HistoriaClinicaHistoria;
use App\HistoriaClinicaCunsultas;
use App\HistoriaClinicaIncapacidad;
use App\HistoriaClinicaRemision;
use App\HistoriaClinicaServicios;


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

         if(isset($request["consultas_data"])){
            $consul_data = [];
            foreach($request["consultas_data"] as $key => $consulta){
               $consul_data["his_cons_consulta"]  = $consulta;
               $consul_data["his_cons_valor"]     = $request["valorconsult_data"][$key];
               $consul_data["his_cons_resultado"] = $request["resultadoconsult_data"][$key];
               $consul_data["id_history_cliente_historia"] = $data_father->id;
   
               HistoriaClinicaCunsultas::insert($consul_data);
            }
         }
        
         if(isset($request["incapacidad_data"])){
            $incapacidad_data = [];
            foreach($request["incapacidad_data"] as $key => $incapacidad){
               $incapacidad_data["his_inc_motivo"] = $incapacidad;
               $incapacidad_data["his_inc_tipo"]     = $request["his_inc_tipo"][$key];
               $incapacidad_data["his_inc_dias"] = $request["his_inc_dias"][$key];
               $incapacidad_data["his_inc_fecha"] = $request["his_inc_fecha"][$key];
               $incapacidad_data["id_history_cliente_historia"] = $data_father->id;
   
               HistoriaClinicaIncapacidad::insert($incapacidad_data);

   
            }
         }


         if(isset($request["remision_data"])){
            $remision_data = [];
            foreach($request["remision_data"] as $key => $remision){
               $remision_data["his_rem_nombre"] = $remision;
               $remision_data["his_rem_remision"] = $request["his_rem_remision"][$key];
               $remision_data["his_rem_fecha"] = $request["his_rem_fecha"][$key];
               $remision_data["id_history_cliente_historia"] = $data_father->id;
   
               HistoriaClinicaRemision::insert($remision_data);

   
            }
         }


         if(isset($request["nombre_data"])){
            $servicios_data = [];
            foreach($request["nombre_data"] as $key => $nombre){
               $servicios_data["his_ser_nombre"] = $nombre;
               $servicios_data["his_ser_observaciones"] = $request["his_ser_observaciones"][$key];
               $servicios_data["his_ser_cantidad"] = $request["his_ser_cantidad"][$key];
               $servicios_data["his_ser_fecha"] = $request["his_ser_fecha"][$key];
               $servicios_data["id_history_cliente_historia"] = $data_father->id;
   
               HistoriaClinicaServicios::insert($servicios_data);

   
            }
         }
        
     }




}
