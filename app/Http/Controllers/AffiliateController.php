<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClientInformationAditionalSurgery;
use App\ClientClinicHistory;
use App\Notification;
use App\AuthUsersApp;
use App\ClientCreditInformation;
use App\Auditoria;
use App\Comments;
use App\Clients;
use App\User;
use DB;
use Mail;
class AffiliateController extends Controller
{



    public function store(Request $request){

        $users = User::join("users_line_business", "users_line_business.id_user", "=", "users.id")
                        ->join("datos_personales", "datos_personales.id_usuario", "=", "users.id")
                        ->where("users.code_user", "=", $request["code_adviser"])
                        ->first();
        if($users){

            $request["name_user"]   = $users["nombres"]." ".$users["apellido_p"];

            $permitted_chars        = '0123456789abcdefghijklmnopqrstuvwxyz';
            $code                   = substr(str_shuffle($permitted_chars), 0, 4);
            $request["code_client"] = strtoupper($code);
            $request["prp"]         = "Si";
            $request["created_prp"] = date("Y-m-d");

            $request["to_db"]       = "1";

            $request["id_user_asesora"] =  $users["id"];
            $request["origen"] =  "PRP Asesora ". $request["name_user"];
            $request["id_line"] = $users["id_line"];

            $client = Clients::where("identificacion", $request["identificacion"])->orWhere("email", $request["email"])->get();

            if((sizeof($client) > 0) && ($request["identificacion"] != "")){

                foreach($client as $value){

                    if($value["prp"] == "Si"){
                        return response()->json("Ya se encuentra registrado con el codigo: ".$value["code_client"])->setStatusCode(400);
                    }
                    $update = array(
                        "code_client"     => $request["code_client"],
                        "prp"             => "Si",
                        "created_prp"     => date("Y-m-d"),
                        "to_db"           => "1",
                        "origen"          =>  $request["origen"],
                        "telefono"        =>  $request["telefono"],
                        "id_user_asesora" =>  $request["id_user_asesora"],
                        "id_line"         =>  $request["id_line"]
                    );

                    Clients::find($value["id_cliente"])->update($update);

                    DB::table('auditoria')->where("cod_reg", $value["id_cliente"])
                            ->where("tabla", "clientes")
                            ->update(['fec_update' => date("Y-m-d H:i:s")]);

                    $id_client = $value["id_cliente"];

                    $comment = "<b>FECHA EN LA QUE TE OPERASTE CON NOSOTROS:</b> <br>";
                    $comment .= "<b>¿QUE CIRUGÍA TE PRACTICASTE?:</b> <br>";
                    $comment .= "<b>¿DESEAS QUE TE PROGRAMEMOS UNA CITA DE CONTROL?:</b> <br>";
                    $comment .= "<b>EL PAGO DE LA BONIFICACION PREFIERES QUE SEA:</b> <br>";
                    $comment .= "<b>SI ELEGISTE PAGO POR TRANSFERENCIA:</b><br>";
                    $comment .= "<b>Nombre del Titular:</b> <br>";
                    $comment .= "<b>Numero de Cedula:</b> <br>";
                    $comment .= "<b>Número de Cuenta:</b> <br>";
                    $comment .= "<b>¿TIENES ALGUNA SUGERENCIA PARA NUESTRO GRUPO?:</b> <br>";

                    $data["table"]    = "clients";
                    $data["id_event"] = $id_client;
                    $data["id_user"]  = $users["id"];
                    $data["comment"] = $comment;

                    Comments::create($data);
                }
            }else{
                $cliente = Clients::create($request->all());
                $request["id_client"] = $cliente["id_cliente"];
                ClientInformationAditionalSurgery::create($request->all());
                ClientClinicHistory::create($request->all());
                ClientCreditInformation::create($request->all());

                $auditoria              = new Auditoria;
                $auditoria->tabla       = "clientes";
                $auditoria->cod_reg     = $cliente["id_cliente"];
                $auditoria->status      = 1;
                $auditoria->fec_regins  = date("Y-m-d H:i:s");
                $auditoria->fec_update  = date("Y-m-d H:i:s");
                $auditoria->usr_regins  = $users["id"];
                $auditoria->save();


                $id_client = $cliente["id_cliente"];

                $comment  = "<b>FECHA EN LA QUE TE OPERASTE CON NOSOTROS:</b> <br>";
                $comment .= "<b>¿QUE CIRUGÍA TE PRACTICASTE?:</b> <br>";
                $comment .= "<b>¿DESEAS QUE TE PROGRAMEMOS UNA CITA DE CONTROL?:</b> <br>";
                $comment .= "<b>EL PAGO DE LA BONIFICACION PREFIERES QUE SEA:</b> <br>";
                $comment .= "<b>SI ELEGISTE PAGO POR TRANSFERENCIA:</b><br>";
                $comment .= "<b>Nombre del Titular:</b> <br>";
                $comment .= "<b>Numero de Cedula:</b> <br>";
                $comment .= "<b>Número de Cuenta:</b> <br>";
                $comment .= "<b>¿TIENES ALGUNA SUGERENCIA PARA NUESTRO GRUPO?:</b> <br>";

                $data["table"]    = "clients";
                $data["id_event"] = $id_client;
                $data["id_user"]  = $users["id"];
                $data["comment"] = $comment;

                Comments::create($data);

            }


            $notification["fecha"]    = date("Y-m-d");
            $notification["title"]    = "Hoy Ingreso de PRP ".$request["nombres"]." codigo: ".$request["code_client"];
            $notification["id_user"]  = $users["id"];
            $notification["id_event"] = $id_client;
            $notification["type"]     = "prp";

            Notification::insert($notification);


            $subject = "Formulario PRP Asesora: ".$request["name_user"];

            $for = $users["email"];
            $request["msg"]  = "Wiiii :D";

            Mail::send('emails.formsPrp',$request->all(), function($msj) use($subject,$for){
                $msj->from("comercial@pdtagencia.com","CRM");
                $msj->subject($subject);
                $msj->to($for);
            });


            $data_user = AuthUsersApp::where("id_user", $users["id"])->first();


            $ConfigNotification = [
                "tokens" => [$data_user["token_notifications"]],

                "tittle" => "PRP",
                "body"   => 'Se ha registrado un Afiliado PRP: '.$request["nombres"].' codigo: '.$request["code_client"],
                "data"   => ['type' => 'refferers']

            ];

            $code = SendNotifications($ConfigNotification);




            $token_user  = AuthUsersApp::where("id_user", $id_client)->get();

            foreach ($token_user as $key => $value) {
                $value->delete();
            }

            $AuthUsers                       = new AuthUsersApp;
            $AuthUsers->id_user              = $id_client;
            $AuthUsers->token                = "123";
            $AuthUsers->token_notifications  = $request["fcmToken"];
            $AuthUsers->save();

            $data = array('email'      => $request["email"],
                          'nombres'    => $request["nombres"],
                          'avatar'     => null,
                          'token'      => "124",
                          'sync_token' => "14242",
                          'mensagge'   => "Ha iniciado sesion exitosamente",
                          "type_user"  => "Afiliado",
                          "code_client" => $request["code_client"],
                          "id_client"  => $id_client
            );

            return response()->json($data)->setStatusCode(200);
        }else{
            return response()->json("El codigo de asesor es incorrecto")->setStatusCode(400);
        }


    }



    public function qty($id_affiliate){

        $data = Clients::where("id_affiliate", $id_affiliate)
                        ->get();

        return response()->json(sizeof($data))->setStatusCode(200);
    }




    public function Dasboard($id_user){

        $data = [
            "total_refferers" => $this->TotalReffers($id_user),
            "earnings"        => $this->Earnings($id_user),
            "global_meta"     => 0
        ];

        return response()->json($data)->setStatusCode(200);

    }













    public function Earnings($id_user){

        $data = DB::table("paysheet")
                          ->selectRaw("SUM(total) as total")
                          ->where("id_affiliate", $id_user)
                          ->first();

        if($data){
            $total = round($data->total, 2);
        }else{
            $total = 0;
        }
        return $total;
    }




    public function TotalReffers($id_client){

        $user = User::where("id_client", $id_client)->first();
        /*
        if($user["id_rol"] == 6){
            $where = array(
                "clientes.id_user_asesora" => $id_user,
                "clientes.origen"          => "Referido Asesora",
            );

            $total_refferers = Clients::where($where)->selectRaw("clientes.*")
                                                    ->get();
        }*/

        $total_refferers = Clients::where("id_affiliate", $id_client)
                          ->get();


        return sizeof($total_refferers);
    }








    public function StatisticsSales($user_id){

        $data = [
            "week"  => $this->StatisticsSalesWeek($user_id),
            "month" => $this->StatisticsSalesMonth($user_id),
            "year"  => $this->StatisticsSalesYear($user_id)
        ];

        return response()->json($data)->setStatusCode(200);
    }










    public function StatisticsSalesWeek($user_id){

        $year  = date("Y");
        $month = date("m");
        $day   = date("d");


        $days = [1, 2, 3, 4, 5, 6, 7];
        $sales = [];
        foreach($days as $value){

            # Obtenemos el numero de la semana
            $semana = date("W",mktime(0,0,0,$month,$day,$year));

            # Obtenemos el día de la semana de la fecha dada
            $diaSemana = date("w",mktime(0,0,0,$month,$day,$year));

            # el 0 equivale al domingo...
            if($diaSemana == 0)
                $diaSemana = 7;

            # A la fecha recibida, le restamos el dia de la semana y obtendremos el lunes
            $DayWeek = date("Y-m-d",mktime(0,0,0,$month,$day-$diaSemana+$value,$year));

            $data = DB::table("paysheet")
                          ->selectRaw("COUNT(total) as total")
                          ->where("id_affiliate", $user_id)
                          ->where("create_at", ">=", $DayWeek." 00:00:00")
                          ->where("create_at", "<=", $DayWeek." 23:59:59")
                          ->first();

            if($data){
                $total = round($data->total, 2);
            }else{
                $total = 0;
            }

            $sales[] = $total;

        }

        $data = [
            "datasets" => [
                "data"  => $sales
            ]
        ];

        return $data;
    }



    public function StatisticsSalesMonth($user_id){

        $days = cal_days_in_month(CAL_GREGORIAN, date("m"), date("Y"));

        $sales = [];
        for($i = 1; $i <= $days; $i++){

           $date = date("Y")."-".date("m")."-".$i;

           $data = DB::table("paysheet")
                          ->selectRaw("COUNT(total) as total")
                          ->where("id_affiliate", $user_id)
                          ->where("create_at", ">=", $date." 00:00:00")
                          ->where("create_at", "<=", $date." 23:59:59")
                          ->first();

            if($data){
                $total = round($data->total, 2);
            }else{
                $total = 0;
            }

            $sales[] = $total;

        }

        $data = [
            "datasets" => [
                "data"  => $sales
            ]
        ];

        return $data;



    }



    public function StatisticsSalesYear($user_id){


        $months = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];


        foreach($months as $value){

           $data = DB::table("paysheet")
                        ->selectRaw("COUNT(total) as total")
                        ->where("id_affiliate", $user_id)
                        ->whereRaw("MONTH(create_at) = ".$value." and YEAR(create_at) = ".date("Y")."")
                        ->first();

            if($data){
                $total = round($data->total, 2);
            }else{
                $total = 0;
            }

            $sales[] = $total;

        }


        $data = [
            "datasets" => [
                "data"  => $sales
            ]
        ];

        return $data;


    }

}
