<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Mail;

use App\Notification;
use App\User;
class JobsController extends Controller
{
    public function Logouts(){
        echo "adasd";
    }

    public function TasksOverdue(){

        $data = DB::table("clients_tasks")
                    ->where("fecha", "<", date("Y-m-d"))
                    ->where("status_task", "Abierta")
                    ->get();

        foreach($data as $task){
            $notification             = [];
            $notification["fecha"]    = $task->fecha;
            $notification["title"]    = "Tarea ".$task->id_clients_tasks." esta vencida: ".$task->issue;
            $notification["id_user"]  = $task->responsable;
            $notification["id_event"] = $task->id_clients_tasks;
            $notification["type"]     = "task";

            Notification::insert($notification);


            $info_email = [
                "user_id" => $task->responsable,
                "issue"   => $notification["title"],
                "mensage" => $notification["title"],
            ];
            $this->SendEmail($info_email);

        }

        return response()->json($data)->setStatusCode(200);
        
    }



    public function SendEmail($data){

        $user = User::find($data["user_id"]);
        $subject = $data["issue"];

        //$for = "cardenascarlos18@gmail.com";
        $for = $user["email"];

        $request["msg"] = $data["mensage"];

        Mail::send('emails.notification',$request, function($msj) use($subject,$for){
            $msj->from("cardenascarlos18@gmail.com","CRM");
            $msj->subject($subject);
            $msj->to($for);
        });

        return true;

    }



}
