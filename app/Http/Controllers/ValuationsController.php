<?php

namespace App\Http\Controllers;

use App\Auditoria;
use App\Valuations;
use App\Comments;
use App\FollwersEvents;
use App\ValuationsPhoto;
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


            $valuations = Valuations::select("valuations.*", "valuations.id_asesora_valoracion as id_asesora", "valuations.clinic as id_clinic",
                                             "valuations.status as status_valuations*", "auditoria.*", "users.email as email_regis", "clientes.*",
                                            "valuations.status as status_valuations", "valuations.clinic as id_clinic")

                                ->join("auditoria", "auditoria.cod_reg", "=", "valuations.id_valuations")
                                ->join("clientes", "clientes.id_cliente", "=", "valuations.id_cliente")
                                ->join("users", "users.id", "=", "auditoria.usr_regins")
                                ->where("auditoria.tabla", "valuations")
                                ->where("auditoria.status", "!=", "0")

                                ->with("followers")
                                
                                ->where(function ($query) use ($rol, $id_user) {
                                    if($rol == "Asesor"){
                                        $query->where("clientes.id_user_asesora", $id_user);
                                    }
                                })

                                ->with("photos")

                                ->orderBy("valuations.id_valuations", "DESC")
                                ->get();



            if($rol == "Asesor"){

                $valuations_follow = Valuations::select("valuations.*", "valuations.id_asesora_valoracion as id_asesora", "valuations.clinic as id_clinic",
                                             "valuations.status as status_valuations*", "auditoria.*", "users.email as email_regis", "clientes.*",
                                            "valuations.status as status_valuations", "valuations.clinic as id_clinic")

                                ->join("auditoria", "auditoria.cod_reg", "=", "valuations.id_valuations")
                                ->join("clientes", "clientes.id_cliente", "=", "valuations.id_cliente")
                                ->join("users", "users.id", "=", "auditoria.usr_regins")
                                ->where("auditoria.tabla", "valuations")
                                ->where("auditoria.status", "!=", "0")

                                ->join("followers_events", "followers_events.id_event", "=", "valuations.id_valuations")

                                
                                ->with("followers")
                                
                                ->with("photos")

                                ->where("followers_events.id_user", $id_user)
                                ->where("followers_events.tabla", "valuations")

                                ->orderBy("valuations.id_valuations", "DESC")
                                ->get();


                foreach($valuations_follow as $key => $value){
                  $valuations[] = $value;
                }
            }
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
                    
            $hora_init = strtotime( $request["time"] );
            $hora_end  = strtotime( $request["time_end"] );


            $valid = Valuations::where("fecha", $request["fecha"])
                                ->where("time_end", ">=", $request["time"])
                                ->where("time",     "<=", $request["time"])
                                ->get();


            if($hora_init >= $hora_end){
                $data = array('mensagge' => "La hora desde no puede ser mayor o igual a la hora hasta");    
                return response()->json($data)->setStatusCode(400); 
            }

            $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
            $code = substr(str_shuffle($permitted_chars), 0, 4);
            
            $request["code"] = strtoupper($code);
            $store = Valuations::create($request->all());




            $request["table"]    = "valuations";
            $request["id_event"] = $store["id_valuations"];

            
            if($request->comment != "<p><br></p>"){
                Comments::create($request->all());
            }

            $auditoria              = new Auditoria;
            $auditoria->tabla       = "valuations";
            $auditoria->cod_reg     = $store["id_valuations"];
            $auditoria->status      = 1;
            $auditoria->fec_regins  = date("Y-m-d H:i:s");
            $auditoria->usr_regins  = $request["id_user"];
            $auditoria->save();



            $followers = [];
            if(isset($request->followers)){

                foreach($request->followers as $key => $value){
                    $array = [];
                    $array["id_event"]    = $store["id_valuations"];
                    $array["id_user"]     = $value;
                    $array["tabla"]       = "valuations";
                    array_push($followers, $array);
                    FollwersEvents::create($array);
                }
                
            }


            if ($store) {
                $data = array('mensagge' => "Los datos fueron registrados satisfactoriamente");    
                return response()->json($data)->setStatusCode(200);
            }else{
                return response()->json("A ocurrido un error")->setStatusCode(400);
            }

    }




    public function Clients(Request $request, $client)
    {
        if ($this->VerifyLogin($request["id_user"],$request["token"])){

            $rol     = $request["rol"];
            $id_user = $request["id_user"];

            $valuations = Valuations::select("valuations.*", "valuations.id_asesora_valoracion as id_asesora", "valuations.status as status_valuations*",
                                             "auditoria.*", "users.email as email_regis", "clientes.*", "valuations.status as status_valuations", "valuations.clinic as id_clinic")
                                ->join("auditoria", "auditoria.cod_reg", "=", "valuations.id_valuations")
                                ->join("clientes", "clientes.id_cliente", "=", "valuations.id_cliente")
                                ->join("users", "users.id", "=", "auditoria.usr_regins")
                                ->where("auditoria.tabla", "valuations")
                                ->where("auditoria.status", "!=", "0")
                                ->where("valuations.id_cliente", $client)


                                ->with("comments")
                                ->with("photos")
                                ->with("followers")
                                
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


            if(isset($request->comment)){
                if($request->comment != "<p><br></p>"){

                    $array = [];
                    $array["id_event"]   = $valuations;
                    $array["table"]      = "valuations";
                    $array["id_user"]    = $request["id_user"];
                    $array["comment"]    = $request->comment;
                    Comments::insert($array);
                }
            }
            


            


            if(isset($request->followers)){

                FollwersEvents::where("id_event", $valuations)->delete();
                $followers = [];
                foreach($request->followers as $key => $value){
                    $array = [];
                    $array["id_event"]    = $valuations;
                    $array["id_user"]     = $value;
                    $array["tabla"]       = "valuations";
                    FollwersEvents::create($array);
                }
                
            }



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



    public function ValidateCode($code){

        $data = Valuations::select("valuations.*", "clientes.nombres", "clientes.apellidos", 

                                    "client_clinic_history.eps",
                                    "client_clinic_history.height",
                                    "client_clinic_history.weight",
                                    "client_clinic_history.number_children",
                                    "client_clinic_history.alcohol",
                                    "client_clinic_history.smoke",
                                    "client_clinic_history.previous_surgery",
                                    "client_clinic_history.major_disease",
                                    "client_clinic_history.drink_medication",
                                    "client_clinic_history.allergic_medication"

                                )

                            ->join("clientes", "clientes.id_cliente", "=", "valuations.id_cliente")
                            ->join("client_clinic_history", "client_clinic_history.id_client", "=", "valuations.id_cliente")

                            ->where("code", $code)
                            ->first();
        if($data){

            sleep(2);
            return response()->json($data)->setStatusCode(200);

        }else{

            sleep(2);
            return response()->json("Codigo Invalido")->setStatusCode(400);
            
        }
        

    }


    public function StorePhotos(Request $request){
    
        foreach($request["foto"] as $value){

            $img = str_replace('data:image/png;base64,', '', $value);


            $fileData = base64_decode($img);
            $fileName = uniqid().'.png';
            file_put_contents('img/valuations/'.$fileName, $fileData);

            ValuationsPhoto::create(["code" => strtoupper($request["code"]), "foto" => $fileName]);
        }

        return response()->json("ok")->setStatusCode(200);


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
