<?php


namespace App\Http\Controllers;

use App\Tasks;
use App\Queries;
use App\Surgeries;
use App\Valuations;
use App\Preanesthesia;
use App\RevisionAppointment;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    function getTask($today = false){
        
        $data = Tasks::select("tasks.id_tasks", "tasks.issue as title", "tasks.fecha as start", "tasks.time as time", "tasks.observaciones", "datos_personales.nombres", "datos_personales.apellido_p", "user_responsable.img_profile")
                           
                            ->join("datos_personales", "datos_personales.id_usuario", "=", "tasks.responsable")
                            ->join("users as user_responsable", "user_responsable.id", "=", "tasks.responsable")

                            ->with("followers")

                            ->where(function ($query) use ($today) {
                                if($today != false){
                                    $query->where("tasks.fecha", $today);
                                }
                            })
                            

                            ->join("auditoria", "auditoria.cod_reg", "=", "tasks.id_tasks")
                            ->where("auditoria.tabla", "tasks")
                            ->where("auditoria.status", "!=", 0)
                            
                            ->get();

        foreach($data as $key => $value){
            $value["fecha"] = $value["start"];
            $value["start"] = $value["start"]."T".$value["time"];
           
        }
        return response()->json($data)->setStatusCode(200);
    }



    function getQueries($today = false){
        
        $data = Queries::select("queries.id_queries","queries.fecha as start", "queries.time as time",
                                "queries.observaciones", "clientes.nombres as name_client", "clientes.apellidos as last_name_client", "users.img_profile", 
                                "datos_personales.nombres", "datos_personales.apellido_p", )
                            
                            ->join("clientes", "clientes.id_cliente", "=", "queries.id_cliente")
                            ->join("users", "users.id", "=", "clientes.id_user_asesora")
                            ->join("datos_personales", "datos_personales.id_usuario", "=", "clientes.id_user_asesora")

                            ->join("auditoria", "auditoria.cod_reg", "=", "queries.id_queries")

                            ->where(function ($query) use ($today) {
                                if($today != false){
                                    $query->where("queries.fecha", $today);
                                }
                            })


                            ->where("auditoria.tabla", "queries")
                            ->where("auditoria.status", "!=", 0)
                            
                            ->get();

        foreach($data as $key => $value){
            $value["fecha"] = $value["start"];
            $value["start"] = $value["start"]."T".$value["time"];

            $value["title"] = "Consulta: ".$value["name_client"]." ".$value["last_name_client"];
           
        }
        return response()->json($data)->setStatusCode(200);
    }



    function getValuations($today = false){
        
        $data = Valuations::select("valuations.id_valuations","valuations.fecha as start", "valuations.time as time", "valuations.time_end as time_end",
                                   "valuations.observaciones", "clientes.nombres as name_client", "clientes.apellidos as last_name_client", "users.img_profile", 
                                   "datos_personales.nombres", "datos_personales.apellido_p", )
                            
                                ->join("clientes", "clientes.id_cliente", "=", "valuations.id_cliente")
                                ->join("users", "users.id", "=", "clientes.id_user_asesora")
                                ->join("datos_personales", "datos_personales.id_usuario", "=", "clientes.id_user_asesora")

                                ->join("auditoria", "auditoria.cod_reg", "=", "valuations.id_valuations")

                                ->where(function ($query) use ($today) {
                                    if($today != false){
                                        $query->where("valuations.fecha", $today);
                                    }
                                })

                                ->where("auditoria.tabla", "valuations")
                                ->where("auditoria.status", "!=", 0)
                            
                                ->get();

        foreach($data as $key => $value){
            $value["fecha"] = $value["start"];
            $value["start"] = $value["start"]."T".$value["time"];
            $value["end"]   = $value["start"]."T".$value["time_end"];

            $value["title"] = "VLR: ".$value["name_client"]." ".$value["last_name_client"];
           
        }
        return response()->json($data)->setStatusCode(200);
    }









    function Preanesthesia($today = false){
        
        $data = Preanesthesia::select("preanesthesias.id_preanesthesias","preanesthesias.fecha as start", "preanesthesias.time as time",  "preanesthesias.time_end as time_end",
                                   "preanesthesias.observaciones", "clientes.nombres as name_client", "clientes.apellidos as last_name_client", "users.img_profile", 
                                   "datos_personales.nombres", "datos_personales.apellido_p", )
                            
                                    ->join("clientes", "clientes.id_cliente", "=", "preanesthesias.id_cliente")
                                    ->join("users", "users.id", "=", "clientes.id_user_asesora")
                                    ->join("datos_personales", "datos_personales.id_usuario", "=", "clientes.id_user_asesora")

                                    ->join("auditoria", "auditoria.cod_reg", "=", "preanesthesias.id_preanesthesias")

                                    ->where(function ($query) use ($today) {
                                        if($today != false){
                                            $query->where("preanesthesias.fecha", $today);
                                        }
                                    })

                                    ->where("auditoria.tabla", "preanesthesias")
                                    ->where("auditoria.status", "!=", 0)
                                
                                    ->get();

        foreach($data as $key => $value){
            $value["fecha"] = $value["start"];
            $value["start"] = $value["start"]."T".$value["time"];

            $prefix = "Pre Antestesia: ";
            $value["title"] =  $prefix.$value["name_client"]." ".$value["last_name_client"];
           
        }
        return response()->json($data)->setStatusCode(200);
    }




    function Surgeries($today = false){
        
        $data = Surgeries::select("surgeries.id_surgeries","surgeries.fecha as start", "surgeries.time as time", "surgeries.time_end as time_end",
                                   "surgeries.observaciones", "surgeries.attempt", "surgeries.type", "clientes.nombres as name_client", "clientes.apellidos as last_name_client", "users.img_profile", 
                                   "datos_personales.nombres", "datos_personales.apellido_p", )
                            
                                ->join("clientes", "clientes.id_cliente", "=", "surgeries.id_cliente")
                                ->join("users", "users.id", "=", "clientes.id_user_asesora")
                                ->join("datos_personales", "datos_personales.id_usuario", "=", "clientes.id_user_asesora")

                                ->join("auditoria", "auditoria.cod_reg", "=", "surgeries.id_surgeries")

                                ->where(function ($query) use ($today) {
                                    if($today != false){
                                        $query->where("surgeries.fecha", $today);
                                    }
                                })


                                ->where("auditoria.tabla", "surgeries")
                                ->where("auditoria.status", "!=", 0)
                            
                                ->get();

        foreach($data as $key => $value){
            $value["fecha"] = $value["start"];
            $value["start"] = $value["start"]."T".$value["time"];


            $type = $value["type"] == "Financiado" ? "FX " : "";


            $prefix = $value["attempt"] == 1 ? "FT: " : "CX: ";



            $value["title"] =  $prefix.$type.$value["name_client"]." ".$value["last_name_client"];

            $value["attempt"] == 1 ? $value["color"] = "#FF2A55" : '';
           
        }
        return response()->json($data)->setStatusCode(200);
    }

    function Revision($today = false){

        $data = RevisionAppointment::select("revision_appointment.id_revision", "appointments_agenda.fecha as start", "appointments_agenda.time as time","appointments_agenda.time_end as time_end",
                                            "appointments_agenda.descripcion as observaciones", "clientes.nombres as name_client", "clientes.apellidos as last_name_client", "users.img_profile", 
                                            "datos_personales.nombres", "datos_personales.apellido_p"
                                           )
                                    ->join("appointments_agenda", "appointments_agenda.id_revision", "=", "revision_appointment.id_revision")
                                    ->join("clientes", "clientes.id_cliente", "=", "revision_appointment.id_paciente")
                                    ->join("users", "users.id", "=", "clientes.id_user_asesora")
                                    ->join("datos_personales", "datos_personales.id_usuario", "=", "clientes.id_user_asesora")

                                    ->join("auditoria", "auditoria.cod_reg", "=", "revision_appointment.id_revision")

                                    ->where(function ($query) use ($today) {
                                        if($today != false){
                                            $query->where("appointments_agenda.fecha", $today);
                                        }
                                    })


                                    ->where("auditoria.tabla", "revision_appointment")
                                    ->where("auditoria.status", "!=", 0)
                                    ->get();



        foreach($data as $key => $value){

            $value["fecha"] = $value["start"];
            $value["start"] = $value["start"]."T".$value["time"];

            $value["title"] = "Revision: ".$value["name_client"]." ".$value["last_name_client"];
            
        }

        return response()->json($data)->setStatusCode(200);
    }




    public function Today(Request $request)
    {
        if ($this->VerifyLogin($request["id_user"],$request["token"])){

            $data["tasks"]          = $this->getTask(date("Y-m-d"))->original;
            $data["queries"]        = $this->getQueries(date("Y-m-d"))->original;
            $data["valuations"]     = $this->getValuations(date("Y-m-d"))->original;
            $data["surgeries"]      = $this->Surgeries(date("Y-m-d"))->original;
            $data["revision"]       = $this->Revision(date("Y-m-d"))->original;
            $data["preanestesia"]   = $this->Preanesthesia(date("Y-m-d"))->original;
            

            return response()->json($data)->setStatusCode(200);

        }else{
            return response()->json("No esta autorizado")->setStatusCode(400);
        }
    }



}
