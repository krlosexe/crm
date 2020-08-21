<?php

namespace App\Http\Controllers;

use App\Surgeries;
use App\Auditoria;
use App\SurgeriesPayments;
use App\Comments;
use App\FollwersEvents;
use App\SurgeriesAdditional;
use App\LogsClients;
use Illuminate\Http\Request;
use DB;

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


        $adviser = 0;
        if(isset($request["adviser"])){
            $adviser = $request["adviser"];
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
            $valuations = Surgeries::select("surgeries.*", "surgeries.clinic as id_clinic", "clinic.nombre as name_clinic", "auditoria.*", "users.email as email_regis", "clientes.*")
                                ->join("clinic", "clinic.id_clinic", "=", "surgeries.clinic")
                                ->join("auditoria", "auditoria.cod_reg", "=", "surgeries.id_surgeries")
                                ->join("clientes", "clientes.id_cliente", "=", "surgeries.id_cliente", "left")
                                ->join("users", "users.id", "=", "auditoria.usr_regins")

                                ->with("payments")
                                ->with("followers")
                                ->with("procedures")
                                ->with("aditionals")



                                
                                
                                ->where(function ($query) use ($rol, $id_user) {
                                    if($rol == "Asesor"){
                                        $query->where("auditoria.usr_regins", $id_user);
                                    }
                                })


                                ->where(function ($query) use ($adviser) {
                                    if($adviser != 0){
                                        $query->whereIn("auditoria.usr_regins", $adviser);
                                    }
                                }) 

                                


                                ->where(function ($query) use ($date_init) {
                                    if($date_init != 0){
                                        $query->where("surgeries.fecha", ">=", $date_init);
                                    }
                                }) 

                                ->where(function ($query) use ($date_finish) {
                                    if($date_finish != 0){
                                        $query->where("surgeries.fecha", "<=", $date_finish);
                                    }
                                }) 

                                ->where("auditoria.tabla", "surgeries")
                                ->where("auditoria.status", "!=", "0")
                                ->orderBy("surgeries.fecha", "DESC")
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
                                ->with("followers")
                                ->with("aditionals")


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


            $request["surgerie_rental"] == 1 ? $request["surgerie_rental"] = 1 : $request["surgerie_rental"] = 0;

            $store = Surgeries::create($request->all());



            $request["table"]    = "surgerie";
            $request["id_event"] = $store["id_surgeries"];
            
            if($request->comment != "<p><br></p>"){
                Comments::create($request->all());
            }


            $auditoria              = new Auditoria;
            $auditoria->tabla       = "surgeries";
            $auditoria->cod_reg     = $store["id_surgeries"];
            $auditoria->status      = 1;
            $auditoria->fec_regins  = date("Y-m-d H:i:s");
            $auditoria->usr_regins  = $request["id_user"];
            $auditoria->save();


            $followers = [];
            if(isset($request->followers)){

                foreach($request->followers as $key => $value){
                    $array = [];
                    $array["id_event"]    = $store["id_surgeries"];
                    $array["id_user"]     = $value;
                    $array["tabla"]       = "surgeries";
                    array_push($followers, $array);
                    FollwersEvents::create($array);
                }
                
            }



            if(isset($request->aditional)){

                foreach($request->aditional as $key => $value){
                    $array = [];
                    $array["id_surgerie"]     = $store["id_surgeries"];
                    $array["id_user"]         = $request["id_user"];
                    $array["description"]     = $value;

                    $array["price_aditional"] = str_replace('.', '', $request["price_aditional"][$key]);
                    $array["price_aditional"] = str_replace(',', '.', $array["price_aditional"]);

                    SurgeriesAdditional::create($array);
                }
                
            }




            DB::table("events_client")->insert([
                "event"     => "Cirugia",
                "id_client" => $request["id_cliente"],
                "id_event"  => $store["id_surgeries"]
            ]);




            $clinic = DB::table("clinic")->where("id_clinic", $request["clinic"])->first();

            $version["id_user"]   = $request["id_user"];
            $version["id_client"] = $request["id_cliente"];
            $version["event"]     = "Agendo Cirugia para el dia $request[fecha] con el Doctor ".$request["surgeon"]." en la clinica ".$clinic->nombre;

            LogsClients::create($version);

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




            SurgeriesAdditional::where('id_surgerie', $surgeries)->delete();
            if(isset($request->aditional)){

                foreach($request->aditional as $key => $value){
                    $array = [];
                    $array["id_surgerie"]     = $surgeries;
                    $array["id_user"]         = $request["id_user"];
                    $array["description"]     = $value;

                    $array["price_aditional"] = str_replace('.', '', $request["price_aditional"][$key]);
                    $array["price_aditional"] = str_replace(',', '.', $array["price_aditional"]);

                    SurgeriesAdditional::create($array);
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

            
            if(isset($request["amount"])){
                $request["amount"]          = str_replace('.', '', $request["amount"]);
                $request["amount"]          = str_replace(',', '.', $request["amount"]);
            }
            

            $update = Surgeries::find($surgeries)->update($request->all());


            if(isset($request->comment)){
                if($request->comment != "<p><br></p>"){

                    $array = [];
                    $array["id_event"]   = $surgeries;
                    $array["table"]      = "surgerie";
                    $array["id_user"]    = $request["id_user"];
                    $array["comment"]    = $request->comment;
                    Comments::insert($array);
                }
            }
            


            if(isset($request->followers)){

                FollwersEvents::where("id_event", $surgeries)->delete();
                $followers = [];
                foreach($request->followers as $key => $value){
                    $array = [];
                    $array["id_event"]    = $surgeries;
                    $array["id_user"]     = $value;
                    $array["tabla"]       = "surgeries";
                    FollwersEvents::create($array);
                }
                
            }


            if(isset($request["clinic"])){
                $clinic    = DB::table("clinic")->where("id_clinic", $request["clinic"])->first();
                $name_clinic = $clinic->nombre;
            }else{
                $name_clinic = "";
            }


            $clinic    = DB::table("clinic")->where("id_clinic", $request["clinic"])->first();
            $cita      = DB::table("surgeries")->where("id_surgeries", $surgeries)->first();
          
   
            $version["id_user"]   = $request["id_user"];
            $version["id_client"] = $cita->id_cliente;
            $version["event"]     = "Actualizo Cirugia para el dia $request[fecha] con el Doctor ".$request["surgeon"]." en la clinica ".$name_clinic;

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








    public function QtyMonth($user_id){
        
        $data = Surgeries::selectRaw("count(id_surgeries) as qty")
                            ->join("auditoria", "auditoria.cod_reg", "=", "surgeries.id_surgeries")
                            ->where("surgeries.status_surgeries", 1)
                            ->where("auditoria.tabla", "surgeries")
                            ->where("auditoria.usr_regins", $user_id)
                            ->whereRaw("month(fecha) = ".date("m")." ")
                            ->first();

        return response()->json($data)->setStatusCode(200);

    }





}
