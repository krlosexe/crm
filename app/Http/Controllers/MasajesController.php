<?php

namespace App\Http\Controllers;

use App\Masajes;
use App\Auditoria;
use App\Comments;
use App\Clients;
use DB;
use Illuminate\Http\Request;

class MasajesController extends Controller
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


        if ($this->VerifyLogin($request["id_user"],$request["token"])){
            $valuations = Masajes::select("masajes.*","masajes.clinic as id_clinic", "clinic.nombre as name_clinic", "auditoria.*", "users.email as email_regis", "clientes.*")
                                ->join("clinic", "clinic.id_clinic", "=", "masajes.clinic")
                                ->join("auditoria", "auditoria.cod_reg", "=", "masajes.id_masajes")
                                ->join("clientes", "clientes.id_cliente", "=", "masajes.id_cliente", "left")
                                ->join("users", "users.id", "=", "auditoria.usr_regins")

                                /*->where(function ($query) use ($rol, $id_user) {
                                    if($rol == "Asesor"){
                                        $query->where("clientes.id_user_asesora", $id_user);
                                    }
                                })*/

                                ->with("comments")

                                ->where("auditoria.tabla", "masajes")
                                ->where("auditoria.status", "!=", "0")
                                ->orderBy("masajes.id_masajes", "DESC")
                                ->get();
            echo json_encode($valuations);
        }else{
            return response()->json("No esta autorizado")->setStatusCode(400);
        }
    }


    function Clients($id_client){

        $valuations = Masajes::select("masajes.*", "masajes.clinic as id_clinic","clinic.nombre as name_clinic", "auditoria.*", "users.email as email_regis", "clientes.*")
                            ->join("clinic", "clinic.id_clinic", "=", "masajes.clinic")
                            ->join("auditoria", "auditoria.cod_reg", "=", "masajes.id_masajes")
                            ->join("clientes", "clientes.id_cliente", "=", "masajes.id_cliente")
                            ->join("users", "users.id", "=", "auditoria.usr_regins")

                             ->where("masajes.id_cliente", $id_client)
                            ->where("auditoria.tabla", "masajes")
                            ->where("auditoria.status", "!=", "0")
                            ->orderBy("masajes.id_masajes", "DESC")
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


            // $valid = Masajes::where("fecha", $request["fecha"])
            //                     ->where("time_end", ">=", $request["time"])
            //                     ->where("time",     "<=", $request["time"])
            //                     ->get();

            // if(sizeof($valid) > 0){
            //     $data = array('mensagge' => "Ya existen citas en ese Horario");
            //     return response()->json($data)->setStatusCode(400);
            // }

            $request["surgerie_rental"] == 1 ? $request["surgerie_rental"] = 1 : $request["surgerie_rental"] = 0;

            $store = Masajes::create($request->all());

            $auditoria              = new Auditoria;
            $auditoria->tabla       = "masajes";
            $auditoria->cod_reg     = $store["id_masajes"];
            $auditoria->status      = 1;
            $auditoria->fec_regins  = date("Y-m-d H:i:s");
            $auditoria->usr_regins  = $request["id_user"];
            $auditoria->save();



            $request["table"]    = "masajes";
            $request["id_event"] = $store["id_masajes"];

            if($request->comment != "<p><br></p>"){
                Comments::create($request->all());
            }



            DB::table("events_client")->insert([
                "event"     => "Masajes",
                "id_client" => $request["id_cliente"],
                "id_event"  => $store["id_masajes"]
            ]);








            $cliente = Clients::where('id_cliente',$request["id_cliente"])->first();

            if($cliente->fcmToken && $cliente->fcmToken != ""){//NUEVA APP DE PRP

                switch ($cliente->id_line) {
                    case 17:
                       $apiKey = "AAAAg-p1HsU:APA91bHJHYE__7tBgvxXHPbMwR2cm7-KyYOknyMz7fAfBYm34YrFMF9QK4FieAEPL54o7EPXilihGevzxoBSf3X4CCHAswTk9NctvFTYY1ftYTYI5hj_-qXVFtCizHHzM060Ojphq62q";
                        break;
                    case 6:
                        $apiKey = 'AAAAYEG4vHw:APA91bGFWTsV1GsGaNdTZ7zNh4lM7zzTVO6cH-uB6bbjLxoUo3gfYDoIEMtbU6ioIC1BmAKVI3D_btMJg2Jd3urI8l3Pb9noB0FEkU7_6EGKnv7ymZULMwv0dKLCEprIuKwMJNUQDrEe';
                        break;
                    case 7:
                        $apiKey = 'AAAAYEG4vHw:APA91bGFWTsV1GsGaNdTZ7zNh4lM7zzTVO6cH-uB6bbjLxoUo3gfYDoIEMtbU6ioIC1BmAKVI3D_btMJg2Jd3urI8l3Pb9noB0FEkU7_6EGKnv7ymZULMwv0dKLCEprIuKwMJNUQDrEe';
                        break;
                    case 8:
                        $apiKey = 'AAAAYEG4vHw:APA91bGFWTsV1GsGaNdTZ7zNh4lM7zzTVO6cH-uB6bbjLxoUo3gfYDoIEMtbU6ioIC1BmAKVI3D_btMJg2Jd3urI8l3Pb9noB0FEkU7_6EGKnv7ymZULMwv0dKLCEprIuKwMJNUQDrEe';
                        break;



                    case 9:
                        $apiKey = 'AAAACnbvohQ:APA91bFxy5YUQlAXGxEF2BjU-bLXp1C13ClaB3kPvAFCwqraIyNRXwXYueJRxNeAGmSfaKCD2SgFyd03HfxgDODR74k630dC3q-Gy56U_EuNea6Fr2ZXeTs_mQ3nK--LqXdQ37zm7dt0';
                        break;

                    case 21:
                        $apiKey = 'AAAACnbvohQ:APA91bFxy5YUQlAXGxEF2BjU-bLXp1C13ClaB3kPvAFCwqraIyNRXwXYueJRxNeAGmSfaKCD2SgFyd03HfxgDODR74k630dC3q-Gy56U_EuNea6Fr2ZXeTs_mQ3nK--LqXdQ37zm7dt0';
                        break;

                    case 16:
                        $apiKey = 'AAAA5qKc4M8:APA91bG3q9BAo323Bje7_eIs8sGa-G37pRr67n4IgYK8xnoYHsSOx397JPecFVVaWCHfHjcqiaTFOjaZPbEtzXbzakZ2kwWqP_2x9RT3_Z883-lKpbRRgALZSq5MXK51Cb-W6Db5xAQu';
                        break;


                        case 3:
                            $apiKey = 'AAAADwEmOL8:APA91bGN_99QtWkpjpvLTjByVISmGtM7qZSgvZNixW1o7d1udxNp_hHI8n6Tn-ukuGgmnLAIABuWYo-Kdea253E-jE1tCVBLQmRikVBbdxy2Th-j64BAr80U9FeCpr3gGmPW66W58ZYF';
                             break;



                    default:
                        $apiKey = 'AAAA3cdYfsY:APA91bF1mZUGbz72Z-qZhvT4ZFTwj6IUxAIZn9cchDvBxtmj47oRX6JKK8u8-thLD94GBUiRRGJqVndybDASTjHLwiRTkQlqyYqyCf4Oqt3nTqdeyh246t5KSXcPWUvY9fSp1bbOrg_L';
                        break;
                }

                $FCM_token = $cliente->fcmToken;

                $url = "https://fcm.googleapis.com/fcm/send";
                $token = $FCM_token;
                $serverKey = $apiKey;
                $title = "Tu cita de masajes fue Agendada";
                $body = "Tu cita de masajes fue agendada para el dia $request[fecha]";
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
     * @param  \App\Masajes  $masajes
     * @return \Illuminate\Http\Response
     */
    public function show(Masajes $masajes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Masajes  $masajes
     * @return \Illuminate\Http\Response
     */
    public function edit(Masajes $masajes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Masajes  $masajes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $masajes)
    {
        if ($this->VerifyLogin($request["id_user"],$request["token"])){


            $update = Masajes::find($masajes)->update($request->all());


            if(isset($request->comment)){
                if($request->comment != "<p><br></p>"){
                    $array = [];
                    $array["id_event"]   = $masajes;
                    $array["table"]      = "masajes";
                    $array["id_user"]    = $request["id_user"];
                    $array["comment"]    = $request->comment;
                    Comments::insert($array);
                }
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
                                     ->where("tabla", "masajes")->first();
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
     * @param  \App\Masajes  $masajes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Masajes $masajes)
    {
        //
    }
}


