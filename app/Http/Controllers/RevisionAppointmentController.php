<?php

namespace App\Http\Controllers;

use App\Auditoria;
use App\Comments;
use App\Clients;
use App\AppointmentsAgenda;
use App\RevisionAppointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RevisionAppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $rol     = $request["rol"];
        $id_user = $request["id_user"];


        $date_init = 0;
        if(isset($request["date_init"]) && $request["date_init"] != ""){
            $date_init = $request["date_init"];
        }


        $date_finish = 0;
        if(isset($request["date_finish"]) && $request["date_finish"] != ""){
            $date_finish = $request["date_finish"];
        }



        $data = AppointmentsAgenda::select("appointments_agenda.*", "auditoria.*", "users.email as email_regis", "revision_appointment.cirugia", "clientes.nombres", "clientes.id_user_asesora","clientes.nombres as name_client", "clientes.apellidos as last_name_client", "clinic.nombre as name_clinic")
                                    ->join("revision_appointment", "revision_appointment.id_revision", "=", "appointments_agenda.id_revision")
                                    ->join("clientes", "clientes.id_cliente", "revision_appointment.id_paciente")
                                    ->join("clinic", "clinic.id_clinic", "revision_appointment.clinica")
                                    ->join("auditoria", "auditoria.cod_reg", "=", "appointments_agenda.id_revision")
                                    ->join("users", "users.id", "=", "auditoria.usr_regins")

                                    ->where(function ($query) use ($rol, $id_user) {
                                        if($rol == "Asesor"){
                                            $query->where("clientes.id_user_asesora", $id_user);
                                        }
                                    })


                                    ->where(function ($query) use ($date_init) {
                                        if($date_init != 0){
                                            $query->where("appointments_agenda.fecha", ">=", $date_init);
                                        }
                                    })

                                    ->where(function ($query) use ($date_finish) {
                                        if($date_finish != 0){
                                            $query->where("appointments_agenda.fecha", "<=", $date_finish);
                                        }
                                    })




                                    ->with('agenda')

                                    ->with('comments')

                                    ->where("auditoria.tabla", "revision_appointment")
                                    ->where("auditoria.status", "!=", "0")
                                    ->orderBy("appointments_agenda.fecha", "DESC")




                                    ->get();

        return response()->json($data)->setStatusCode(200);

    }




    public function Clients($id_client)
    {

        $queries = RevisionAppointment::select("revision_appointment.*", "clientes.nombres as name_client","clientes.id_user_asesora", "clientes.apellidos as last_name_client", "clinic.nombre as name_clinic","auditoria.*", "users.email as email_regis")

                                        ->join("clientes", "clientes.id_cliente", "revision_appointment.id_paciente")
                                        ->join("clinic", "clinic.id_clinic", "revision_appointment.clinica")


                                        ->join("auditoria", "auditoria.cod_reg", "=", "revision_appointment.id_revision")
                                        ->join("users", "users.id", "=", "auditoria.usr_regins")
                                        ->with('agenda')

                                        ->where("revision_appointment.id_paciente", $id_client)
                                        ->where("auditoria.tabla", "revision_appointment")
                                        ->where("auditoria.status", "!=", "0")
                                        ->orderBy("revision_appointment.id_revision", "DESC")
                                        ->get();
        echo json_encode($queries);

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

            $messages = [
                'required' => 'El Campo :attribute es requirdo.',
                'unique'   => 'El Campo :attribute ya se encuentra en uso.'
            ];

            $validator = Validator::make($request->all(), [
                'id_paciente'      => 'required',
                //'numero_contrato'  => 'required',
                //'cirugia'          => 'required',
                'clinica'          => 'required'
            ], $messages);


            if ($validator->fails()) {
                return response()->json($validator->errors())->setStatusCode(400);
            }else{

                $store = RevisionAppointment::create($request->all());

                if($request->fecha){
                    foreach ($request->fecha as $key => $value) {
                        $AppointmentsAgenda = new AppointmentsAgenda;
                        $AppointmentsAgenda->id_revision  = $store->id_revision;
                        $AppointmentsAgenda->fecha        = $value;
                        $AppointmentsAgenda->time         = $request->time[$key];
                        $AppointmentsAgenda->time_end     = $request->time_end[$key];
                        $AppointmentsAgenda->cirujano     = $request->cirujano[$key];
                        $AppointmentsAgenda->enfermera    = $request->enfermera[$key];
                        $AppointmentsAgenda->descripcion  = $request->descripcion[$key];

                        $AppointmentsAgenda->save();
                    }
                }

                $auditoria              = new Auditoria;
                $auditoria->tabla       = "revision_appointment";
                $auditoria->cod_reg     = $store["id_revision"];
                $auditoria->status      = 1;
                $auditoria->fec_regins  = date("Y-m-d H:i:s");
                $auditoria->usr_regins  = $request["id_user"];
                $auditoria->save();


                $request["table"]    = "revision_appointment";
                $request["id_event"] = $store["id_revision"];

                if($request->comment != "<p><br></p>"){
                    Comments::create($request->all());
                }



                if ($store) {




                    $cliente = Clients::where('id_cliente',$request["id_paciente"])->first();

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
                            default:
                                $apiKey = 'AAAA3cdYfsY:APA91bF1mZUGbz72Z-qZhvT4ZFTwj6IUxAIZn9cchDvBxtmj47oRX6JKK8u8-thLD94GBUiRRGJqVndybDASTjHLwiRTkQlqyYqyCf4Oqt3nTqdeyh246t5KSXcPWUvY9fSp1bbOrg_L';
                                break;
                        }

                        $FCM_token = $cliente->fcmToken;

                        $url = "https://fcm.googleapis.com/fcm/send";
                        $token = $FCM_token;
                        $serverKey = $apiKey;
                        $title = "Tu cita de revision fue Agendada";
                        $body = "Tu cita de revision fue agendada";
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




                    $data = array('mensagge' => "Los datos fueron registrados satisfactoriamente");
                    return response()->json($data)->setStatusCode(200);
                }else{
                    return response()->json("A ocurrido un error")->setStatusCode(400);
                }
            }

        }else{
            return response()->json("No esta autorizado")->setStatusCode(400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RevisionAppointment  $revisionAppointment
     * @return \Illuminate\Http\Response
     */
    public function show(RevisionAppointment $revisionAppointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RevisionAppointment  $revisionAppointment
     * @return \Illuminate\Http\Response
     */
    public function edit(RevisionAppointment $revisionAppointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RevisionAppointment  $revisionAppointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $revisionAppointment)
    {
        if ($this->VerifyLogin($request["id_user"],$request["token"])){

            $update = RevisionAppointment::find($revisionAppointment)->update($request->all());

            AppointmentsAgenda::where('id_revision', $revisionAppointment)->delete();




            if($request->fecha){
                foreach ($request->fecha as $key => $value) {
                    $AppointmentsAgenda = new AppointmentsAgenda;
                    $AppointmentsAgenda->id_revision  = $revisionAppointment;
                    $AppointmentsAgenda->fecha        = $value;
                    $AppointmentsAgenda->time         = $request->time[$key];
                    $AppointmentsAgenda->time_end     = $request->time_end[$key];
                    $AppointmentsAgenda->cirujano     = $request->cirujano[$key];
                    $AppointmentsAgenda->enfermera    = $request->enfermera[$key];
                    $AppointmentsAgenda->descripcion  = $request->descripcion[$key];

                    $AppointmentsAgenda->save();
                }
            }


            if(isset($request->comment)){
                if($request->comment != "<p><br></p>"){

                    $array = [];
                    $array["id_event"]   = $revisionAppointment;
                    $array["table"]      = "revision_appointment";
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
                                     ->where("tabla", "revision_appointment")->first();
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
     * @param  \App\RevisionAppointment  $revisionAppointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(RevisionAppointment $revisionAppointment)
    {
        //
    }
}
