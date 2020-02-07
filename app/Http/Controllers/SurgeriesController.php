<?php

namespace App\Http\Controllers;

use App\Surgeries;
use App\Auditoria;
use App\SurgeriesPayments;
use Illuminate\Http\Request;

class SurgeriesController extends Controller
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
            $valuations = Surgeries::select("surgeries.*", "surgeries.clinic as id_clinic", "clinic.nombre as name_clinic", "auditoria.*", "users.email as email_regis", "clientes.*")
                                ->join("clinic", "clinic.id_clinic", "=", "surgeries.clinic")
                                ->join("auditoria", "auditoria.cod_reg", "=", "surgeries.id_surgeries")
                                ->join("clientes", "clientes.id_cliente", "=", "surgeries.id_cliente")
                                ->join("users", "users.id", "=", "auditoria.usr_regins")

                                ->with("payments")

                                ->where(function ($query) use ($rol, $id_user) {
                                    if($rol == "Asesor"){
                                        $query->where("clientes.id_user_asesora", $id_user);
                                    }
                                })

                                ->where("auditoria.tabla", "surgeries")
                                ->where("auditoria.status", "!=", "0")
                                ->orderBy("surgeries.id_surgeries", "DESC")
                                ->get();
            echo json_encode($valuations);
        }else{
            return response()->json("No esta autorizado")->setStatusCode(400);
        }

    }



    public function Clients($id){

        $surgeries = Surgeries::select("surgeries.*", "surgeries.clinic as id_clinic", "clinic.id_clinic as clinic", "clinic.nombre as name_clinic", "auditoria.*", "users.email as email_regis", "clientes.*")
                                ->join("clinic", "clinic.id_clinic", "=", "surgeries.clinic")
                                ->join("auditoria", "auditoria.cod_reg", "=", "surgeries.id_surgeries")
                                ->join("clientes", "clientes.id_cliente", "=", "surgeries.id_cliente")
                                ->join("users", "users.id", "=", "auditoria.usr_regins")

                                ->with("payments")

                                ->where("surgeries.id_cliente", $id)
                                ->where("auditoria.tabla", "surgeries")
                                ->where("auditoria.status", "!=", "0")
                                ->orderBy("surgeries.id_surgeries", "DESC")
                                ->get();
            echo json_encode($surgeries);
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


            // $valid = Surgeries::where("fecha", $request["fecha"])
            //                     ->where("time_end", ">=", $request["time"])
            //                     ->where("time",     "<=", $request["time"])
            //                     ->get();

            // if(sizeof($valid) > 0){
            //     $data = array('mensagge' => "Ya existen cirugias en ese Horario");    
            //     return response()->json($data)->setStatusCode(400); 
            // }

            // if($hora_init >= $hora_end){
            //     $data = array('mensagge' => "La hora desde no puede ser mayor o igual a la hora hasta");    
            //     return response()->json($data)->setStatusCode(400); 
            // }


            $request["amount"]          = str_replace('.', '', $request["amount"]);
            $request["amount"]          = str_replace(',', '.', $request["amount"]);

            $request["attempt"] == 1 ? $request["attempt"] = 1 : $request["attempt"] = 0;
            $store = Surgeries::create($request->all());

            $auditoria              = new Auditoria;
            $auditoria->tabla       = "surgeries";
            $auditoria->cod_reg     = $store["id_surgeries"];
            $auditoria->status      = 1;
            $auditoria->usr_regins  = $request["id_user"];
            $auditoria->save();

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
     * @param  \App\Surgeries  $valuations
     * @return \Illuminate\Http\Response
     */
    public function show(Valuations $Surgeries)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Valuations  $valuations
     * @return \Illuminate\Http\Response
     */
    public function edit(Valuations $surgeries)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Surgeries  $surgeries
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $surgeries)
    {
        if ($this->VerifyLogin($request["id_user"],$request["token"])){
            $request["attempt"] == 1 ? $request["attempt"] = 1 : $request["attempt"] = 0;


            $hora_init = strtotime( $request["time"] );
            $hora_end  = strtotime( $request["time_end"] );


            // $valid = Surgeries::where("fecha", $request["fecha"])
            //                     ->where("time_end", ">=", $request["time"])
            //                     ->where("time",     "<=", $request["time"])
            //                     ->where("id_surgeries", "!=", $surgeries)
            //                     ->get();
            
            SurgeriesPayments::where('id_surgerie', $surgeries)->delete();

            if($request->dates){
                foreach ($request->dates as $key => $value) {
                    $SurgeriesPayments = new SurgeriesPayments;
                    $SurgeriesPayments->id_surgerie  = $surgeries;
                    $SurgeriesPayments->date         = $value;

                    $amount          = str_replace('.', '', $request->amounts[$key]);
                    $amount          = str_replace(',', '.', $amount);

                    $SurgeriesPayments->way_to_pay   = $request->way_to_pays[$key];
                    $SurgeriesPayments->amount     = $amount;
                    
                    $SurgeriesPayments->save();
                }    
            }


            // if(sizeof($valid) > 0){
            //     $data = array('mensagge' => "Ya existen cirugias en ese Horario");    
            //     return response()->json($data)->setStatusCode(400); 
            // }

            // if($hora_init >= $hora_end){
            //     $data = array('mensagge' => "La hora desde no puede ser mayor o igual a la hora hasta");    
            //     return response()->json($data)->setStatusCode(400); 
            // }


            $request["amount"]          = str_replace('.', '', $request["amount"]);
            $request["amount"]          = str_replace(',', '.', $request["amount"]);

            $update = Surgeries::find($surgeries)->update($request->all());

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
                                     ->where("tabla", "surgeries")->first();
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
     * @param  \App\Valuations  $valuations
     * @return \Illuminate\Http\Response
     */
    public function destroy(Valuations $valuations)
    {
        //
    }
}
