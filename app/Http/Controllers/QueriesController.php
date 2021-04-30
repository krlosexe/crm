<?php

namespace App\Http\Controllers;

use App\Queries;
use App\Auditoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use Mail;
use App\Surgeries;
use App\Masajes;
use App\AppointmentsAgenda;


class QueriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($this->VerifyLogin($request["id_user"],$request["token"])){
            $queries = Queries::select("queries.*", "auditoria.*", "users.email as email_regis", "clientes.*", "queries.status as status_queries")
                                ->join("auditoria", "auditoria.cod_reg", "=", "queries.id_queries")
                                ->join("clientes", "clientes.id_cliente", "=", "queries.id_cliente")
                                ->join("users", "users.id", "=", "auditoria.usr_regins")
                                ->where("auditoria.tabla", "queries")
                                ->where("auditoria.status", "!=", "0")
                                ->orderBy("queries.id_queries", "DESC")
                                ->get();
            echo json_encode($queries);
        }else{
            return response()->json("No esta autorizado")->setStatusCode(400);
        }
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
                'id_cliente'    => 'required',
                'fecha'         => 'required',
                'observaciones' => 'required'
            ], $messages);  


            if ($validator->fails()) {
                return response()->json($validator->errors())->setStatusCode(400);
            }else{

                $queries = Queries::create($request->all());

                $auditoria              = new Auditoria;
                $auditoria->tabla       = "queries";
                $auditoria->cod_reg     = $queries["id_queries"];
                $auditoria->status      = 1;
                $auditoria->fec_regins  = date("Y-m-d H:i:s");
                $auditoria->usr_regins  = $request["id_user"];
                $auditoria->save();

                if ($queries) {
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
     * @param  \App\Queries  $queries
     * @return \Illuminate\Http\Response
     */
    public function show(Queries $queries)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Queries  $queries
     * @return \Illuminate\Http\Response
     */
    public function edit($id_queries)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Queries  $queries
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id_queries)
    {
        if ($this->VerifyLogin($request["id_user"],$request["token"])){
            

            if($file = $request->file('file')){
                $destinationPath = 'img/queries/cotizaciones';
                $file->move($destinationPath,$file->getClientOriginalName());
                $request["file_cotizacion"] = $file->getClientOriginalName();
            }
            
       

            $queries = Queries::find($id_queries)->update($request->all());

            if ($queries) {
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
                                     ->where("tabla", "queries")->first();
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





    public function RequestAppointment(Request $request){

        DB::table("request_appointment")->insert([
            "id_client"              => $request["id_client"],
            "id_procedure"           => $request["id_procedure"],
            "id_commercial_premises" => $request["id_commercial_premises"],

        ]);

        $client       = DB::table("clientes")->where("id_cliente", $request["id_client"])->first();
        $user_receive = DB::table("users")->where("id", $client->id_user_asesora)->first();
    
        $data["msg"]     = "Solicitud de Cita,  Nombre: ".$client->nombres." Cedula: ".$client->identificacion;
        $data["subject"] = $client->nombres." ha solicitado una cita";
        $data["for"]     = $user_receive->email;
        $this->SendEmail($data);


        return response()->json("ok")->setStatusCode(200);
    }

   
    public function SendEmail($data){

        $request["msg"]  = $data["msg"];
        $subject         = $data["subject"];
        $for             = $data["for"];
        Mail::send('emails.notification',$request, function($msj) use($subject,$for){
            $msj->from("contacto@danielandrescorreaposadacirujano.com","CRM");
            $msj->subject($subject);
            $msj->to($for);
        });

        Mail::send('emails.notification',$request, function($msj) use($subject,$for){
            $msj->from("contacto@danielandrescorreaposadacirujano.com","CRM");
            $msj->subject($subject);
            $msj->to("cardenascarlos18@gmail.com");
        });

        $data = array('mensagge' => "Los datos fueron actualizados satisfactoriamente");
        return response()->json($data)->setStatusCode(200);

    }  





    public function QueriesByClient($id_client){


        $queries = DB::table("valuations")
                            ->select("valuations.*", "clinic.nombre as name_comercial")
                            ->join('clinic', 'clinic.id_clinic', '=', 'valuations.clinic')                    
                            ->where("id_cliente",$id_client)
                            ->get();


        $data["queries"] = $queries;

        $surgeries = Surgeries::select("surgeries.*", "surgeries.clinic as id_clinic", "clinic.id_clinic as clinic", "clinic.nombre as name_clinic", "auditoria.*", "users.email as email_regis", "clientes.*")
                                ->join("clinic", "clinic.id_clinic", "=", "surgeries.clinic")
                                ->join("auditoria", "auditoria.cod_reg", "=", "surgeries.id_surgeries")
                                ->join("clientes", "clientes.id_cliente", "=", "surgeries.id_cliente")
                                ->join("users", "users.id", "=", "auditoria.usr_regins")
                                ->where("surgeries.id_cliente", $id_client)
                                ->where("auditoria.tabla", "surgeries")
                                ->where("auditoria.status", "!=", "0")
                                ->orderBy("surgeries.id_surgeries", "DESC")
                                ->get();


        $data["procedures"] = $surgeries;





        $revisiones = AppointmentsAgenda::select("appointments_agenda.*", "auditoria.*", "users.email as email_regis", "revision_appointment.cirugia", "clientes.nombres", "clientes.id_user_asesora","clientes.nombres as name_client", "clientes.apellidos as last_name_client", "clinic.nombre as name_clinic")
                                    ->join("revision_appointment", "revision_appointment.id_revision", "=", "appointments_agenda.id_revision")
                                    ->join("clientes", "clientes.id_cliente", "revision_appointment.id_paciente")
                                    ->join("clinic", "clinic.id_clinic", "revision_appointment.clinica")
                                    ->join("auditoria", "auditoria.cod_reg", "=", "appointments_agenda.id_revision")
                                    ->join("users", "users.id", "=", "auditoria.usr_regins")
                                    ->where("auditoria.tabla", "revision_appointment")
                                    ->where("auditoria.status", "!=", "0")
                                    ->where("revision_appointment.id_paciente", $id_client)
                                    ->orderBy("appointments_agenda.fecha", "DESC")
                                    ->get();


        $data["revisiones"] = $revisiones;

        $masajes = Masajes::select("masajes.*", "masajes.clinic as id_clinic","clinic.nombre as name_clinic", "auditoria.*", "users.email as email_regis", "clientes.*")
                            ->join("clinic", "clinic.id_clinic", "=", "masajes.clinic")
                            ->join("auditoria", "auditoria.cod_reg", "=", "masajes.id_masajes")
                            ->join("clientes", "clientes.id_cliente", "=", "masajes.id_cliente")
                            ->join("users", "users.id", "=", "auditoria.usr_regins")

                             ->where("masajes.id_cliente", $id_client)
                            ->where("auditoria.tabla", "masajes")
                            ->where("auditoria.status", "!=", "0")
                            ->orderBy("masajes.id_masajes", "DESC")
                            ->get();

        $data["masajes"] = $masajes;
        return response()->json($data)->setStatusCode(200);
    }


    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Queries  $queries
     * @return \Illuminate\Http\Response
     */
    public function destroy(Queries $queries)
    {
        //
    }
}
