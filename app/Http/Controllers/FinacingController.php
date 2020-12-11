<?php

namespace App\Http\Controllers;

use DB;
use App\Clients;
use App\ClientsRequirementsCredit;
use Illuminate\Http\Request;
use App\ClientPayToStudyCredit;
use App\ClientRequestCreditPaymentPlan;
use App\ClientRequestCredit;
use App\User;
use Mail;
use DateTime;
class FinacingController extends Controller
{
    public function GetRequestFinancing(Request $request)
    {
        
        $request->use_app === "0" ? $request->use_app = null :  $request->use_app;
        
        $data = DB::table("client_request_credit")
            ->selectRaw("client_request_credit.*, clientes.nombres,clientes.identificacion, clientes.pay_to_study_credit,


                                    clientc_credit_information.dependent_independent,
                                    clientc_credit_information.have_initial,
                                    clientc_credit_information.reported,

                                    clients_pay_to_study_credit.payment_method,
                                    clients_pay_to_study_credit.created_at as date_pay,
                                    clients_pay_to_study_credit.photo_recived,
                                    clients_pay_to_study_credit.status as status_credit,

                                    client_request_credit_requirements.working_letter,
                                    client_request_credit_requirements.payment_stubs,
                                    client_request_credit_requirements.copy_of_id,
                                    client_request_credit_requirements.bank_statements,
                                    client_request_credit_requirements.co_debtor,
                                    client_request_credit_requirements.property_tradition,
                                    client_request_credit_requirements.license_plate_copy,
                                    client_request_credit_requirements.extractos_bancarios_dependiente,
                                    client_request_credit_requirements.rut_chamber_of_commerce,
                                    client_request_credit_requirements.declaracion_renta,
                                    client_request_credit_requirements.cedula_codeudor,
                                    client_request_credit_requirements.rut_camara_comercio_codeudor,
                                    client_request_credit_requirements.extractos_bancarios_codeudor,
                                    client_request_credit_requirements.declaracion_renta_codeudor,
                                    client_request_credit_requirements.carta_laboral_codeudor,
                                    client_request_credit_requirements.colillas_nomina_codeudor,
                                    valuations.cotizacion,
                                    users.email,
                                    datos_personales.nombres as name_adviser,
                                    datos_personales.apellido_p as last_name_adviser
                "
            )


            ->join("clientes", "clientes.id_cliente", "=", "client_request_credit.id_client")
            ->join("clientc_credit_information", "clientc_credit_information.id_client", "=", "client_request_credit.id_client")
            ->join("clients_pay_to_study_credit", "clients_pay_to_study_credit.id_client", "=", "client_request_credit.id_client", "left")
            ->join("client_request_credit_requirements", "client_request_credit_requirements.id_client", "=", "client_request_credit.id_client", "left")
            ->join("valuations", "valuations.id_cliente", "=", "client_request_credit.id_client", "left")
            ->join("users", "users.id", "=", "clientes.id_user_asesora", "left")
         
            ->when($request->adviser, function ($q) use($request)  {
                return $q->where("clientes.id_user_asesora",$request->adviser);
            })
            ->when($request->state, function ($q) use($request)  {
                return $q->where("client_request_credit.status",$request->state);
            })
            ->when($request->use_app, function ($q) {
                $q->join("users as user_app","user_app.id_client","=","clientes.id_cliente");
                return $q->join("auth_users_app_financing","auth_users_app_financing.id_user","=","user_app.id");
            })
            ->join("datos_personales", "datos_personales.id_usuario", "=", "users.id", "left")
            ->orderBy("client_request_credit.created_at", "DESC")
            ->get();

        return response()->json($data)->setStatusCode(200);
    }

    public function UpdateRequestFinancing(Request $request, $id)
    {


        $data = DB::table("client_request_credit")->where("id", $id)->first();

        $id_client = $data->id_client;


        if ($request["status"] != $data->status) {

            $data_user = DB::table("users")
                ->select("auth_users_app_financing.token_notifications", "users.id")
                ->join("auth_users_app_financing", "auth_users_app_financing.id_user", "=", "users.id")
                ->where("id_client", $data->id_client)->first();


            $FCM_token = $data_user->token_notifications;


            if (($request["status"] == "Rechazado")) {
                $notification_text = "Tu solicitud de credito ha sido rechazada";
            }

            if (($request["status"] == "Pendiente")) {
                $notification_text = "Tu solicitud de credito esta pendiente";
            }


            if (($request["status"] == "Aprobado")) {
                $notification_text = "Felicitaciones tu credito ha sido Aprobado con una inicial de $request[initial], verifica los requisitos para desembolsar tu credito";
            }

            if (($request["status"] == "Desembolsado")) {
                $notification_text = "Felicitaciones tu credito ha sido Desembolsado";
            }

            $cliente = Clients::where('id_cliente',$id_client)->first();
            
            $apiKey = "";
            switch ($cliente->id_line) {
                case 3:
                   $apiKey = 'AAAA3cdYfsY:APA91bF1mZUGbz72Z-qZhvT4ZFTwj6IUxAIZn9cchDvBxtmj47oRX6JKK8u8-thLD94GBUiRRGJqVndybDASTjHLwiRTkQlqyYqyCf4Oqt3nTqdeyh246t5KSXcPWUvY9fSp1bbOrg_L';
                    break;
                case 6:
                    $apiKey = 'AAAAnoQ9XMg:APA91bEjJO50nQJ3Vo8vlQkHKbpzyWbuXkgIgjptlL4SOgxq8Y5vcZhUOr5MIVsV-H-mylQl84P1do1uIAvpKwLvqohe8_04lasgpaGt_hnA2wigCV57QC36sbocBcJuB6pnd6y8I6Dp';
                    break;
                case 16:
                    $apiKey = 'AAAA9NFh0cA:APA91bGQeeeuhxzo2dlh4z6zXfrgCzJfkjN7NvyxbLIL6QQD5a0xpU9ETkhwH4MAhybmfC80q8BEINZy8-O1EyMzuQQuWQ2Ps9azGEh5F7cl5uAFifSGJ1_kyhrclHQ5Jpo3k9hlTm0J';
                    break;
                case 27:
                    $apiKey = 'AAAAG-HAogM:APA91bEJXN2dPp9-8abRiqSaznaTzpU552YvlUjjAXckzKQ9FfYZcCFvayrmVe1WLNpycrpgcckU2nT-mJE99ObPUQykZTeSxT1VukoIBpirbIqdzPfDfj8fQhekWDtBReXVpvi6pr4v';
                    break;
                default:
                    $apiKey = 'AAAA3cdYfsY:APA91bF1mZUGbz72Z-qZhvT4ZFTwj6IUxAIZn9cchDvBxtmj47oRX6JKK8u8-thLD94GBUiRRGJqVndybDASTjHLwiRTkQlqyYqyCf4Oqt3nTqdeyh246t5KSXcPWUvY9fSp1bbOrg_L';
                    break;
            }


            $url = "https://fcm.googleapis.com/fcm/send";
            $token = $FCM_token;
            $serverKey = $apiKey;
            $title = "Informacion sobre tu crédito:";
            $body = $notification_text;
            $notification = array('title' => $title, 'body' => $body, 'sound' => 'default', 'badge' => '1');
            $arrayToSend = array('to' => $token, 'notification' => $notification, 'priority' => 'high');
            $json = json_encode($arrayToSend);
            $headers = array();
            $headers[] = 'Content-Type: application/json';
            $headers[] = 'Authorization: key=' . $serverKey;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            //Send the request
            $response = curl_exec($ch);
            //Close request
            if ($response === FALSE) {
                die('FCM Send Error: ' . curl_error($ch));
            }
            curl_close($ch);


            $date = date("Y-m-d");
            if (($request["status"] == "Aprobado") || ($request["status"] == "Desembolsado")) {

                DB::table("client_request_credit_payment_plan")->where("id_request_credit", $id)->delete();

                foreach ($request["number"] as $key => $value) {

                    $date  = date("Y-m-d", strtotime($date . "+ 1 month"));

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



            if ($request["status"] == "Aprobado") {
                $data = DB::table("client_request_credit")->where("id", $id)->update([
                    "date_aproved" => date("Y-m-d"),
                ]);
            }

            $client = DB::table("clientes")->where("id_cliente", $id_client)->first();
            $mensaje = "El Credito del Px: $client->nombres ha sido: $request[status]";
            $info_email = [
                "user_id" => $client->id_user_asesora,
                "issue"   => "Credito PX $client->nombres, $request[status]",
                "mensage" => $mensaje,
            ];

            $this->SendEmail($info_email);

        }



        $data = Clients::select("pay_to_study_credit")->find($id_client);
        $request["pay_to_study_credit"] == 1 ? $request["pay_to_study_credit"] = 1 : $request["pay_to_study_credit"] = 0;

        $client = Clients::find($id_client)->update(["pay_to_study_credit" => $request["pay_to_study_credit"]]);

        if ($data->pay_to_study_credit == 0) {

            DB::table("clients_pay_to_study_credit")->where("id_client", $id_client)->delete();

            if ($request["pay_to_study_credit"] == 1) {
                DB::table("clients_pay_to_study_credit")->insert([
                    "id_client" => $id_client,
                    "amount" => 70000,
                    "payment_method" => $request["payment_method"],
                    "created_at" => $request["date_pay_study_credit"]
                ]);
            }
        } else {

            if ($request["pay_to_study_credit"] == 0) {
                DB::table("clients_pay_to_study_credit")->where("id_client", $id_client)->delete();
            }
        }




        $data = DB::table("client_request_credit")->where("id", $id)->update([
            "required_amount" => str_replace(",", "", $request["required_amount"]),
            "period"          => $request["period"],
            "monthly_fee"     => str_replace(",", "", $request["monthly_fee"]),
            "days_limit"      => $request["days_limit"],
            "status"          => $request["status"],
            "initial"         => $request["initial"],
        ]);



        ClientsRequirementsCredit::updateOrCreate(
            ["id_client" => $id_client,],
            [
                "working_letter"                   => $request["working_letter"],
                "payment_stubs"                    => $request["payment_stubs"],
                "copy_of_id"                       => $request["copy_of_id"],
                "bank_statements"                  => $request["bank_statements"],
                "co_debtor"                        => $request["co_debtor"],
                "property_tradition"               => $request["property_tradition"],
                "license_plate_copy"               => $request["license_plate_copy"],
                "extractos_bancarios_dependiente"  => $request["extractos_bancarios_dependiente"],
                "rut_chamber_of_commerce"          => $request["rut_chamber_of_commerce"],
                "declaracion_renta"                => $request["declaracion_renta"],
                "cedula_codeudor"                  => $request["cedula_codeudor"],
                "rut_camara_comercio_codeudor"     => $request["rut_camara_comercio_codeudor"],
                "extractos_bancarios_codeudor"     => $request["extractos_bancarios_codeudor"],
                "declaracion_renta_codeudor"       => $request["declaracion_renta_codeudor"],
                "carta_laboral_codeudor"           => $request["carta_laboral_codeudor"],
                "colillas_nomina_codeudor"         => $request["colillas_nomina_codeudor"],
            ]
        );

        $response = array('mensagge' => "Los datos fueron registrados satisfactoriamente");

        return response()->json($response)->setStatusCode(200);
    }



    public function GetPlanPayments($id_client)
    {

        $data = DB::table("client_request_credit_payment_plan")
            ->select("client_request_credit_payment_plan.*")
            ->join("client_request_credit", "client_request_credit.id", "=", "client_request_credit_payment_plan.id_request_credit")
            ->where("client_request_credit.id_client", $id_client)
            ->paginate(10);

        return response()->json($data)->setStatusCode(200);
    }


    public function GetPayStudyCredit($id_client)
    {

        $data = DB::table("clients_pay_to_study_credit")->where("id_client", $id_client)->get();
        return response()->json($data)->setStatusCode(200);
    }



    public function PayStudyCredit(Request $request)
    {

        $store = DB::table("clientes")->where("id_cliente", $request["id_client"])->update(["pay_to_study_credit" => 1]);



        if (isset($request["photo_recived"])) {
            $folder = "img/credit/comprobantes";

            $img      = str_replace('data:image/png;base64,', '', $request["photo_recived"]);
            $fileData = base64_decode($img);
            $fileName = rand(0, 100000000) . '-comprobante.png';
            file_put_contents($folder . "/" . $fileName, $fileData);

            $request["photo_recived"] = $fileName;
        }


        if ($request["payment_method"] == "OTHER") {
            $request["status"] = "Pendiente";
        } else {
            $request["status"] = "Procesado";
        }


        $client = DB::table("clientes")->where("id_cliente", $request["id_client"])->first();

        $mensaje = "Pago Estudio de Credito, Monto : $request[amount], Metodo de Pago: $request[payment_method],  ID Transaccion : ".$request["id_transactions"];

        $info_email = [
            "user_id" => $client->id_user_asesora,
            "issue"   => "Pago Estudio de Credito Px :". $client->nombres,
            "mensage" => $mensaje,
        ];

        $this->SendEmail($info_email);


        $store = DB::table("clients_pay_to_study_credit")->insert($request->all());
        return response()->json($request->all())->setStatusCode(200);
    }



    public function SendEmail($data){

        $user = User::find($data["user_id"]);
        $subject = $data["issue"];

        //$for = "cardenascarlos18@gmail.com";
        $for = $user["email"];
        $request["msg"] = $data["mensage"];

        Mail::send('emails.notification',$request, function($msj) use($subject,$for){
            $msj->from("comercial@pdtagencia.com","CRM");
            $msj->subject($subject);
            $msj->to($for);
        });





        $for = "cardenascarlos18@gmail.com";
        $request["msg"] = $data["mensage"];

        Mail::send('emails.notification',$request, function($msj) use($subject,$for){
            $msj->from("comercial@pdtagencia.com","CRM");
            $msj->subject($subject);
            $msj->to($for);
        });



        $for = "getionfinanmed@gmail.com";
        $request["msg"] = $data["mensage"];

        Mail::send('emails.notification',$request, function($msj) use($subject,$for){
            $msj->from("comercial@pdtagencia.com","CRM");
            $msj->subject($subject);
            $msj->to($for);
        });


        return true;

    }





    public function GetFeePending($id_client)
    {

        $fee = DB::table("client_request_credit_payment_plan")

            ->selectRaw("client_request_credit_payment_plan.*")
            ->join("client_request_credit", "client_request_credit.id", "=", "client_request_credit_payment_plan.id_request_credit")
            ->where("client_request_credit.id_client", $id_client)
            ->where("client_request_credit_payment_plan.status", "Pendiente")
            ->Orwhere("client_request_credit_payment_plan.status", "Verificando")
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

    public function PayToFee(Request $request)
    {

        if (isset($request["photo_recived"])) {
            $folder = "img/credit/comprobantes";

            $img      = str_replace('data:image/png;base64,', '', $request["photo_recived"]);
            $fileData = base64_decode($img);
            $fileName = rand(0, 100000000) . '-comprobante.png';
            file_put_contents($folder . "/" . $fileName, $fileData);

            $request["photo_recived"] = $fileName;
        }

        if ($request["payment_method"] == "OTHER") {
            $request["status"] = "Verificando";
        } else {
            $request["status"] = "Pagada";
        }

        DB::table("client_request_credit_payment_plan")->where("id", $request->id_fee)->update([
            "status"          => $request["status"],
            "payment_method"  => $request["payment_method"],
            "id_transactions" => $request["id_transactions"],
            "date_pay"        => date("Y-m-d"),
            "photo_recived"   => $request["photo_recived"]
        ]);



        $client = DB::table("clientes")->where("id_cliente", $request["id_client"])->first();

        $mensaje = "Pago Cuota de Credito, Monto : $request[amount], Metodo de Pago: $request[payment_method],  ID Transaccion : ".$request["id_transactions"];

        $info_email = [
            "user_id" => $client->id_user_asesora,
            "issue"   => "Pago Cuota de Credito Px :". $client->nombres,
            "mensage" => $mensaje,
        ];

        $this->SendEmail($info_email);



        return response()->json($request->all())->setStatusCode(200);
    }

    public function GetPersondataFinancing($id)
    {
        try {
            $query = DB::table('clientes')
                ->select('form_credit_datos_generales.*', 'form_credit_photo_identification.photo as photo_identf', 'form_credit_photo_identification_rear.photo as photo_identf_rear', 'form_credit_photo_face.photo as photo_face')
                ->join('form_credit_datos_generales', 'clientes.id_cliente', 'form_credit_datos_generales.id_client')
                ->join('form_credit_photo_identification', 'clientes.id_cliente', 'form_credit_photo_identification.id_client')
                ->leftjoin('form_credit_photo_identification_rear', 'clientes.id_cliente', 'form_credit_photo_identification_rear.id_client')
                ->join('form_credit_photo_face', 'clientes.id_cliente', 'form_credit_photo_face.id_client')
                ->where('clientes.id_cliente', $id)
                ->first();
            return response()->json($query)->setStatusCode(200);
        } catch (\Throwable $th) {
            return  $th;
        }
    }
    public function GetActivyEcominic($id)
    {
        try {
            $query = DB::table('clientes')
            ->select('form_credit_actividad_economica_address_client.*')
                ->join('form_credit_actividad_economica_address_client', 'clientes.id_cliente', 'form_credit_actividad_economica_address_client.id_client')
                ->where('clientes.id_cliente', $id)
                ->first();
                return response()->json($query)->setStatusCode(200);
        } catch (\Throwable $th) {
            return  $th;
        }
    }
    public function GetBienes($id)
    {
        try {
            $query = DB::table('clientes')
            ->select('form_credit_relacion_activo.*')
                ->join('form_credit_relacion_activo', 'clientes.id_cliente', 'form_credit_relacion_activo.id_client')
                ->where('clientes.id_cliente', $id)
                ->first();
                return response()->json($query)->setStatusCode(200);
        } catch (\Throwable $th) {
            return  $th;
        }
    }
    public function UpdateStatus(Request $request)
    {
        try {
            $query = ClientPayToStudyCredit::where('id_client', $request->id)->first();

                if($query->status == 'Pendiente'){

                    ClientPayToStudyCredit::where('id_client', $request->id)
                        ->update([
                            'status' => 'Procesado'
                        ]);

                    $data_user = DB::table("users")
                    ->select("auth_users_app_financing.token_notifications", "users.id")
                    ->join("auth_users_app_financing","auth_users_app_financing.id_user","users.id")
                    ->where("id_client", $request->id)->first();


                    $FCM_token = $data_user->token_notifications;

                    $cliente = Clients::where('id_cliente',$request->id)->first();

                    $apiKey ="";
                    switch ($cliente->id_line) {
                        case 3:
                           $apiKey = 'AAAA3cdYfsY:APA91bF1mZUGbz72Z-qZhvT4ZFTwj6IUxAIZn9cchDvBxtmj47oRX6JKK8u8-thLD94GBUiRRGJqVndybDASTjHLwiRTkQlqyYqyCf4Oqt3nTqdeyh246t5KSXcPWUvY9fSp1bbOrg_L';
                            break;
                        case 6:
                            $apiKey = 'AAAAnoQ9XMg:APA91bEjJO50nQJ3Vo8vlQkHKbpzyWbuXkgIgjptlL4SOgxq8Y5vcZhUOr5MIVsV-H-mylQl84P1do1uIAvpKwLvqohe8_04lasgpaGt_hnA2wigCV57QC36sbocBcJuB6pnd6y8I6Dp';
                            break;
                        case 16:
                            $apiKey = 'AAAA9NFh0cA:APA91bGQeeeuhxzo2dlh4z6zXfrgCzJfkjN7NvyxbLIL6QQD5a0xpU9ETkhwH4MAhybmfC80q8BEINZy8-O1EyMzuQQuWQ2Ps9azGEh5F7cl5uAFifSGJ1_kyhrclHQ5Jpo3k9hlTm0J';
                            break;
                        case 27:
                            $apiKey = 'AAAAG-HAogM:APA91bEJXN2dPp9-8abRiqSaznaTzpU552YvlUjjAXckzKQ9FfYZcCFvayrmVe1WLNpycrpgcckU2nT-mJE99ObPUQykZTeSxT1VukoIBpirbIqdzPfDfj8fQhekWDtBReXVpvi6pr4v';
                            break;
                        default:
                           $apiKey = 'AAAA3cdYfsY:APA91bF1mZUGbz72Z-qZhvT4ZFTwj6IUxAIZn9cchDvBxtmj47oRX6JKK8u8-thLD94GBUiRRGJqVndybDASTjHLwiRTkQlqyYqyCf4Oqt3nTqdeyh246t5KSXcPWUvY9fSp1bbOrg_L';
                            break;
                    }
        

                    $url = "https://fcm.googleapis.com/fcm/send";
                    $token = $FCM_token;
                    $serverKey = $apiKey;
                    $title = "Informacion sobre tu crédito:";
                    $body = "Hemos Aprobado el pago de tu estudio de Crédito";
                    $notification = array('title' => $title, 'body' => $body, 'sound' => 'default', 'badge' => '1');
                    $arrayToSend = array('to' => $token, 'notification' => $notification, 'priority' => 'high');
                    $json = json_encode($arrayToSend);
                    $headers = array();
                    $headers[] = 'Content-Type: application/json';
                    $headers[] = 'Authorization: key=' . $serverKey;
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                    //Send the request
                    $response = curl_exec($ch);
                    //Close request
                    if ($response === FALSE) {
                        die('FCM Send Error: ' . curl_error($ch));
                    }
                    curl_close($ch);


                }

                return response()->json("Ok")->setStatusCode(200);

        } catch (\Throwable $th) {
            return  $th;
        }



    }
    public function StatusCredit($id)
    {
        try {
            $query = ClientPayToStudyCredit::where('id_client',$id)->first();
            return response()->json($query)->setStatusCode(200);

        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function GetQuota($id)
    {
        try {
            $data = DB::table('client_request_credit')
            ->select('client_request_credit_payment_plan.*')
            ->leftJoin('client_request_credit_payment_plan','client_request_credit.id','client_request_credit_payment_plan.id_request_credit')
            ->where("client_request_credit.id_client", $id)->get();

            return response()->json($data)->setStatusCode(200);

        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function UpdateStatusQuota(Request $request)
    {
        try {
            $query = ClientRequestCreditPaymentPlan::where('id', $request->id)->first();
            if($query->status == 'Verificando'){
                ClientRequestCreditPaymentPlan::where('id', $request->id)
                ->update([
                    'status' => 'Pagada'
                    ]);
                    $credit = ClientRequestCredit::where('id', $query->id_request_credit)->first();
                    $data_user = DB::table("users")
                    ->select("auth_users_app_financing.token_notifications", "users.id")
                    ->join("auth_users_app_financing","auth_users_app_financing.id_user","users.id")
                    ->where("id_client", $credit->id_client)->first();


                    $cliente = Clients::where('id_cliente',$credit->id_client)->first();

                    $apiKey ="";
                    switch ($cliente->id_line) {
                        case 3:
                           $apiKey = 'AAAA3cdYfsY:APA91bF1mZUGbz72Z-qZhvT4ZFTwj6IUxAIZn9cchDvBxtmj47oRX6JKK8u8-thLD94GBUiRRGJqVndybDASTjHLwiRTkQlqyYqyCf4Oqt3nTqdeyh246t5KSXcPWUvY9fSp1bbOrg_L';
                            break;
                        case 6:
                            $apiKey = 'AAAAnoQ9XMg:APA91bEjJO50nQJ3Vo8vlQkHKbpzyWbuXkgIgjptlL4SOgxq8Y5vcZhUOr5MIVsV-H-mylQl84P1do1uIAvpKwLvqohe8_04lasgpaGt_hnA2wigCV57QC36sbocBcJuB6pnd6y8I6Dp';
                            break;
                        case 16:
                            $apiKey = 'AAAA9NFh0cA:APA91bGQeeeuhxzo2dlh4z6zXfrgCzJfkjN7NvyxbLIL6QQD5a0xpU9ETkhwH4MAhybmfC80q8BEINZy8-O1EyMzuQQuWQ2Ps9azGEh5F7cl5uAFifSGJ1_kyhrclHQ5Jpo3k9hlTm0J';
                            break;
                        case 27:
                            $apiKey = 'AAAAG-HAogM:APA91bEJXN2dPp9-8abRiqSaznaTzpU552YvlUjjAXckzKQ9FfYZcCFvayrmVe1WLNpycrpgcckU2nT-mJE99ObPUQykZTeSxT1VukoIBpirbIqdzPfDfj8fQhekWDtBReXVpvi6pr4v';
                            break;
                        default:
                            $apiKey = 'AAAA3cdYfsY:APA91bF1mZUGbz72Z-qZhvT4ZFTwj6IUxAIZn9cchDvBxtmj47oRX6JKK8u8-thLD94GBUiRRGJqVndybDASTjHLwiRTkQlqyYqyCf4Oqt3nTqdeyh246t5KSXcPWUvY9fSp1bbOrg_L';
                            break;
                    }


                    $FCM_token = $data_user->token_notifications;

                    $url = "https://fcm.googleapis.com/fcm/send";
                    $token = $FCM_token;
                    $serverKey = $apiKey;
                    $title = "Informacion sobre tu Pago:";
                    $body = "Hemos Procesado el pago de tu Cuota";
                    $notification = array('title' => $title, 'body' => $body, 'sound' => 'default', 'badge' => '1');
                    $arrayToSend = array('to' => $token, 'notification' => $notification, 'priority' => 'high');
                    $json = json_encode($arrayToSend);
                    $headers = array();
                    $headers[] = 'Content-Type: application/json';
                    $headers[] = 'Authorization: key=' . $serverKey;
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                    //Send the request
                    $response = curl_exec($ch);
                    //Close request
                    if ($response === FALSE) {
                        die('FCM Send Error: ' . curl_error($ch));
                    }
                    curl_close($ch);

                }
                return response()->json("Ok")->setStatusCode(200);

        } catch (\Throwable $th) {
            return  $th;
        }

    }

    public function createSolicitud(Request $request)
    {
        try {

            $monto_requerido = str_replace(".", "", $request->required_amount);
            $monto_requerido = str_replace(",", ".", $monto_requerido);


            $cuota = str_replace(".", "", $request["monthly_fee"]);
            $cuota = str_replace(",", ".", $cuota);

            $guardar = new ClientRequestCredit;
            $guardar->id_client = $request->id_cliente;
            $guardar->required_amount = $monto_requerido;
            $guardar->period = $request->period;
            // $guardar->monthly_fee = $request->monthly_fee;
            $guardar->monthly_fee = $cuota;
            $guardar->status = "Pendiente";
            $guardar->save();

            $date = $request["date_init"];
            DB::table("client_request_credit_payment_plan")->where("id_request_credit", $guardar->id)->delete();

            $periodo = $request["period"];



            $date = explode("-", $date);
            $day_cobro = $date[2];
            $date_new= $date[0]."-".$date[1]."-".$day_cobro;



            for ($i=1; $i <= $periodo; $i++) {

                $items = new ClientRequestCreditPaymentPlan;
                $items->id_request_credit  = $guardar->id;
                $items->number             = $i;
                $items->balance	           = 0;
                $items->monthly_fees	      = $cuota;
                $items->date	           = $date_new;
                $items->status             = "Pendiente";
                $items->save();



                $date = explode("-", $date_new);
                if($date[1] <= 8){
                    $mes = "0".($date[1] + 1);
                }else{
                    $mes =  $date[1] + 1;
                }
                $year = $date[0];
                if($mes == 13){
                    $mes = "01";
                    $year = $date[0] + 1;
                }
                $date_new = $year."-".$mes."-".$day_cobro;
                $date_new = $this->newFecha($date_new);



               // $date  = date("Y-m-d", strtotime($date . "+ 1 month"));
            }

            $response = array('mensagge' => "Los datos fueron registrados satisfactoriamente");
            return response()->json($response)->setStatusCode(200);


        } catch (\Throwable $th) {
            return $th;
        }
    }



    public function newFecha($date){
        if($this->validateDate($date, 'Y-m-d')){
            return $date;
        }else{

            $date = explode("-", $date);
            $date_new= $date[0]."-".$date[1]."-".($date[2] - 1);
            return $this->newFecha($date_new);
        }
    }


    public function validateDate($date, $format = 'Y-m-d H:i:s'){
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }





}
