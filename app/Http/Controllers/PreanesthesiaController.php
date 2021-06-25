<?php

namespace App\Http\Controllers;

use App\Auditoria;
use App\Comments;
use App\Preanesthesia;
use App\LogsClients;
use App\Clients;
use DB;
use Illuminate\Http\Request;

class PreanesthesiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {

        $rol     = $request["rol"];
        $id_user = $request["id_user"];


        $adviser = 0;
        if(isset($request["adviser"])){
            $adviser = $request["adviser"];
        }


        $overdue = "all";
        if(isset($request["overdue"])){
            $overdue = $request["overdue"];
        }




        $date_init = 0;
        if(isset($request["date_init"]) && $request["date_init"] != ""){
            $date_init = $request["date_init"];
        }


        $date_finish = 0;
        if(isset($request["date_finish"]) && $request["date_finish"] != ""){
            $date_finish = $request["date_finish"];
        }


        if ($this->VerifyLogin($request["id_user"],$request["token"])){
            $valuations = Preanesthesia::select("preanesthesias.*","preanesthesias.clinic as id_clinic", "clinic.nombre as name_clinic", "auditoria.*", "users.email as email_regis", "clientes.*")
                                ->join("clinic", "clinic.id_clinic", "=", "preanesthesias.clinic")
                                ->join("auditoria", "auditoria.cod_reg", "=", "preanesthesias.id_preanesthesias")
                                ->join("clientes", "clientes.id_cliente", "=", "preanesthesias.id_cliente", "left")
                                ->join("users", "users.id", "=", "auditoria.usr_regins")

                                ->where(function ($query) use ($adviser) {
                                    if($adviser != 0){
                                        $query->whereIn("auditoria.usr_regins", $adviser);
                                    }
                                })

                                ->where(function ($query) use ($overdue) {
                                    if($overdue == "overdue"){
                                        $query->where("preanesthesias.fecha", "<" ,date("Y-m-d"));
                                    }
                                })

                                ->where(function ($query) use ($date_init) {
                                    if($date_init != 0){
                                        $query->where("preanesthesias.fecha", ">=", $date_init);
                                    }
                                })

                                ->where(function ($query) use ($date_finish) {
                                    if($date_finish != 0){
                                        $query->where("preanesthesias.fecha", "<=", $date_finish);
                                    }
                                })





                                ->where("auditoria.tabla", "preanesthesias")
                                ->where("auditoria.status", "!=", "0")
                                ->orderBy("preanesthesias.id_preanesthesias", "DESC")
                                ->get();
            echo json_encode($valuations);
        }else{
            return response()->json("No esta autorizado")->setStatusCode(400);
        }
    }


    function Clients($id_client){

        $valuations = Preanesthesia::select("preanesthesias.*", "preanesthesias.clinic as id_clinic","clinic.nombre as name_clinic", "auditoria.*", "users.email as email_regis", "clientes.*")
                            ->join("clinic", "clinic.id_clinic", "=", "preanesthesias.clinic")
                            ->join("auditoria", "auditoria.cod_reg", "=", "preanesthesias.id_preanesthesias")
                            ->join("clientes", "clientes.id_cliente", "=", "preanesthesias.id_cliente")
                            ->join("users", "users.id", "=", "auditoria.usr_regins")

                             ->where("preanesthesias.id_cliente", $id_client)
                            ->where("auditoria.tabla", "preanesthesias")
                            ->where("auditoria.status", "!=", "0")
                            ->orderBy("preanesthesias.id_preanesthesias", "DESC")
                            ->get();
        echo json_encode($valuations);

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

            $hora_init = strtotime( $request["time"] );
            $hora_end  = strtotime( $request["time_end"] );

            // if($hora_init >= $hora_end){
            //     $data = array('mensagge' => "La hora desde no puede ser mayor o igual a la hora hasta");
            //     return response()->json($data)->setStatusCode(400);
            // }


            // $valid = Preanesthesia::where("fecha", $request["fecha"])
            //                     ->where("time_end", ">=", $request["time"])
            //                     ->where("time",     "<=", $request["time"])
            //                     ->get();

            // if(sizeof($valid) > 0){
            //     $data = array('mensagge' => "Ya existen citas en ese Horario");
            //     return response()->json($data)->setStatusCode(400);
            // }

            $request["surgerie_rental"] == 1 ? $request["surgerie_rental"] = 1 : $request["surgerie_rental"] = 0;

            $store = Preanesthesia::create($request->all());

            $auditoria              = new Auditoria;
            $auditoria->tabla       = "preanesthesias";
            $auditoria->cod_reg     = $store["id_preanesthesias"];
            $auditoria->status      = 1;
            $auditoria->fec_regins  = date("Y-m-d H:i:s");
            $auditoria->usr_regins  = $request["id_user"];
            $auditoria->save();



            $request["table"]    = "preanesthesias";
            $request["id_event"] = $store["id_preanesthesias"];

            if($request->comment != "<p><br></p>"){
                Comments::create($request->all());
            }



            DB::table("events_client")->insert([
                "event"     => "Preanestesia",
                "id_client" => $request["id_cliente"],
                "id_event"  => $store["id_preanesthesias"]
            ]);




            $clinic = DB::table("clinic")->where("id_clinic", $request["clinic"])->first();

            $version["id_user"]   = $request["id_user"];
            $version["id_client"] = $request["id_cliente"];
            $version["event"]     = "Agendo Pre Anestesia para el dia $request[fecha] a las $request[time] en la clinica ".$clinic->nombre;

            LogsClients::create($version);




            $cliente = Clients::where('id_cliente',$request["id_cliente"])->first();

            if($cliente->fcmToken && $cliente->fcmToken != ""){//NUEVA APP DE PRP

                switch ($cliente->id_line) {
                    case 17:
                       $apiKey = "AAAAg-p1HsU:APA91bHJHYE__7tBgvxXHPbMwR2cm7-KyYOknyMz7fAfBYm34YrFMF9QK4FieAEPL54o7EPXilihGevzxoBSf3X4CCHAswTk9NctvFTYY1ftYTYI5hj_-qXVFtCizHHzM060Ojphq62q";
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

                $FCM_token = $cliente->fcmToken;

                $url = "https://fcm.googleapis.com/fcm/send";
                $token = $FCM_token;
                $serverKey = $apiKey;
                $title = "Tu cita de preanestesia fue Agendada";
                $body = "Tu cita de preanestesia fue agendada para el dia $request[fecha]";
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

            }





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
     * @param  \App\Preanesthesia  $preanesthesia
     * @return \Illuminate\Http\Response
     */
    public function show(Preanesthesia $preanesthesia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Preanesthesia  $preanesthesia
     * @return \Illuminate\Http\Response
     */
    public function edit($preanesthesia)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Preanesthesia  $preanesthesia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $preanesthesia)
    {
        if ($this->VerifyLogin($request["id_user"],$request["token"])){


            $hora_init = strtotime( $request["time"] );
            $hora_end  = strtotime( $request["time_end"] );

            // if($hora_init >= $hora_end){
            //     $data = array('mensagge' => "La hora desde no puede ser mayor o igual a la hora hasta");
            //     return response()->json($data)->setStatusCode(400);
            // }


            // $valid = Preanesthesia::where("fecha", $request["fecha"])
            //                         ->where("time_end",         ">=", $request["time"])
            //                         ->where("time",             "<=", $request["time"])
            //                         ->where("id_preanesthesias", "!=", $preanesthesia)
            //                         ->get();

            // if(sizeof($valid) > 0){
            //     $data = array('mensagge' => "Ya existen citas en ese Horario");
            //     return response()->json($data)->setStatusCode(400);
            // }


            $update = Preanesthesia::find($preanesthesia)->update($request->all());


            if(isset($request->comment)){
                if($request->comment != "<p><br></p>"){

                    $array = [];
                    $array["id_event"]   = $preanesthesia;
                    $array["table"]      = "preanesthesias";
                    $array["id_user"]    = $request["id_user"];
                    $array["comment"]    = $request->comment;
                    Comments::insert($array);
                }
            }

            if(isset($request["clinic"])){
                $clinic    = DB::table("clinic")->where("id_clinic", $request["clinic"])->first();
                $name_clinic = $clinic->nombre;
            }else{
                $name_clinic = "";
            }

            $cita      = DB::table("preanesthesias")->where("id_preanesthesias", $preanesthesia)->first();


            $version["id_user"]   = $request["id_user"];
            $version["id_client"] = $cita->id_cliente;
            $version["event"]     = "Actualizo Pre Anestesia para el dia $request[fecha] a las $request[time] en la clinica ".$name_clinic;

            LogsClients::create($version);



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
                                     ->where("tabla", "preanesthesias")->first();
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Preanesthesia  $preanesthesia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Preanesthesia $preanesthesia)
    {
        //
    }
}
