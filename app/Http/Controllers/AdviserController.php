<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clients;
use App\User;
use App\Valuations;
use App\Surgeries;
use App\Preanesthesia;
use App\Masajes;
use DateTime;
use DB;
class AdviserController extends Controller
{
    public function GetAffiliates($id_adviser, $name = 0){

        $where = array(
            "id_user_asesora" => $id_adviser,
            "prp"             => "Si"
        );




        $data = Clients::where($where)
                        ->select("clientes.*", "users.img_profile as avatar", "users.id as user_id")
                        ->join("users", "users.id_client", "clientes.id_cliente")

                        ->where(function ($query) use ($name) {
                            if($name != "0"){
                                $query->where("clientes.nombres", 'like', '%'.$name.'%');
                            }
                        })


                        ->orderBy("clientes.id_cliente", "DESC")
                        ->get();
        return response()->json($data)->setStatusCode(200);
    }


    public function GetRefferers($id_user, $display, $name = 0){

        $user = User::where("id_client", $id_user)->first();


        if($user["id_rol"] == 6 || $user["id_rol"] == 9){

            if($display == "self"){
                $where = array(
                    "clientes.id_user_asesora" => $id_user,
                    "clientes.origen"          => "Referido Asesora",
                );


                $data = Clients::where($where)->selectRaw("clientes.* , client_information_aditional_surgery.name_surgery as interes,
                                                          CONCAT(datos_personales.nombres, ' ', datos_personales.apellido_p) as name_affiliate, u2.token_chat")
                                              ->join("users", "users.id", "clientes.id_user_asesora")
                                              ->join("datos_personales", "datos_personales.id_usuario", "users.id")
                                              ->join("client_information_aditional_surgery", "client_information_aditional_surgery.id_client", "=", "clientes.id_cliente", "left")

                                              ->join("users as u2", "u2.id_client", "clientes.id_cliente")

                                              ->where(function ($query) use ($name) {
                                                if($name != "0"){
                                                    $query->where("clientes.nombres", 'like', '%'.$name.'%');
                                                    }
                                                })




                                              ->orderBy("clientes.id_cliente", "DESC")
                                              ->get();


            }else if($display == "all"){
                $where = array(
                    "clientes.id_user_asesora" => $id_user
                );


                $data = Clients::where($where)->select("clientes.*", "cl2.nombres as name_affiliate", "client_information_aditional_surgery.name_surgery as interes", "users.token_chat", "users.id as user_id")
                                              ->join("client_information_aditional_surgery", "client_information_aditional_surgery.id_client", "=", "clientes.id_cliente", "left")
                                              ->join("clientes as cl2", "cl2.id_cliente", "=", "clientes.id_affiliate", "left")
                                              ->join("users", "users.id_client", "clientes.id_cliente", "left")
                                              ->whereNotNull('clientes.id_affiliate')

                                              ->where(function ($query) use ($name) {
                                                if($name != "0"){
                                                    $query->where("clientes.nombres", 'like', '%'.$name.'%');
                                                }
                                             })


                                              ->orderBy("clientes.id_cliente", "DESC")
                                              ->get();

            }


        }

        $where = array(
            "clientes.id_affiliate" => $id_user
        );


        $data = Clients::where($where)
            ->select("clientes.*", "cl2.nombres as name_affiliate","client_information_aditional_surgery.name_surgery as interes")
            ->join("client_information_aditional_surgery", "client_information_aditional_surgery.id_client", "=", "clientes.id_cliente", "left")
            ->join("clientes as cl2", "cl2.id_cliente", "=", "clientes.id_affiliate")


            ->where(function ($query) use ($name) {
                if($name != "0"){
                    $query->where("clientes.nombres", 'like', '%'.$name.'%');
                }
            })


            ->whereNotNull('clientes.id_affiliate')
            ->orderBy("clientes.id_cliente", "DESC")

            ->get();


        return response()->json($data)->setStatusCode(200);

    }



    public function GetProcesses($id_user, $display){



        $user = User::where("id", $id_user)->first();


        if($user["id_rol"] == 6 || $user["id_rol"] == 9){

            if($display == "self"){
                $where = array(
                    "clientes.id_user_asesora" => $id_user
                );


                $data = Clients::where($where)->selectRaw("clientes.id_cliente","clientes.nombres, client_information_aditional_surgery.name_surgery as interes,
                                                        CONCAT(datos_personales.nombres, ' ', datos_personales.apellido_p) as name_affiliate")
                                              ->join("users", "users.id", "clientes.id_user_asesora")
                                              ->join("datos_personales", "datos_personales.id_usuario", "users.id")
                                              ->join("client_information_aditional_surgery", "client_information_aditional_surgery.id_client", "=", "clientes.id_cliente", "left")
                                              ->join("events_client", "events_client.id_client", "=", "clientes.id_cliente")
                                              ->groupBy("clientes.id_cliente")
                                              ->groupBy("client_information_aditional_surgery.name_surgery")
                                              ->groupBy("datos_personales.nombres")
                                              ->groupBy("datos_personales.apellido_p")
                                              ->groupBy("clientes.nombres")
                                              ->orderBy("clientes.id_cliente", "DESC")
                                              ->get();


            }else if($display == "all"){
                $where = array(
                    "clientes.id_user_asesora" => $id_user
                );


                $data = Clients::where($where)->select("clientes.id_cliente","clientes.nombres", "cl2.nombres as name_affiliate", "client_information_aditional_surgery.name_surgery as interes")
                                              ->join("client_information_aditional_surgery", "client_information_aditional_surgery.id_client", "=", "clientes.id_cliente", "left")
                                              ->join("clientes as cl2", "cl2.id_cliente", "=", "clientes.id_affiliate", "left")
                                              ->join("events_client", "events_client.id_client", "=", "clientes.id_cliente")
                                              ->whereNotNull('clientes.id_affiliate')

                                              ->groupBy("clientes.id_cliente")
                                              ->groupBy("client_information_aditional_surgery.name_surgery")
                                              ->groupBy("clientes.nombres")
                                              ->orderBy("clientes.id_cliente", "DESC")
                                              ->groupBy("cl2.nombres")

                                              ->get();

            }


        }

        if($user["id_rol"] == 17){

            $where = array(
                "clientes.id_affiliate" => $user["id_client"]
            );


            $data = Clients::where($where)
                ->select("clientes.id_cliente","clientes.nombres", "cl2.nombres as name_affiliate","client_information_aditional_surgery.name_surgery as interes")
                ->join("client_information_aditional_surgery", "client_information_aditional_surgery.id_client", "=", "clientes.id_cliente", "left")
                ->join("clientes as cl2", "cl2.id_cliente", "=", "clientes.id_affiliate")
                ->join("events_client", "events_client.id_client", "=", "clientes.id_cliente")
                ->whereNotNull('clientes.id_affiliate')


                ->groupBy("clientes.id_cliente")
                ->groupBy("client_information_aditional_surgery.name_surgery")
                ->groupBy("cl2.nombres")
                ->groupBy("clientes.nombres")

                ->orderBy("clientes.id_cliente", "DESC")
                ->get();

        }



        if($user["id_rol"] == 19){

            $where = array(
                "clientes.id_cliente" => $user["id_client"],
               // "clientes.origen"          => "Referido PRP",
            );


            $data = Clients::where($where)
                ->select("clientes.id_cliente","clientes.nombres", "cl2.nombres as name_affiliate","client_information_aditional_surgery.name_surgery as interes")
                ->join("client_information_aditional_surgery", "client_information_aditional_surgery.id_client", "=", "clientes.id_cliente", "left")
                ->join("clientes as cl2", "cl2.id_cliente", "=", "clientes.id_affiliate")
                ->join("events_client", "events_client.id_client", "=", "clientes.id_cliente")
                ->whereNotNull('clientes.id_affiliate')


                ->groupBy("clientes.id_cliente")
                ->groupBy("client_information_aditional_surgery.name_surgery")
                ->groupBy("cl2.nombres")
                ->groupBy("clientes.nombres")

                ->orderBy("clientes.id_cliente", "DESC")
                ->get();

        }





        return response()->json($data)->setStatusCode(200);

    }



    public function GetProcessesDetails($id_client){
        $data = DB::table("events_client")->where("id_client", $id_client)->get();



        foreach($data as $event){

            if($event->event == "Valoracion"){
               $valoration         =  Valuations::find($event->id_event)->first();
               $event->date_event  = $valoration["fecha"];
            }


            if($event->event == "Cirugia"){
                $surgeries         =  Surgeries::find($event->id_event)->first();
                $event->date_event = $surgeries["fecha"];
            }


            if($event->event == "Preanestesia"){
                $preanestesia      =  Preanesthesia::find($event->id_event)->first();
                $event->date_event = $preanestesia["fecha"];
            }


            if($event->event == "Masajes"){
                $masajes           =  Masajes::where("id_masajes", $event->id_event)->first();
                $event->date_event = $masajes["fecha"];
            }

        }




       return response()->json($data)->setStatusCode(200);
    }










    public function GetRefferersClient($id_client){

        $where = array(
            "clientes.id_affiliate" => $id_client
        );


        $data = Clients::where($where)
            ->select("clientes.*", "cl2.nombres as name_affiliate","client_information_aditional_surgery.name_surgery as interes")
            ->join("client_information_aditional_surgery", "client_information_aditional_surgery.id_client", "=", "clientes.id_cliente", "left")
            ->join("clientes as cl2", "cl2.id_cliente", "=", "clientes.id_affiliate")
            ->whereNotNull('clientes.id_affiliate')
            ->orderBy("clientes.id_cliente", "DESC")

            ->get();



        return response()->json($data)->setStatusCode(200);

    }






    public function QtyPrpMonth($id_adviser){

        $where = array(
            "id_user_asesora" => $id_adviser,
            "prp"             => "Si"
        );




        $data = Clients::where($where)
                        ->whereRaw("month(created_prp) = ".date("m")." ")
                        ->selectRaw("count(id_cliente) as qty")
                        ->orderBy("clientes.id_cliente", "DESC")
                        ->first();
        return response()->json($data)->setStatusCode(200);
    }


    public function QtyCalificationsGoogle($id_adviser){

        $data = DB::table("califications_advisers")
                    ->selectRaw("count(id) as qty")
                    ->where("califications_advisers.id_user", $id_adviser)
                    ->where("califications_advisers.type", "Calificacion")
                    ->whereRaw("month(califications_advisers.fecha) = ".date("m")." ")
                    ->first();

        return response()->json($data)->setStatusCode(200);
    }





    public function QtyMonthValorations($user_id){

        $data = Valuations::selectRaw("count(id_valuations) as qty")
                            ->join("auditoria", "auditoria.cod_reg", "=", "valuations.id_valuations")
                            ->where("auditoria.tabla", "valuations")
                            ->where("valuations.status", 1)
                            ->where("auditoria.usr_regins", $user_id)
                            ->whereRaw("month(fecha) = ".date("m")." ")
                            ->first();

        return response()->json($data)->setStatusCode(200);

    }


    public function QtyMonthSurgeries($user_id){

        $data = Surgeries::selectRaw("count(id_surgeries) as qty")
                            ->join("auditoria", "auditoria.cod_reg", "=", "surgeries.id_surgeries")
                            ->where("surgeries.status_surgeries", 1)
                            ->where("auditoria.tabla", "surgeries")
                            ->where("auditoria.usr_regins", $user_id)
                            ->whereRaw("month(fecha) = ".date("m")." ")
                            ->first();

        return response()->json($data)->setStatusCode(200);

    }






    public function SurveyAdviser($id_adviser){

        $data = DB::table("satisfaction_survey")
                           ->select("satisfaction_survey.*", "clientes.nombres")
                            ->where("satisfaction_survey.id_user", $id_adviser)
                            ->join("clientes", "clientes.id_cliente", "=", "satisfaction_survey.id_client")
                            ->get();


        $total_average = 0;
        foreach($data as $value){

            $total_stars = $value->question1
                            + $value->question2
                            + $value->question3
                            + $value->question4
                            + $value->question5
                            + $value->question6
                            + $value->question7
                            + $value->question8
                            + $value->question9
                            + $value->question10;

            $value->average = round($total_stars / 10);

            $total_average = $total_average + $value->average;

        }

        $response["data"] = $data;

        if($total_average == 0){
            $response["total_average"] = 0;
        }else{
            $response["total_average"] = round($total_average / count($data));
        }


        return response()->json($response)->setStatusCode(200);
    }




    public function IcomeMonth($id_user){

        $date_init = date("Y-m")."-01";
        $date_end  = date("Y-m")."-30";

        $fecha = new DateTime();
        $fecha->modify('last day of this month');
        $date_end =  $fecha->format('Y-m-d'); // imprime por ejemplo: 31/12/2012


        $data = DB::table("surgeries")

                        ->selectRaw("SUM(surgeries.amount) as amount")

                        ->join("auditoria", "auditoria.cod_reg", "=", "surgeries.id_surgeries")
                        ->where("surgeries.fecha", ">=", $date_init)
                        ->where("surgeries.fecha", "<=", $date_end)
                        ->where("surgeries.status_surgeries", 1)
                        ->where("auditoria.tabla", "surgeries")
                        ->where("auditoria.usr_regins", $id_user)

                        ->first();



        $surgeries = DB::table("surgeries")

                        ->join("auditoria", "auditoria.cod_reg", "=", "surgeries.id_surgeries")
                        ->where("surgeries.fecha", ">=", $date_init)
                        ->where("surgeries.fecha", "<=", $date_end)
                        ->where("surgeries.status_surgeries", 1)
                        ->where("auditoria.tabla", "surgeries")
                        ->where("auditoria.usr_regins", $id_user)

                        ->get();

        $total_aditionals = 0;
        foreach($surgeries as $value){

            $data_aditionals = DB::table("surgeries_additional")
                                ->selectRaw("SUM(price_aditional) as total")
                                ->where("id_surgerie", $value->id_surgeries)
                                ->first();

            $total_aditionals = $total_aditionals + $data_aditionals->total;


        }

        $total_icome = $total_aditionals + $data->amount;


     //   echo json_encode($data);
        return $total_icome;
    }






    public function ReportGeneral(){


        $advisers = DB::table("users")
                        ->selectRaw("users.id,  CONCAT(datos_personales.nombres, ' ', datos_personales.apellido_p) as name_adviser")
                        ->where("users.id_rol", 9)
                        ->join("datos_personales", "datos_personales.id_usuario", "=", "users.id")
                        ->get();
        $data = [];
        foreach($advisers as $adviser){

            $array_adviser["name"]                 = $adviser->name_adviser;
            $array_adviser["prp"]                  = $this->QtyPrpMonth($adviser->id)->original->qty;
            $array_adviser["califications_google"] = $this->QtyCalificationsGoogle($adviser->id)->original->qty;
            $array_adviser["valorations"]          = $this->QtyMonthValorations($adviser->id)->original->qty;
            $array_adviser["surgeries"]            = $this->QtyMonthSurgeries($adviser->id)->original->qty;
            $array_adviser["income"]               = $this->IcomeMonth($adviser->id);

            $array_adviser["income"]               = $this->IcomeMonth($adviser->id);
          //  echo json_encode($array_adviser["income"]."<br><br>");


            array_push($data, $array_adviser);

        }



        echo json_encode($data);

    }




}
