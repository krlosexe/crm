<?php

namespace App\Http\Controllers;

use DB;
use Mail;
use App\User;
use App\Tasks;
use App\Clients;
use App\Queries;
use App\Valuations;
use App\Notification;
use App\Preanesthesia;
use App\Surgeries;
use App\AppointmentsAgenda;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{


    public function Get(request $request){

        $data = Notification::where("id_user", $request["id_user"])
                            ->where("view", "No")
                            ->orderBy("id_notifications", "desc")
                            ->get();
        echo json_encode($data);
    }


    public function Tasks(){

        $data_today    = Tasks::where("fecha", date("Y-m-d"))->get();
        $data_tomorrow = Tasks::whereRaw("fecha = DATE_FORMAT(date_add(NOW(), INTERVAL 1 DAY),'%Y-%m-%d')")->get();
        $data_thre_day = Tasks::whereRaw("fecha = DATE_FORMAT(date_add(NOW(), INTERVAL 3 DAY),'%Y-%m-%d')")->get();


        $this->SaveNotificationTasks($data_today, 1);
        $this->SaveNotificationTasks($data_tomorrow, 2);
        $this->SaveNotificationTasks($data_thre_day, 3);

    }


    public function SaveNotificationTasks($data, $day){

        $notification = [];

        if($day == 1){ $moment = "Hoy"; }
        if($day == 2){ $moment = "Mañana"; }
        if($day == 3){ $moment = "3 dias para"; }

        foreach($data as $key => $value){
            $array["fecha"]    = $value["fecha"];
            $array["title"]    = $moment." Tarea #".$value["id_tasks"].": ".$value["issue"];
            $array["id_user"]  = $value["responsable"];
            $array["id_event"] = $value["id_tasks"];
            $array["type"]     = "task";
            array_push($notification, $array);
        }

        Notification::insert($notification);

    }




    public function Queries(){


        $data_today    = Queries::where("fecha", date("Y-m-d"))
                                  ->join("clientes", "clientes.id_cliente", "=", "queries.id_cliente")
                                  ->get();

        $data_tomorrow = Queries::whereRaw("fecha = DATE_FORMAT(date_add(NOW(), INTERVAL 1 DAY),'%Y-%m-%d')")
                                  ->join("clientes", "clientes.id_cliente", "=", "queries.id_cliente")
                                  ->get();

        $data_thre_day = Queries::whereRaw("fecha = DATE_FORMAT(date_add(NOW(), INTERVAL 3 DAY),'%Y-%m-%d')")
                                  ->join("clientes", "clientes.id_cliente", "=", "queries.id_cliente")
                                  ->get();


        $this->SaveNotificationQueries($data_today, 1);
        $this->SaveNotificationQueries($data_tomorrow, 2);
        $this->SaveNotificationQueries($data_thre_day, 3);

    }




    public function SaveNotificationQueries($data, $day){

        $notification = [];

        if($day == 1){ $moment = "Hoy"; }
        if($day == 2){ $moment = "Mañana"; }
        if($day == 3){ $moment = "3 dias para"; }

        foreach($data as $key => $value){
            $array["fecha"]    = $value["fecha"];
            $array["title"]    = $moment." Consulta con Paciente ".$value["nombres"]." ".$value["apellidos"];
            $array["id_user"]  = $value["id_user_asesora"];
            $array["id_event"] = $value["id_queries"];
            $array["type"]     = "queries";
            array_push($notification, $array);
        }

        Notification::insert($notification);

    }




    public function Valuations(){


        $data_today    = Valuations::where("fecha", date("Y-m-d"))
                                    ->join("clientes", "clientes.id_cliente", "=", "valuations.id_cliente")
                                    ->get();

        $data_tomorrow = Valuations::whereRaw("fecha = DATE_FORMAT(date_add(NOW(), INTERVAL 1 DAY),'%Y-%m-%d')")
                                    ->join("clientes", "clientes.id_cliente", "=", "valuations.id_cliente")
                                    ->get();

        $data_thre_day = Valuations::whereRaw("fecha = DATE_FORMAT(date_add(NOW(), INTERVAL 3 DAY),'%Y-%m-%d')")
                                    ->join("clientes", "clientes.id_cliente", "=", "valuations.id_cliente")
                                    ->get();


        $this->SaveNotificationValuations($data_today, 1);
        $this->SaveNotificationValuations($data_tomorrow, 2);
        $this->SaveNotificationValuations($data_thre_day, 3);

    }

    public function SaveNotificationValuations($data, $day){

        $notification = [];

        if($day == 1){ $moment = "Hoy"; }
        if($day == 2){ $moment = "Mañana"; }
        if($day == 3){ $moment = "3 dias para"; }

        foreach($data as $key => $value){
            $array["fecha"]    = $value["fecha"];
            $array["title"]    = $moment." VLR con Paciente ".$value["nombres"]." ".$value["apellidos"];
            $array["id_user"]  = $value["id_user_asesora"];
            $array["id_event"] = $value["id_valuations"];
            $array["type"]     = "valuations";
            array_push($notification, $array);
        }

        Notification::insert($notification);

    }





    public function PreAnestisia(){


        $data_today    = Preanesthesia::where("fecha", date("Y-m-d"))
                                       ->join("clientes", "clientes.id_cliente", "=", "preanesthesias.id_cliente")
                                       ->get();

        $data_tomorrow = Preanesthesia::whereRaw("fecha = DATE_FORMAT(date_add(NOW(), INTERVAL 1 DAY),'%Y-%m-%d')")
                                    ->join("clientes", "clientes.id_cliente", "=", "preanesthesias.id_cliente")
                                    ->get();

        $data_thre_day = Preanesthesia::whereRaw("fecha = DATE_FORMAT(date_add(NOW(), INTERVAL 3 DAY),'%Y-%m-%d')")
                                    ->join("clientes", "clientes.id_cliente", "=", "preanesthesias.id_cliente")
                                    ->get();


       $this->SaveNotificationPreAnestesia($data_today, 1);
       $this->SaveNotificationPreAnestesia($data_tomorrow, 2);
       $this->SaveNotificationPreAnestesia($data_thre_day, 3);

    }

    public function SaveNotificationPreAnestesia($data, $day){

        $notification = [];

        if($day == 1){ $moment = "Hoy"; }
        if($day == 2){ $moment = "Mañana"; }
        if($day == 3){ $moment = "3 dias para"; }

        foreach($data as $key => $value){
            $array["fecha"]    = $value["fecha"];
            $array["title"]    = $moment." Pre Anestesia con Paciente ".$value["nombres"]." ".$value["apellidos"];
            $array["id_user"]  = $value["id_user_asesora"];
            $array["id_event"] = $value["id_preanesthesias"];
            $array["type"]     = "preanesthesias";
            array_push($notification, $array);
        }

        Notification::insert($notification);

    }









    public function Surgeries(){


        $data_today    = Surgeries::where("fecha", date("Y-m-d"))
                                    ->join("clientes", "clientes.id_cliente", "=", "surgeries.id_cliente")
                                    ->get();

        $data_tomorrow = Surgeries::whereRaw("fecha = DATE_FORMAT(date_add(NOW(), INTERVAL 1 DAY),'%Y-%m-%d')")
                                    ->join("clientes", "clientes.id_cliente", "=", "surgeries.id_cliente")
                                    ->get();

        $data_thre_day = Surgeries::whereRaw("fecha = DATE_FORMAT(date_add(NOW(), INTERVAL 3 DAY),'%Y-%m-%d')")
                                    ->join("clientes", "clientes.id_cliente", "=", "surgeries.id_cliente")
                                    ->get();

        $this->SaveNotificationSurgeries($data_today, 1);
        $this->SaveNotificationSurgeries($data_tomorrow, 2);
        $this->SaveNotificationSurgeries($data_thre_day, 3);

    }

    public function SaveNotificationSurgeries($data, $day){

        $notification = [];

        if($day == 1){ $moment = "Hoy"; }
        if($day == 2){ $moment = "Mañana"; }
        if($day == 3){ $moment = "3 dias para"; }

        foreach($data as $key => $value){
            $array["fecha"]    = $value["fecha"];
            $array["title"]    = $moment." CX con Paciente ".$value["nombres"]." ".$value["apellidos"];
            $array["id_user"]  = $value["id_user_asesora"];
            $array["id_event"] = $value["id_surgeries"];
            $array["type"]     = "surgeries";
            array_push($notification, $array);
        }

        Notification::insert($notification);

    }




    public function Revision(){

        $data_today  = AppointmentsAgenda::where("fecha", date("Y-m-d"))
                                        ->join("revision_appointment", "revision_appointment.id_revision", "=", "appointments_agenda.id_revision")
                                        ->join("clientes", "clientes.id_cliente", "=", "revision_appointment.id_paciente")
                                        ->get();


        $data_tomorrow  = AppointmentsAgenda::whereRaw("fecha = DATE_FORMAT(date_add(NOW(), INTERVAL 1 DAY),'%Y-%m-%d')")
                                            ->join("revision_appointment", "revision_appointment.id_revision", "=", "appointments_agenda.id_revision")
                                            ->join("clientes", "clientes.id_cliente", "=", "revision_appointment.id_paciente")
                                            ->get();


        $data_thre_day  = AppointmentsAgenda::whereRaw("fecha = DATE_FORMAT(date_add(NOW(), INTERVAL 3 DAY),'%Y-%m-%d')")
                                            ->join("revision_appointment", "revision_appointment.id_revision", "=", "appointments_agenda.id_revision")
                                            ->join("clientes", "clientes.id_cliente", "=", "revision_appointment.id_paciente")
                                            ->get();

        $this->SaveNotificationRevision($data_today, 1);
        $this->SaveNotificationRevision($data_tomorrow, 2);
        $this->SaveNotificationRevision($data_thre_day, 3);

    }


    public function SaveNotificationRevision($data, $day){

        $notification = [];

        if($day == 1){ $moment = "Hoy"; }
        if($day == 2){ $moment = "Mañana"; }
        if($day == 3){ $moment = "3 dias para"; }

        foreach($data as $key => $value){
            $array["fecha"]    = $value["fecha"];
            $array["title"]    = $moment." Revision con Paciente ".$value["nombres"]." ".$value["apellidos"];
            $array["id_user"]  = $value["id_user_asesora"];
            $array["id_event"] = $value["id_revision"];
            $array["type"]     = "revision";
            array_push($notification, $array);
        }

        Notification::insert($notification);

    }



    public function Generate(){
        $this->Tasks();
        $this->Valuations();
        $this->PreAnestisia();
        $this->Surgeries();
        $this->Revision();

        echo "SI";
    }

    public function Read(request $request){

        Notification::where("id_user", $request["id_user"])->update(["view" => "Si"]);

        $data = array('mensagge' => "Exito");

        return response()->json($data)->setStatusCode(200);

    }




    public function Email(Request $request){

        $user = User::find($request["user_id"]);
        $subject = "Formulario Web";
        //$for = "cardenascarlos18@gmail.com";
        $for = $user["email"];

        $request["msg"]  = "Un Paciente a registrado un Formulario Web";

        Mail::send('emails.forms_authorizatio',$request->all(), function($msj) use($subject,$for){
            $msj->from("crm@pdtagencia.com","CRM");
            $msj->subject($subject);
            $msj->to($for);
        });

        return true;

    }




    public function NotificationsPost(Request $request){



        $users = Clients::selectRaw("clientes.nombres, auth_users_app.token_notifications")
                          ->join("auth_users_app", "auth_users_app.id_user", "=", "clientes.id_cliente")
                          ->whereIn("clientes.id_line", $request["lines"])
                          ->where("clientes.PRP", "Si")
                          ->get();



        $users_asesora = User::selectRaw("users.id as user_id, auth_users_app.token_notifications")
                            ->join("auth_users_app", "auth_users_app.id_user", "=", "users.id")
                            ->join("users_line_business", "users_line_business.id_user", "=", "users.id")
                            ->whereIn("users_line_business.id_line", $request["lines"])
                            ->where("users.id_rol", 9)->get();


        $tokens = [];
        foreach($users as $user){
            $tokens[] = $user["token_notifications"];
        }


        foreach($users_asesora as $user){
            $tokens[] = $user["token_notifications"];
        }


        $ConfigNotification = [
            "tokens" => $tokens,

            "tittle" => "Contenido para Publicar",
            "body"   => "Se ha publicado un nuevo Post",
            "data"   => ['type' => 'post']

        ];

       $code = SendNotifications($ConfigNotification);

        return response()->json($ConfigNotification)->setStatusCode(200);
    }




    public function EmailsMasivos(){

        $data = DB::table("clientes")
                    ->join("client_information_aditional_surgery", "client_information_aditional_surgery.id_client", "=", "clientes.id_cliente", "left")


                    ->where("clientes.id_line", 17)
                    ->where("clientes.email", "!=", "")
                    ->whereRaw("clientes.email is not null")
                    ->where("clientes.send_email", "=", 0)

                    ->where(function ($query){
                        $query->OrWhereRaw('client_information_aditional_surgery.name_surgery like "%mamo%"');
                        $query->OrWhereRaw('client_information_aditional_surgery.name_surgery like "%pexia%"');
                        $query->OrWhereRaw('client_information_aditional_surgery.name_surgery like "%abdomino%"');
                        $query->OrWhereRaw('client_information_aditional_surgery.name_surgery like "%gluteo%"');
                    })

                    ->limit(10)
                    ->get();


        //return response()->json($data)->setStatusCode(200);

        foreach($data as $value){
            $info_email = [
                "id_cliente" => $value->id_cliente,
                "issue"      => "¡El tratamiento ideal para mejorar TUS CICATRICES!",
                "name"       => $value->nombres,
                "for"        => $value->email
            ];

            $this->SendEmail2($info_email);
        }



       return response()->json(sizeof($data))->setStatusCode(200);

    }


    public function SendEmail2($data){

       // $user = User::find($data["user_id"]);
        $subject = $data["issue"];

       // $for = "cardenascarlos18@gmail.com";
        $for = $data["for"];
        $mail_send = Mail::send('emails.masivos',["nombre" =>  $data["name"]], function($msj) use($subject,$for){
            $msj->from("crm@pdtagencia.com","Cirujano Daniel Correa");
            $msj->subject($subject);
            $msj->to($for);
        });

        DB::table("clientes")->where("id_cliente", $data["id_cliente"])->update(["send_email" => 1]);

        return true;

    }




    public function EmailsMasivosTest(){

        $info_email = [
            "id_cliente" => 1,
            "issue"      => "¡El tratamiento ideal para mejorar TUS CICATRICES!",
            "name"       => "carlos cardenas",
            "for"        => "cardenascarlos18@gmail.com"
        ];
        $this->SendEmail2($info_email);


       return response()->json(sizeof([]))->setStatusCode(200);

    }




}
