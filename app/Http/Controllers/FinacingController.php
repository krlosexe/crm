<?php

namespace App\Http\Controllers;

use DB;

use Illuminate\Http\Request;

class FinacingController extends Controller
{
    public function GetRequestFinancing(){
        
        
        $data = DB::table("client_request_credit")
                        ->select("client_request_credit.*", "clientes.nombres")
                        ->join("clientes", "clientes.id_cliente", "=", "client_request_credit.id_client")
                        ->orderBy("client_request_credit.created_at", "DESC")
                        ->get();

        return response()->json($data)->setStatusCode(200);

    }



    public function UpdateRequestFinancing(Request $request, $id){


        $data = DB::table("client_request_credit")->where("id", $id)->first();

       
        if($request["status"] != $data->status){

            $data_user = DB::table("users")
                          ->select("auth_users_app_financing.token_notifications", "users.id")
                          ->join("auth_users_app_financing", "auth_users_app_financing.id_user", "=", "users.id")
                          ->where("id_client", $data->id_client)->first();

            $FCM_token = $data_user->token_notifications;

            $url = "https://fcm.googleapis.com/fcm/send";
            $token = $FCM_token;
            $serverKey = 'AAAA3cdYfsY:APA91bF1mZUGbz72Z-qZhvT4ZFTwj6IUxAIZn9cchDvBxtmj47oRX6JKK8u8-thLD94GBUiRRGJqVndybDASTjHLwiRTkQlqyYqyCf4Oqt3nTqdeyh246t5KSXcPWUvY9fSp1bbOrg_L';
            $title = "Informacion sobre tu crédito:";
            $body = "Tu solicitud ha cambiado al estatus : ".$request["status"];
            $notification = array('title' =>$title , 'body' => $body, 'sound' => 'default', 'badge' => '1');
            $arrayToSend = array('to' => $token, 'notification' => $notification,'priority'=>'high');
            $json = json_encode($arrayToSend);
            $headers = array();
            $headers[] = 'Content-Type: application/json';
            $headers[] = 'Authorization: key='. $serverKey;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
            curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            //Send the request
            $response = curl_exec($ch);
            //Close request
            if ($response === FALSE) {
                die('FCM Send Error: ' . curl_error($ch));
            }
            curl_close($ch);


            if($request["status"] == "Aprobado"){
                
                DB::table("client_request_credit_payment_plan")->where("id_request_credit", $id)->delete();
                foreach($request["number"] as $key => $value){

                    $array = [];
                    $array["id_request_credit"]  = $id;
                    $array["number"]             = $value;
                    $array["interest"]           = str_replace(",", "", $request["interest"][$key]);
                    $array["credit_to_capital"]  = str_replace(",", "", $request["credit_to_capital"][$key]);
                    $array["monthly_fees"]       = str_replace(",", "", $request["monthly_fees"][$key]);
                    $array["balance"]            = str_replace(",", "", $request["balance"][$key]);

                    
                    DB::table("client_request_credit_payment_plan")->insert($array);

                }
            }

        }


        $data = DB::table("client_request_credit")->where("id", $id)->update([
            "required_amount" => str_replace(",", "", $request["required_amount"]),
            "period"          => $request["period"],
            "monthly_fee"     => str_replace(",", "", $request["monthly_fee"]),
            "status"          => $request["status"],
        ]);

        
        $response = array('mensagge' => "Los datos fueron registrados satisfactoriamente");    
        
        return response()->json($response)->setStatusCode(200);
    }



    public function GetPlanPayments($id_client){

        $data = DB::table("client_request_credit_payment_plan")
                    ->select("client_request_credit_payment_plan.*")
                    ->join("client_request_credit", "client_request_credit.id", "=", "client_request_credit_payment_plan.id_request_credit")
                    ->where("client_request_credit.id_client", $id_client)
                    ->paginate(10);
        
        return response()->json($data)->setStatusCode(200);
    }
}
