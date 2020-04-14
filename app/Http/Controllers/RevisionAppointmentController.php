<?php

namespace App\Http\Controllers;

use App\Auditoria;
use App\Comments;
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


        if ($this->VerifyLogin($request["id_user"],$request["token"])){
            $queries = RevisionAppointment::select("revision_appointment.*", "clientes.nombres", "clientes.id_user_asesora","clientes.nombres as name_client", "clientes.apellidos as last_name_client", "clinic.nombre as name_clinic","auditoria.*", "users.email as email_regis")

                                            ->join("clientes", "clientes.id_cliente", "revision_appointment.id_paciente")
                                            ->join("clinic", "clinic.id_clinic", "revision_appointment.clinica")


                                            ->join("auditoria", "auditoria.cod_reg", "=", "revision_appointment.id_revision")
                                            ->join("users", "users.id", "=", "auditoria.usr_regins")
                                            ->with('agenda')

                                            
                                            ->where(function ($query) use ($rol, $id_user) {
                                                if($rol == "Asesor"){
                                                    $query->where("clientes.id_user_asesora", $id_user);
                                                }
                                            })

                                            ->where("auditoria.tabla", "revision_appointment")
                                            ->where("auditoria.status", "!=", "0")
                                            ->orderBy("revision_appointment.id_revision", "DESC")
                                            ->get();
            echo json_encode($queries);
        }else{
            return response()->json("No esta autorizado")->setStatusCode(400);
        }
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
                $auditoria->usr_regins  = $request["id_user"];
                $auditoria->save();


                $request["table"]    = "revision_appointment";
                $request["id_event"] = $store["id_revision"];
                
                if($request->comment != "<p><br></p>"){
                    Comments::create($request->all());
                }



                if ($store) {
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
