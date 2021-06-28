<?php

namespace App\Http\Controllers;

use App\examenes;
use App\Auditoria;
use App\Comments;
use App\Clients;
use DB;
use Illuminate\Http\Request;

class ExamenesController extends Controller
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
            $valuations = examenes::select("examenes.*","examenes.clinic as id_clinic", "clinic.nombre as name_clinic", "auditoria.*", "users.email as email_regis", "clientes.*")
                                ->join("clinic", "clinic.id_clinic", "=", "examenes.clinic")
                                ->join("auditoria", "auditoria.cod_reg", "=", "examenes.id")
                                ->join("clientes", "clientes.id_cliente", "=", "examenes.id_cliente", "left")
                                ->join("users", "users.id", "=", "auditoria.usr_regins")

                                /*->where(function ($query) use ($rol, $id_user) {
                                    if($rol == "Asesor"){
                                        $query->where("clientes.id_user_asesora", $id_user);
                                    }
                                })*/

                                ->with("comments")

                                ->where("auditoria.tabla", "examenes")
                                ->where("auditoria.status", "!=", "0")
                                ->orderBy("examenes.id", "DESC")
                                ->get();
            echo json_encode($valuations);
        }else{
            return response()->json("No esta autorizado")->setStatusCode(400);
        }
    }


    function Clients($id_client){

        $valuations = examenes::select("examenes.*", "examenes.clinic as id_clinic","clinic.nombre as name_clinic", "auditoria.*", "users.email as email_regis", "clientes.*")
                            ->join("clinic", "clinic.id_clinic", "=", "examenes.clinic")
                            ->join("auditoria", "auditoria.cod_reg", "=", "examenes.id")
                            ->join("clientes", "clientes.id_cliente", "=", "examenes.id_cliente")
                            ->join("users", "users.id", "=", "auditoria.usr_regins")

                             ->where("examenes.id_cliente", $id_client)
                            ->where("auditoria.tabla", "examenes")
                            ->where("auditoria.status", "!=", "0")
                            ->orderBy("examenes.id", "DESC")
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

            $request["surgerie_rental"] == 1 ? $request["surgerie_rental"] = 1 : $request["surgerie_rental"] = 0;

            $store = examenes::create($request->all());

            $auditoria              = new Auditoria;
            $auditoria->tabla       = "examenes";
            $auditoria->cod_reg     = $store["id"];
            $auditoria->status      = 1;
            $auditoria->fec_regins  = date("Y-m-d H:i:s");
            $auditoria->usr_regins  = $request["id_user"];
            $auditoria->save();

            $request["table"]    = "examenes";
            $request["id_event"] = $store["id"];

            if($request->comment != "<p><br></p>"){
                Comments::create($request->all());
            }

            DB::table("events_client")->insert([
                "event"     => "examenes",
                "id_client" => $request["id_cliente"],
                "id_event"  => $store["id"]
            ]);


            $cliente = examenes::where('id_cliente',$request["id_cliente"])->first();

                //curl_close($ch);

      

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
     * @param  \App\examenes  $examenes
     * @return \Illuminate\Http\Response
     */
    public function show(examenes $examenes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\examenes  $examenes
     * @return \Illuminate\Http\Response
     */
    public function edit(examenes $examenes)
    {
        //
    }

    public function update(Request $request, $examenes)
    {
        if ($this->VerifyLogin($request["id_user"],$request["token"])){


            $update = examenes::find($examenes)->update($request->all());


            if(isset($request->comment)){
                if($request->comment != "<p><br></p>"){
                    $array = [];
                    $array["id_event"]   = $examenes;
                    $array["table"]      = "examenes";
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
                                     ->where("tabla", "examenes")->first();
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
     * @param  \App\examenes  $examenes
     * @return \Illuminate\Http\Response
     */
    public function destroy(examenes $examenes)
    {
        //
    }
}


