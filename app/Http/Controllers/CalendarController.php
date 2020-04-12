<?php


namespace App\Http\Controllers;

use App\Tasks;
use App\ClientsTasks;
use App\Queries;
use App\Surgeries;
use App\Valuations;
use App\Preanesthesia;
use App\RevisionAppointment;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    function getTask(Request $request, $today = false){
        

        $rol     = $request["rol"];
        $id_user = $request["id_user"];


        if($request["asesoras"] != 0){
            $asesoras = explode(",", $request["asesoras"]);
        }else{
            $asesoras = 0;
        }
        
        
        $data = Tasks::select("tasks.id_tasks", "tasks.issue as title", "tasks.fecha as start", "tasks.time as time", 
                              "tasks.observaciones", "datos_personales.nombres", "datos_personales.apellido_p", "user_responsable.img_profile", "tasks.responsable")
                           
                            ->join("datos_personales", "datos_personales.id_usuario", "=", "tasks.responsable")
                            ->join("users as user_responsable", "user_responsable.id", "=", "tasks.responsable")

                            ->with("followers")

                            ->where(function ($query) use ($today) {
                                if($today != false){
                                    $query->where("tasks.fecha", $today);
                                }
                            })

                            ->where(function ($query) use ($asesoras) {
                                
                                if($asesoras != 0){
                                    $query->whereIn("tasks.responsable", $asesoras);
                                }
                            }) 



                            ->join("auditoria", "auditoria.cod_reg", "=", "tasks.id_tasks")
                            ->where("auditoria.tabla", "tasks")

                            ->where("tasks.status_task", "!=", "Finalizada")


                            ->where("auditoria.status", "!=", 0)
                            
                            ->get();


            if($rol == "Asesor"){


                $tasks_follow =  Tasks::select("tasks.id_tasks", "tasks.issue as title", "tasks.fecha as start", 
                                               "tasks.time as time", "tasks.observaciones", "datos_personales.nombres",
                                                "datos_personales.apellido_p", "user_responsable.img_profile", "tasks.responsable")
                           
                                    ->join("datos_personales", "datos_personales.id_usuario", "=", "tasks.responsable")
                                    ->join("users as user_responsable", "user_responsable.id", "=", "tasks.responsable")
                                    ->join("tasks_followers", "tasks_followers.id_task", "=", "tasks.id_tasks")

                                    ->with("followers")

                                    ->where(function ($query) use ($today) {
                                        if($today != false){
                                            $query->where("tasks.fecha", $today);
                                        }
                                    })


                                    ->where("tasks_followers.id_follower", $id_user)

                                    ->join("auditoria", "auditoria.cod_reg", "=", "tasks.id_tasks")
                                    ->where("auditoria.tabla", "tasks")
                                    ->where("auditoria.status", "!=", 0)
                                    
                                    ->get();

         


                foreach($tasks_follow as $key => $value){
                    $data[] = $value;
                }
            }


        foreach($data as $key => $value){
            $value["fecha"] = $value["start"];
            $value["start"] = $value["start"]."T".$value["time"];
            $value["task"]  = true;
        }
        return response()->json($data)->setStatusCode(200);
    }







    function getTaskClients(Request $request, $today = false){
        

        $rol     = $request["rol"];
        $id_user = $request["id_user"];


        if($request["asesoras"] != 0){
            $asesoras = explode(",", $request["asesoras"]);
        }else{
            $asesoras = 0;
        }
        
        
        $data = ClientsTasks::select("clients_tasks.id_clients_tasks", "clients_tasks.issue as title", 
                                     "clients_tasks.fecha as start", "clients_tasks.time as time", "datos_personales.nombres",
                                     "datos_personales.apellido_p", "user_responsable.img_profile",
                                     "clientes.nombres as name_client", "clientes.apellidos as last_name_client", "clients_tasks.responsable"
                                    )

                            ->join("clientes", "clientes.id_cliente", "=", "clients_tasks.id_client", "left")
                            ->join("datos_personales", "datos_personales.id_usuario", "=", "clients_tasks.responsable", "left")
                            ->join("users as user_responsable", "user_responsable.id", "=", "clients_tasks.responsable", "left")

                            ->with("followers")

                            //->with("comments")



                            ->where(function ($query) use ($today) {
                                if($today != false){
                                    $query->where("clients_tasks.fecha", $today);
                                }
                            })

                            ->where(function ($query) use ($asesoras) {
                                
                                if($asesoras != 0){
                                    $query->whereIn("clients_tasks.responsable", $asesoras);
                                }
                            }) 



                            ->join("auditoria", "auditoria.cod_reg", "=", "clients_tasks.id_clients_tasks")
                            ->where("auditoria.tabla", "clients_tasks")

                            ->where("clients_tasks.status_task", "!=", "Finalizada")


                            ->where("auditoria.status", "!=", 0)
                            
                            ->get();


            if($rol == "Asesor" && $asesoras == 0){


                $tasks_follow =  ClientsTasks::select("clients_tasks.id_clients_tasks", "clients_tasks.issue as title", "clients_tasks.fecha as start", 
                                                      "clients_tasks.time as time",  "datos_personales.nombres", "datos_personales.apellido_p",
                                                      "user_responsable.img_profile", "clientes.nombres as name_client", 
                                                      "clientes.apellidos as last_name_client", "clients_tasks.responsable")

                                    ->join("clientes", "clientes.id_cliente", "=", "clients_tasks.id_client", "left")
                                    ->join("datos_personales", "datos_personales.id_usuario", "=", "clients_tasks.responsable", "left")
                                    ->join("users as user_responsable", "user_responsable.id", "=", "clients_tasks.responsable", "left")
                                    ->join("clients_tasks_followers", "clients_tasks_followers.id_task", "=", "clients_tasks.id_clients_tasks", "left")

                                    ->with("followers")

                                    ->with("comments")


                                    ->where(function ($query) use ($today) {
                                        if($today != false){
                                            $query->where("clients_tasks.fecha", $today);
                                        }
                                    })

                                    ->where("clients_tasks_followers.id_follower", $id_user)

                                    ->join("auditoria", "auditoria.cod_reg", "=", "clients_tasks.id_clients_tasks")
                                    ->where("auditoria.tabla", "clients_tasks")
                                    ->where("auditoria.status", "!=", 0)
                                    
                                    ->get();

         


                foreach($tasks_follow as $key => $value){
                    $data[] = $value;
                }
            }


        foreach($data as $key => $value){
            $value["fecha"]       = $value["start"];
            $value["start"]       = $value["start"]."T".$value["time"];
            $value["task_cient"]  = true;
           
        }
        return response()->json($data)->setStatusCode(200);
    }





    function getQueries($today = false){
        
        $data = Queries::select("queries.id_queries","queries.fecha as start", "queries.time as time",
                                "queries.observaciones", "clientes.nombres as name_client", "clientes.apellidos as last_name_client", "users.img_profile", 
                                "datos_personales.nombres", "datos_personales.apellido_p")
                            
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



    function getValuations(Request $request, $today = false){
        
        $rol       = $request["rol"];
        $id_user   = $request["id_user"];
        $id_clinic = $request["clinic"];


        if($request["asesoras"] != 0){
            $asesoras = explode(",", $request["asesoras"]);
        }else{
            $asesoras = 0;
        }



        $data = Valuations::select("valuations.id_valuations","valuations.fecha as start", "valuations.time as time", "valuations.time_end as time_end",
                                   "valuations.observaciones", "clientes.nombres as name_client", "clientes.apellidos as last_name_client", "users.img_profile", 
                                   "datos_personales.nombres", "datos_personales.apellido_p", "clinic.nombre as name_clinic",
                                   "dpa.nombres as name_asesora", "dpa.apellido_p as apellido_asesora", "auditoria.usr_regins"
                                )


                                ->join("auditoria", "auditoria.cod_reg", "=", "valuations.id_valuations")

                                ->join("clientes", "clientes.id_cliente", "=", "valuations.id_cliente")
                                ->join("clinic", "clinic.id_clinic", "=", "valuations.clinic", "left")
                                ->join("users", "users.id", "=", "auditoria.usr_regins")
                                ->join("datos_personales", "datos_personales.id_usuario", "=", "auditoria.usr_regins")
                                ->join("datos_personales AS dpa", "dpa.id_usuario", "=", "valuations.id_asesora_valoracion", "left")
                               

                                ->where(function ($query) use ($today) {
                                    if($today != false){
                                        $query->where("valuations.fecha", $today);
                                    }
                                })

                                ->where(function ($query) use ($id_clinic) {
                                    if($id_clinic != "All"){
                                        $query->where("valuations.clinic", $id_clinic);
                                    }
                                })
                                

                                ->where(function ($query) use ($asesoras) {
                                    if($asesoras != 0){
                                        $query->whereIn("auditoria.usr_regins", $asesoras);
                                    }
                                }) 


                                // ->where(function ($query) use ($rol, $id_user) {
                                //     if($rol == "Asesor"){
                                //         $query->where("clientes.id_user_asesora", $id_user);
                                //     }
                                // })
                                

                                ->with("comments")


                                
                                ->where("auditoria.tabla", "valuations")
                                ->where("valuations.status", 0)
                                ->where("auditoria.status", "!=", 0)
                            
                                ->get();



        if($asesoras != 0){
            $data_asesora = Valuations::select("valuations.id_valuations","valuations.fecha as start", "valuations.time as time", "valuations.time_end as time_end",
                                        "valuations.observaciones", "clientes.nombres as name_client", "clientes.apellidos as last_name_client", "users.img_profile", 
                                        "datos_personales.nombres", "datos_personales.apellido_p", "clinic.nombre as name_clinic",
                                        "dpa.nombres as name_asesora", "dpa.apellido_p as apellido_asesora"
                                    )
                                        

                                        ->join("auditoria", "auditoria.cod_reg", "=", "valuations.id_valuations")
                                        ->join("clientes", "clientes.id_cliente", "=", "valuations.id_cliente")
                                        ->join("clinic", "clinic.id_clinic", "=", "valuations.clinic", "left")
                                        ->join("users", "users.id", "=", "auditoria.usr_regins")
                                        ->join("datos_personales", "datos_personales.id_usuario", "=", "auditoria.usr_regins")
                                        ->join("datos_personales AS dpa", "dpa.id_usuario", "=", "valuations.id_asesora_valoracion", "left")
                                       

                                        ->where(function ($query) use ($today) {
                                            if($today != false){
                                                $query->where("valuations.fecha", $today);
                                            }
                                        })

                                        ->where(function ($query) use ($id_clinic) {
                                            if($id_clinic != "All"){
                                                $query->where("valuations.clinic", $id_clinic);
                                            }
                                        })
                                        

                                        ->where(function ($query) use ($asesoras) {
                                            if($asesoras != 0){
                                                $query->whereIn("valuations.id_asesora_valoracion", $asesoras);
                                            }
                                        }) 


                                        ->with("comments")

                                        
                                        ->where("auditoria.tabla", "valuations")
                                        ->where("valuations.status", 0)
                                        ->where("auditoria.status", "!=", 0)
                                    
                                        ->get();

            foreach($data_asesora as $key => $value){
                $data[] = $value;
            }
        }



        $depositeArray = json_encode($data);
        $depositeArray = json_decode($depositeArray,true);
        $depositeArrayNew = $this->Json_Super_Unique($depositeArray,'id_valuations');
        $depositeArray = $depositeArrayNew ;

        $array = [];
        foreach($depositeArray as $key => $value){

            
            $value["fecha"] = $value["start"];
            $value["start"] = $value["start"]."T".$value["time"];
            $value["end"]   = $value["start"]."T".$value["time_end"];

            $value["title"] = "VLR: ".$value["name_client"]." ".$value["last_name_client"];
            $value["valuations"] = true;
            $array[] = $value;
        }
        return response()->json($array)->setStatusCode(200);

        
    }





    



    function Preanesthesia(Request $request, $today = false){
       
        $rol       = $request["rol"];
        $id_user   = $request["id_user"];
        $id_clinic = $request["clinic"];


        if($request["asesoras"] != 0){
            $asesoras = explode(",", $request["asesoras"]);
        }else{
            $asesoras = 0;
        }


        $data = Preanesthesia::select("preanesthesias.id_preanesthesias","preanesthesias.fecha as start", "preanesthesias.time as time",  "preanesthesias.time_end as time_end",
                                   "preanesthesias.observaciones", "clientes.nombres as name_client", "clientes.apellidos as last_name_client", "users.img_profile", 
                                   "datos_personales.nombres", "datos_personales.apellido_p", "clinic.nombre as name_clinic", "auditoria.usr_regins")

                                    ->join("auditoria", "auditoria.cod_reg", "=", "preanesthesias.id_preanesthesias")
                                    ->join("clientes", "clientes.id_cliente", "=", "preanesthesias.id_cliente")
                                    ->join("users", "users.id", "=", "auditoria.usr_regins")
                                    ->join("clinic", "clinic.id_clinic", "=", "preanesthesias.clinic", "left")
                                    ->join("datos_personales", "datos_personales.id_usuario", "=", "auditoria.usr_regins")

                                    ->where(function ($query) use ($today) {
                                        if($today != false){
                                            $query->where("preanesthesias.fecha", $today);
                                        }
                                    })

                                    ->where(function ($query) use ($id_clinic) {
                                        if($id_clinic != "All"){
                                            $query->where("preanesthesias.clinic", $id_clinic);
                                        }
                                    })


                                    ->where(function ($query) use ($asesoras) {
                                        if($asesoras != 0){
                                            $query->whereIn("clientes.id_user_asesora", $asesoras);
                                        }
                                    }) 


                                    // ->where(function ($query) use ($rol, $id_user) {
                                    //     if($rol == "Asesor"){
                                    //         $query->where("clientes.id_user_asesora", $id_user);
                                    //     }
                                    // })

                                    ->where("preanesthesias.status_surgeries", 0)
                                    ->where("auditoria.tabla", "preanesthesias")
                                    ->where("auditoria.status", "!=", 0)
                                
                                    ->get();

        foreach($data as $key => $value){
            $value["fecha"] = $value["start"];
            $value["start"] = $value["start"]."T"."00:00:00";

            $prefix = "Pre Antestesia: ";
            $value["title"] =  $prefix.$value["name_client"]." ".$value["last_name_client"];
            $value["preanesthesias"] = true;
        }
        return response()->json($data)->setStatusCode(200);
    }




    function Surgeries(Request $request, $today = false){
        
        $rol     = $request["rol"];
        $id_user = $request["id_user"];
        $id_clinic = $request["clinic"];


        if($request["asesoras"] != 0){
            $asesoras = explode(",", $request["asesoras"]);
        }else{
            $asesoras = 0;
        }


        $data = Surgeries::select("surgeries.id_surgeries","surgeries.fecha as start", "surgeries.time as time", "surgeries.time_end as time_end",
                                   "surgeries.observaciones", "surgeries.attempt", "surgeries.type", "clientes.nombres as name_client", "clientes.apellidos as last_name_client", "users.img_profile", 
                                   "datos_personales.nombres", "datos_personales.apellido_p", "clinic.nombre as name_clinic", "auditoria.usr_regins")

                                ->join("auditoria", "auditoria.cod_reg", "=", "surgeries.id_surgeries")
                                ->join("clientes", "clientes.id_cliente", "=", "surgeries.id_cliente")
                                ->join("clinic", "clinic.id_clinic", "=", "surgeries.clinic", "left")
                                ->join("users", "users.id", "=", "auditoria.usr_regins")
                                ->join("datos_personales", "datos_personales.id_usuario", "=", "auditoria.usr_regins")

                                ->where(function ($query) use ($today) {
                                    if($today != false){
                                        $query->where("surgeries.fecha", $today);
                                    }
                                })
                                
                                ->where(function ($query) use ($id_clinic) {
                                    if($id_clinic != "All"){
                                        $query->where("surgeries.clinic", $id_clinic);
                                    }
                                })


                                ->where(function ($query) use ($asesoras) {
                                    if($asesoras != 0){
                                        $query->whereIn("auditoria.usr_regins", $asesoras);
                                    }
                                }) 

                                // ->where(function ($query) use ($rol, $id_user) {
                                //     if($rol == "Asesor"){
                                //         $query->where("clientes.id_user_asesora", $id_user);
                                //     }
                                // })

                                ->where("surgeries.status_surgeries", 0)
                                ->where("auditoria.tabla", "surgeries")
                                ->where("auditoria.status", "!=", 0)
                            
                                ->get();

        foreach($data as $key => $value){
            $value["fecha"] = $value["start"];
            $value["start"] = $value["start"]."T"."00:00:00";


            $type = $value["type"] == "Financiado" ? "FX " : "";


            $prefix = $value["attempt"] == 1 ? "FT: " : "CX: ";



            $value["title"] =  $prefix.$type.$value["name_client"]." ".$value["last_name_client"];

            $value["attempt"] == 1 ? $value["color"] = "#FF2A55" : '';

            $value["surgeries"] = true;
           
        }
        return response()->json($data)->setStatusCode(200);
    }

    function Revision(Request $request, $today = false){

        $rol     = $request["rol"];
        $id_user = $request["id_user"];
        $id_clinic = $request["clinic"];



        if($request["asesoras"] != 0){
            $asesoras = explode(",", $request["asesoras"]);
        }else{
            $asesoras = 0;
        }

        $data = RevisionAppointment::select("revision_appointment.id_revision", "appointments_agenda.fecha as start", "appointments_agenda.time as time","appointments_agenda.time_end as time_end",
                                            "appointments_agenda.descripcion as observaciones", "clientes.nombres as name_client", "clientes.apellidos as last_name_client", "users.img_profile", 
                                            "datos_personales.nombres", "datos_personales.apellido_p", "clinic.nombre as name_clinic"
                                           )

                                    ->join("auditoria", "auditoria.cod_reg", "=", "revision_appointment.id_revision")
                                    ->join("appointments_agenda", "appointments_agenda.id_revision", "=", "revision_appointment.id_revision")
                                    ->join("clientes", "clientes.id_cliente", "=", "revision_appointment.id_paciente")
                                    ->join("clinic", "clinic.id_clinic", "=", "revision_appointment.clinica", "left")
                                    ->join("users", "users.id", "=", "auditoria.usr_regins")
                                    ->join("datos_personales", "datos_personales.id_usuario", "=", "auditoria.usr_regins")

                                    

                                    ->where(function ($query) use ($today) {
                                        if($today != false){
                                            $query->where("appointments_agenda.fecha", $today);
                                        }
                                    })



                                    ->where(function ($query) use ($id_clinic) {
                                        if($id_clinic != "All"){
                                            $query->where("revision_appointment.clinica", $id_clinic);
                                        }
                                    })



                                    ->where(function ($query) use ($asesoras) {
                                        if($asesoras != 0){
                                            $query->whereIn("auditoria.usr_regins", $asesoras);
                                        }
                                    }) 


                                    // ->where(function ($query) use ($rol, $id_user) {
                                    //     if($rol == "Asesor"){
                                    //         $query->where("clientes.id_user_asesora", $id_user);
                                    //     }
                                    // })


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

            $data["tasks"]          = $this->getTask($request, date("Y-m-d"))->original;
            $data["queries"]        = $this->getQueries($request, date("Y-m-d"))->original;
            $data["valuations"]     = $this->getValuations($request, date("Y-m-d"))->original;
            $data["surgeries"]      = $this->Surgeries($request, date("Y-m-d"))->original;
            $data["revision"]       = $this->Revision($request, date("Y-m-d"))->original;
            $data["preanestesia"]   = $this->Preanesthesia($request, date("Y-m-d"))->original;
            
            return response()->json($data)->setStatusCode(200);

        }else{
            return response()->json("No esta autorizado")->setStatusCode(400);
        }
    }

    public function Json_Super_Unique($array,$key){
        $temp_array = array();
        foreach ($array as &$v) {
            if (!isset($temp_array[$v[$key]]))
            $temp_array[$v[$key]] =& $v;
        }
        $array = array_values($temp_array);
        return $array;
     }

}
