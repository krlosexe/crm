<?php

namespace App\Http\Controllers;

use App\Auditoria;
use App\Valuations;
use Illuminate\Http\Request;

class ValuationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($this->VerifyLogin($request["id_user"],$request["token"])){

            $rol     = $request["rol"];
            $id_user = $request["id_user"];

            $valuations = Valuations::select("valuations.*", "valuations.status as status_valuations*", "auditoria.*", "users.email as email_regis", "clientes.*", "valuations.status as status_valuations")
                                ->join("auditoria", "auditoria.cod_reg", "=", "valuations.id_valuations")
                                ->join("clientes", "clientes.id_cliente", "=", "valuations.id_cliente")
                                ->join("users", "users.id", "=", "auditoria.usr_regins")
                                ->where("auditoria.tabla", "valuations")
                                ->where("auditoria.status", "!=", "0")
                                
                                ->where(function ($query) use ($rol, $id_user) {
                                    if($rol == "Asesor"){
                                        $query->where("clientes.id_user_asesora", $id_user);
                                    }
                                })

                                ->orderBy("valuations.id_valuations", "DESC")
                                ->get();
            echo json_encode($valuations);
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
        //if ($this->VerifyLogin($request["id_user"],$request["token"])){

                    
            $hora_init = strtotime( $request["time"] );
            $hora_end  = strtotime( $request["time_end"] );


            $valid = Valuations::where("fecha", $request["fecha"])
                                ->where("time_end", ">=", $request["time"])
                                ->where("time",     "<=", $request["time"])
                                ->get();

            // if(sizeof($valid) > 0){
            //     $data = array('mensagge' => "Ya existen valoraciones en ese Horario");    
            //     return response()->json($data)->setStatusCode(400); 
            // }

            if($hora_init >= $hora_end){
                $data = array('mensagge' => "La hora desde no puede ser mayor o igual a la hora hasta");    
                return response()->json($data)->setStatusCode(400); 
            }
        //    
            $store = Valuations::create($request->all());

            $auditoria              = new Auditoria;
            $auditoria->tabla       = "valuations";
            $auditoria->cod_reg     = $store["id_valuations"];
            $auditoria->status      = 1;
            $auditoria->usr_regins  = $request["id_user"];
            $auditoria->save();

            if ($store) {
                $data = array('mensagge' => "Los datos fueron registrados satisfactoriamente");    
                return response()->json($data)->setStatusCode(200);
            }else{
                return response()->json("A ocurrido un error")->setStatusCode(400);
            }

       // }else{
            //return response()->json("No esta autorizado")->setStatusCode(400);
        //}
    }




    public function Clients(Request $request, $client)
    {
        if ($this->VerifyLogin($request["id_user"],$request["token"])){

            $rol     = $request["rol"];
            $id_user = $request["id_user"];

            $valuations = Valuations::select("valuations.*", "valuations.status as status_valuations*", "auditoria.*", "users.email as email_regis", "clientes.*", "valuations.status as status_valuations")
                                ->join("auditoria", "auditoria.cod_reg", "=", "valuations.id_valuations")
                                ->join("clientes", "clientes.id_cliente", "=", "valuations.id_cliente")
                                ->join("users", "users.id", "=", "auditoria.usr_regins")
                                ->where("auditoria.tabla", "valuations")
                                ->where("auditoria.status", "!=", "0")
                                ->where("valuations.id_cliente", $client)

                                ->orderBy("valuations.id_valuations", "DESC")
                                ->get();
            echo json_encode($valuations);
        }else{
            return response()->json("No esta autorizado")->setStatusCode(400);
        }
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Valuations  $valuations
     * @return \Illuminate\Http\Response
     */
    public function show(Valuations $valuations)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Valuations  $valuations
     * @return \Illuminate\Http\Response
     */
    public function edit(Valuations $valuations)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Valuations  $valuations
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $valuations)
    {
        if ($this->VerifyLogin($request["id_user"],$request["token"])){

            if($file = $request->file('file')){
                $destinationPath = 'img/valuations/cotizaciones';
                $file->move($destinationPath,$file->getClientOriginalName());
                $request["cotizacion"] = $file->getClientOriginalName();
            }

            $valid = Valuations::where("fecha", $request["fecha"])
                                ->where("time_end", ">=", $request["time"])
                                ->where("time",     "<=", $request["time"])
                                ->where("id_valuations", "!=", $valuations)
                                ->get();

            // if(sizeof($valid) > 0){
            //     $data = array('mensagge' => "Ya existen valoraciones en ese Horario");    
            //     return response()->json($data)->setStatusCode(400); 
            // }



            $hora_init = strtotime( $request["time"] );
            $hora_end  = strtotime( $request["time_end"] );

            if($hora_init >= $hora_end){

                $data = array('mensagge' => "La hora desde no puede ser mayor o igual a la hora hasta");    
                return response()->json($data)->setStatusCode(400); 
            }


            $queries = Valuations::find($valuations)->update($request->all());

            // if ($queries) {
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
                                     ->where("tabla", "valuations")->first();
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
