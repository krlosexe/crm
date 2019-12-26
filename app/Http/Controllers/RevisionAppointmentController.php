<?php

namespace App\Http\Controllers;

use App\Auditoria;
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
        if ($this->VerifyLogin($request["id_user"],$request["token"])){
            $queries = RevisionAppointment::select("revision_appointment.*", "auditoria.*", "users.email as email_regis")
                                            ->join("auditoria", "auditoria.cod_reg", "=", "revision_appointment.id_revision")
                                            ->join("users", "users.id", "=", "auditoria.usr_regins")
                                            ->with('agenda')
                                            ->where("auditoria.tabla", "revision_appointment")
                                            ->where("auditoria.status", "!=", "0")
                                            ->orderBy("revision_appointment.id_revision", "DESC")
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
                'id_paciente'      => 'required',
                'numero_contrato'  => 'required',
                'cirugia'          => 'required',
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
    public function update(Request $request, RevisionAppointment $revisionAppointment)
    {
        //
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
