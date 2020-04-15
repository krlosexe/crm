<?php

namespace App\Http\Controllers;

use App\Tasks;
use App\Auditoria;
use App\TasksFollowers;


use App\ClientsTasks;
use App\ClientsTasksFollowers;
use App\ClientsTasksComments;

use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($this->VerifyLogin($request["id_user"],$request["token"])){

            $rol     = $request["rol"];
            $id_user = $request["id_user"];


            $adviser = 0;
            if(isset($request["adviser"])){
              $adviser = $request["adviser"];
            }

            $tasks = ClientsTasks::select("clients_tasks.*", "responsable.email as email_responsable", "datos_personales.nombres as name_responsable", 
                                   "datos_personales.apellido_p as last_name_responsable", "auditoria.*", "users.email as email_regis")

                                ->join("auditoria", "auditoria.cod_reg", "=", "clients_tasks.id_clients_tasks")
                                ->join("users", "users.id", "=", "auditoria.usr_regins")

                                ->join("users as responsable", "responsable.id", "=", "clients_tasks.responsable")
                                ->join("datos_personales", "datos_personales.id_usuario", "=", "responsable.id")

                                ->with("followers")


                                ->where(function ($query) use ($rol, $id_user) {
                                    if($rol == "Asesor"){
                                        //$query->where("clients_tasks.responsable", $id_user);
                                    }
                                })


                                ->where(function ($query) use ($adviser) {
                                    if($adviser != 0){
                                        $query->whereIn("clients_tasks.responsable", $adviser);
                                    }
                                }) 

                                ->where("auditoria.tabla", "clients_tasks")
                                ->where("auditoria.status", "!=", "0")
                                ->orderBy("clients_tasks.id_clients_tasks", "DESC")
                                ->get();



            if($rol == "Asesor"){

                $tasks_follow = ClientsTasks::select("clients_tasks.*", "responsable.email as email_responsable", "datos_personales.nombres as name_responsable", 
                                                    "datos_personales.apellido_p as last_name_responsable", "auditoria.*", "users.email as email_regis")

                                                    ->join("auditoria", "auditoria.cod_reg", "=", "clients_tasks.id_clients_tasks")
                                                    ->join("users", "users.id", "=", "auditoria.usr_regins")

                                                    ->join("users as responsable", "responsable.id", "=", "clients_tasks.responsable")
                                                    ->join("datos_personales", "datos_personales.id_usuario", "=", "responsable.id")

                                                    ->join("clients_tasks_followers", "clients_tasks_followers.id_task", "=", "clients_tasks.id_clients_tasks")

                                                    ->with("followers")
                                                    
                                                    ->where("clients_tasks_followers.id_follower", $id_user)
                                                    ->where("auditoria.tabla", "clients_tasks")
                                                    ->where("auditoria.status", "!=", "0")
                                                    ->orderBy("clients_tasks.id_clients_tasks", "DESC")
                                                    ->get();


                foreach($tasks_follow as $key => $value){
                  $tasks[] = $value;
                }
            }
            
                             
            echo json_encode($tasks);

        }else{
            return response()->json("No esta autorizado")->setStatusCode(400);
        }
    }





    



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($this->VerifyLogin($request["id_user"],$request["token"])){


            $store = Tasks::create($request->all());

            $followers = [];
            foreach($request->followers as $key => $value){
                $array = [];
                $array["id_task"]     = $store["id_tasks"];
                $array["id_follower"] = $value;
                array_push($followers, $array);
            }

            TasksFollowers::insert($followers);

            $auditoria              = new Auditoria;
            $auditoria->tabla       = "tasks";
            $auditoria->cod_reg     = $store["id_tasks"];
            $auditoria->status      = 1;
            $auditoria->fec_regins  = date("Y-m-d H:i:s");
            $auditoria->usr_regins  = $request["id_user"];
            $auditoria->save();

            if ($store) {
                $data = array('mensagge' => "Los datos fueron registrados satisfactoriamente");    
                return response()->json($data)->setStatusCode(200);
            }else{
                return response()->json("A ocurrido un error")->setStatusCode(400);
            }
     
        }else{
            return response()->json("No esta autorizado")->setStatusCode(400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function show(Tasks $tasks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function edit(Tasks $tasks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $tasks)
    {
        if ($this->VerifyLogin($request["id_user"],$request["token"])){
            
            $update = Tasks::find($tasks)->update($request->all());

            TasksFollowers::where("id_task", $tasks)->delete();


            if(isset($request->followers)){

                $followers = [];
                foreach($request->followers as $key => $value){
                    $array = [];
                    $array["id_task"]     = $tasks;
                    $array["id_follower"] = $value;
                    array_push($followers, $array);
                }

                TasksFollowers::insert($followers);

            }
            

            

            if ($update) {
                $data = array('mensagge' => "Los datos fueron registrados satisfactoriamente");    
                return response()->json($data)->setStatusCode(200);
            }else{
                return response()->json("A ocurrido un error")->setStatusCode(400);
            }

        }else{
            return response()->json("No esta autorizado")->setStatusCode(400);
        }
    }


    public function status($id, $status, Request $request)
    {
        if ($this->VerifyLogin($request["id_user"],$request["token"])){
            $auditoria =  Auditoria::where("cod_reg", $id)
                                     ->where("tabla", "tasks")->first();
            $auditoria->status = $status;

            if($status == 0){
                $auditoria->usr_regmod = $request["id_user"];
                $auditoria->fec_regmod = date("Y-m-d");
            }
            $auditoria->save();

            $data = array('mensagge' => "Los datos fueron actualizados satisfactoriamente");    
            return response()->json($data)->setStatusCode(200);
        }else{
            return response()->json("No esta autorizado")->setStatusCode(400);
        }
    }



    public function Migrate(){
       
        

        $tasks = Tasks::select("tasks.*", "responsable.email as email_responsable", "datos_personales.nombres as name_responsable", 
                                   "datos_personales.apellido_p as last_name_responsable", "auditoria.*", "users.email as email_regis", "auditoria.usr_regins")

                                ->join("auditoria", "auditoria.cod_reg", "=", "tasks.id_tasks")
                                ->join("users", "users.id", "=", "auditoria.usr_regins")

                                ->join("users as responsable", "responsable.id", "=", "tasks.responsable")
                                ->join("datos_personales", "datos_personales.id_usuario", "=", "responsable.id")

                                ->with("followers")


                                ->where("auditoria.tabla", "tasks")
                                ->where("auditoria.status", "!=", "0")
                                ->orderBy("tasks.id_tasks", "DESC")
                                ->get();

        
        foreach($tasks as $value){
            echo json_encode($value["observaciones"])."<br><br>";

            $data = [];
            $data["responsable"] = $value["responsable"];
            $data["issue"]       = $value["issue"]; 
            $data["fecha"]       = $value["fecha"];
            $data["time"]        = $value["time"];
            $data["status_task"] = $value["status_task"]; 
            $store = ClientsTasks::create($data);


            $auditoria              = new Auditoria;
            $auditoria->tabla       = "clients_tasks";
            $auditoria->cod_reg     = $store["id_clients_tasks"];
            $auditoria->status      = 1;
            $auditoria->usr_regins  = $value["usr_regins"];
            $auditoria->save();


            $followers = [];
            foreach($value["followers"] as $key => $follow){
                $array = [];
                $array["id_task"]     = $store["id_clients_tasks"];
                $array["id_follower"] = $follow["id_follower"];
                array_push($followers, $array);
            }
            ClientsTasksFollowers::insert($followers);

            $comments = [];
            $comments["id_task"]   = $store["id_clients_tasks"];
            $comments["id_user"]   = $value["usr_regins"];
            $comments["comments"]  = $value["observaciones"];
            ClientsTasksComments::create($comments);


        }

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tasks $tasks)
    {
        //
    }
}
