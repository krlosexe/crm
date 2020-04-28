<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clients;
use App\User;
class AdviserController extends Controller
{
    public function GetAffiliates($id_adviser){
       
        $where = array(
            "id_user_asesora" => $id_adviser,
            "prp"             => "Si"
        );
        $data = Clients::where($where)
                        ->select("clientes.*", "users.img_profile as avatar", "users.id as user_id")
                        ->join("users", "users.id_client", "clientes.id_cliente")
                        ->orderBy("clientes.id_cliente", "DESC")
                        ->get();
        return response()->json($data)->setStatusCode(200);
    }


    public function GetRefferers($id_user, $display){
        
        $user = User::where("id", $id_user)->first();


        if($user["id_rol"] == 6){

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


                                              ->orderBy("clientes.id_cliente", "DESC")
                                              ->get();


            }else if($display == "all"){
                $where = array(
                    "clientes.id_user_asesora" => $id_user,
                    "clientes.origen"          => "Referido PRP",
                );


                $data = Clients::where($where)->select("clientes.*", "cl2.nombres as name_affiliate", "client_information_aditional_surgery.name_surgery as interes", "users.token_chat", "users.id as user_id")
                                              ->join("client_information_aditional_surgery", "client_information_aditional_surgery.id_client", "=", "clientes.id_cliente", "left")
                                              ->join("clientes as cl2", "cl2.id_cliente", "=", "clientes.id_affiliate", "left")
                                              ->join("users", "users.id_client", "clientes.id_cliente")
                                              ->whereNotNull('clientes.id_affiliate')
                                              ->orderBy("clientes.id_cliente", "DESC")
                                              ->get();

            }


        }

        if($user["id_rol"] == 17){

            $where = array(
                "clientes.id_affiliate" => $user["id_client"],
                "clientes.origen"          => "Referido PRP",
            );
            

            $data = Clients::where($where)
                ->select("clientes.*", "cl2.nombres as name_affiliate","client_information_aditional_surgery.name_surgery as interes")
                ->join("client_information_aditional_surgery", "client_information_aditional_surgery.id_client", "=", "clientes.id_cliente", "left")
                ->join("clientes as cl2", "cl2.id_cliente", "=", "clientes.id_affiliate")
                ->whereNotNull('clientes.id_affiliate')
                ->orderBy("clientes.id_cliente", "DESC")
                
                ->get();

        }


        if($user["id_rol"] == 19){

            $where = array(
                "clientes.id_cliente" => $user["id_client"]
            );


           $data_client = Clients::where($where) ->first();



        
             $data = User::where("users.id",$data_client["id_user_asesora"])
                            ->selectRaw("users.id as user_id , users.email, CONCAT(datos_personales.nombres, ' ', datos_personales.apellido_p) as nombres, datos_personales.telefono , auth_users_app.token_notifications, users.token_chat")
                            ->join("datos_personales", "datos_personales.id_usuario", "=", "users.id")
                            ->join("auth_users_app", "auth_users_app.id_user", "=", "users.id")
                            ->get();

        }


        

        return response()->json($data)->setStatusCode(200);

    }   



    public function GetProcesses($id_user, $display){
        


        $user = User::where("id", $id_user)->first();


        if($user["id_rol"] == 6){

            if($display == "self"){
                $where = array(
                    "clientes.id_user_asesora" => $id_user,
                    "clientes.origen"          => "Referido Asesora",
                );


                $data = Clients::where($where)->selectRaw("clientes.nombres, client_information_aditional_surgery.name_surgery as interes,
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
                    "clientes.id_user_asesora" => $id_user,
                    "clientes.origen"          => "Referido PRP",
                );


                $data = Clients::where($where)->select("clientes.nombres", "cl2.nombres as name_affiliate", "client_information_aditional_surgery.name_surgery as interes")
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
                "clientes.id_affiliate" => $user["id_client"],
                "clientes.origen"          => "Referido PRP",
            );
            

            $data = Clients::where($where)
                ->select("clientes.nombres", "cl2.nombres as name_affiliate","client_information_aditional_surgery.name_surgery as interes")
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
}
