<?php

namespace App\Http\Controllers;

use DB;
use App\Clients;
use App\ClientsRequirementsCredit;
use Illuminate\Http\Request;

class FinacingController extends Controller
{
    public function GetRequestFinancing(){
        
        
        $data = DB::table("client_request_credit")
                        ->selectRaw("client_request_credit.*, clientes.nombres, clientes.pay_to_study_credit, 


                                    clientc_credit_information.dependent_independent, 
                                    clientc_credit_information.have_initial, 
                                    clientc_credit_information.reported, 

                                    clients_pay_to_study_credit.payment_method, 
                                    clients_pay_to_study_credit.created_at as date_pay,

                                    client_request_credit_requirements.working_letter,
                                    client_request_credit_requirements.payment_stubs,
                                    client_request_credit_requirements.copy_of_id,
                                    client_request_credit_requirements.bank_statements,
                                    client_request_credit_requirements.co_debtor,
                                    client_request_credit_requirements.property_tradition,
                                    client_request_credit_requirements.license_plate_copy"
                        )


                        ->join("clientes", "clientes.id_cliente", "=", "client_request_credit.id_client")
                        ->join("clientc_credit_information", "clientc_credit_information.id_client", "=", "client_request_credit.id_client")
                        ->join("clients_pay_to_study_credit", "clients_pay_to_study_credit.id_client", "=", "client_request_credit.id_client", "left")
                        ->join("client_request_credit_requirements", "client_request_credit_requirements.id_client", "=", "client_request_credit.id_client", "left")
                        ->orderBy("client_request_credit.created_at", "DESC")
                        ->get();

        return response()->json($data)->setStatusCode(200);

    }



    public function UpdateRequestFinancing(Request $request, $id){


        $data = DB::table("client_request_credit")->where("id", $id)->first();

        $id_client = $data->id_client;


        if($request["status"] != $data->status){

            $data_user = DB::table("users")
                          ->select("auth_users_app_financing.token_notifications", "users.id")
                          ->join("auth_users_app_financing", "auth_users_app_financing.id_user", "=", "users.id")
                          ->where("id_client", $data->id_client)->first();

            
            $FCM_token = $data_user->token_notifications;


            if(($request["status"] == "Rechazado")){
                $notification_text = "Tu solicitud de credito ha sido rechazada";
            }

            if(($request["status"] == "Pendiente")){
                $notification_text = "Tu solicitud de credito esta pendiente";
            }


            if(($request["status"] == "Aprobado")){
                $notification_text = "Felicitaciones tu credito ha sido Aprobado, verifica los requisitos para desembolsar tu credito";
            }

            if(($request["status"] == "Desembolsado")){
                $notification_text = "Felicitaciones tu credito ha sido Desembolsado";
            }
        
            $url = "https://fcm.googleapis.com/fcm/send";
            $token = $FCM_token;
            $serverKey = 'AAAA3cdYfsY:APA91bF1mZUGbz72Z-qZhvT4ZFTwj6IUxAIZn9cchDvBxtmj47oRX6JKK8u8-thLD94GBUiRRGJqVndybDASTjHLwiRTkQlqyYqyCf4Oqt3nTqdeyh246t5KSXcPWUvY9fSp1bbOrg_L';
            $title = "Informacion sobre tu crédito:";
            $body = $notification_text;
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


            $date = date("Y-m-d");
            if(($request["status"] == "Aprobado") || ($request["status"] == "Desembolsado")){
                
                DB::table("client_request_credit_payment_plan")->where("id_request_credit", $id)->delete();
                foreach($request["number"] as $key => $value){

                    $date  = date("Y-m-d",strtotime($date."+ 1 month"));

                    $array = [];
                    $array["id_request_credit"]  = $id;
                    $array["number"]             = $value;
                    $array["interest"]           = str_replace(",", "", $request["interest"][$key]);
                    $array["credit_to_capital"]  = str_replace(",", "", $request["credit_to_capital"][$key]);
                    $array["monthly_fees"]       = str_replace(",", "", $request["monthly_fees"][$key]);
                    $array["balance"]            = str_replace(",", "", $request["balance"][$key]);
                    $array["date"]               = $date; 
                    
        
                    DB::table("client_request_credit_payment_plan")->insert($array);

                }
                
            }

        }



        $data = Clients::select("pay_to_study_credit")->find($id_client);
        $request["pay_to_study_credit"] == 1 ? $request["pay_to_study_credit"] = 1 : $request["pay_to_study_credit"] = 0;
       
        $client = Clients::find($id_client)->update(["pay_to_study_credit" => $request["pay_to_study_credit"]]);

        if($data->pay_to_study_credit == 0){

            DB::table("clients_pay_to_study_credit")->where("id_client", $id_client)->delete();
        
            if($request["pay_to_study_credit"] == 1){
                DB::table("clients_pay_to_study_credit")->insert([
                                                                    "id_client" => $id_client, 
                                                                    "amount" => 70000, 
                                                                    "payment_method" => $request["payment_method"], 
                                                                    "created_at" => $request["date_pay_study_credit"]
                                                                ]);
            }

        }else{

            if($request["pay_to_study_credit"] == 0){
                DB::table("clients_pay_to_study_credit")->where("id_client", $id_client)->delete();
            }
            
        }




        $data = DB::table("client_request_credit")->where("id", $id)->update([
            "required_amount" => str_replace(",", "", $request["required_amount"]),
            "period"          => $request["period"],
            "monthly_fee"     => str_replace(",", "", $request["monthly_fee"]),
            "status"          => $request["status"],
        ]);




        ClientsRequirementsCredit::updateOrCreate(
            ["id_client" => $id_client,],
            [
                "working_letter"     => $request["working_letter"],
                "payment_stubs"      => $request["payment_stubs"],
                "copy_of_id"         => $request["copy_of_id"],
                "bank_statements"    => $request["bank_statements"],
                "co_debtor"          => $request["co_debtor"],
                "property_tradition" => $request["property_tradition"],
                "license_plate_copy" => $request["license_plate_copy"]
            ]
        );

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


    public function GetPayStudyCredit($id_client){

        $data = DB::table("clients_pay_to_study_credit")->where("id_client", $id_client)->get();
        return response()->json($data)->setStatusCode(200);
    }



    public function PayStudyCredit(Request $request){

        $store = DB::table("clientes")->where("id_cliente", $request["id_client"])->update(["pay_to_study_credit" => 1]);
        $store = DB::table("clients_pay_to_study_credit")->insert($request->all());
        return response()->json($request->all())->setStatusCode(200);
    }


    public function GetFeePending($id_client){

        $fee = DB::table("client_request_credit_payment_plan")

                    ->selectRaw("client_request_credit_payment_plan.*")
                    ->join("client_request_credit", "client_request_credit.id", "=", "client_request_credit_payment_plan.id_request_credit")
                    ->where("client_request_credit.id_client", $id_client)
                    ->where("client_request_credit_payment_plan.status", "!=", "Pagada")
                    ->orderBy("client_request_credit_payment_plan.number", "ASC")

                    ->first();


        
        $history = DB::table("client_request_credit_payment_plan")

                    ->selectRaw("client_request_credit_payment_plan.*")
                    ->join("client_request_credit", "client_request_credit.id", "=", "client_request_credit_payment_plan.id_request_credit")
                    ->where("client_request_credit.id_client", $id_client)
                    ->where("client_request_credit_payment_plan.status", "=", "Pagada")
                    ->orderBy("client_request_credit_payment_plan.number", "ASC")

                    ->get();


        $data["fee_pending"] = $fee;
        $data["history"]     = $history;
        return response()->json($data)->setStatusCode(200);
    }


    public function PayToFee(Request $request){

        DB::table("client_request_credit_payment_plan")->where("id", $request->id_fee)->update([
            "status"          => "Pagada",
            "payment_method"  => $request["payment_method"],
            "id_transactions" => $request["id_transactions"],
            "date_pay"        => date("Y-m-d")
        ]);
        return response()->json($request->all())->setStatusCode(200);
    }
}