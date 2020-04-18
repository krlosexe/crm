<?php

namespace App\Http\Controllers;

use Mail;
use App\Clients;
use App\Auditoria;
use App\ClientClinicHistory;
use App\ClientCreditInformation;
use App\ClientInformationAditionalSurgery;


use App\ClientsTasks;
use App\ClientsTasksFollowers;
use App\ClientsTasksComments;
use App\User;
use App\Comments;
use App\Notification;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\LogsClients;

use App\Exports\ClientsExport;
use Maatwebsite\Excel\Facades\Excel;

use Orchestra\Parser\Xml\Facade as XmlParser;

use DB;
class ClientsController extends Controller
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
        
            $business_line = 0;
            if(isset($request["business_line"])){
                $business_line = $request["business_line"];
            }

            $adviser = 0;
            if(isset($request["adviser"])){
              $adviser = $request["adviser"];
            }


            $search = 0;
            if(isset($request["search"]) && $request["search"] != ""){
              $search = $request["search"];
            }


            $date_init = 0;
            if(isset($request["date_init"]) && $request["date_init"] != ""){
              $date_init = $request["date_init"];
            }


            $date_finish = 0;
            if(isset($request["date_finish"]) && $request["date_finish"] != ""){
              $date_finish = $request["date_finish"];
            }

            $state = $request["state"];


         

            $origen = $request["origen"];

            ini_set('memory_limit', '-1'); 
            
            $data = Clients::select("clientes.*", "client_information_aditional_surgery.*" , "client_clinic_history.*", 
                                       "clientc_credit_information.*", "auditoria.*", "user_registro.email as email_regis", "datos_personales.nombres as name_register",
                                       "datos_personales.apellido_p as apellido_register", "lines_business.nombre_line", 
                                       "dp2.nombres as name_update",
                                       "dp2.apellido_p as apellido_update"
                                     )

                                ->join("auditoria", "auditoria.cod_reg", "=", "clientes.id_cliente")
                                ->join("client_information_aditional_surgery", "client_information_aditional_surgery.id_client", "=", "clientes.id_cliente")
                                ->join("lines_business", "lines_business.id_line", "=", "clientes.id_line", "left")

                                ->join("client_clinic_history", "client_clinic_history.id_client", "=", "clientes.id_cliente")
                                ->join("clientc_credit_information", "clientc_credit_information.id_client", "=", "clientes.id_cliente")
                                ->join('datos_personales', 'datos_personales.id_usuario', '=', 'clientes.id_user_asesora')

                                ->join('datos_personales as dp2', 'dp2.id_usuario', '=', 'auditoria.usr_update', "left")




                                ->where(function ($query) use ($search) {
                                    if($search != "0"){
                                        $query->where("clientes.nombres", 'like', '%'.$search.'%');
                                        $query->orWhere("clientes.identificacion", 'like', '%'.$search.'%');
                                        $query->orWhere("clientes.telefono", 'like', '%'.$search.'%');
                                        $query->orWhere("clientes.code_client", 'like', '%'.$search.'%');
                                        $query->orWhere("clientes.origen", 'like', '%'.$search.'%');
                                    }

                                }) 


                                ->where(function ($query) use ($state) {
                                    if($state != "0"){
                                        $query->where("clientes.state", $state);
                                    }
                                }) 

                                ->where(function ($query) use ($business_line) {
                                    if($business_line != 0){
                                        $query->whereIn("clientes.id_line", $business_line);
                                    }
                                })



                                ->where(function ($query) use ($adviser) {
                                    if($adviser != 0){
                                        $query->whereIn("clientes.id_user_asesora", $adviser);
                                    }
                                }) 



                                ->where(function ($query) use ($origen) {

                                    if($origen == "Formulario"){
                                        $query->where("clientes.origen", "Formulario Web");
                                    }


                                    if($origen == "Otros"){

                                        $query->where("clientes.to_db", 0);
                                        $query->where("clientes.pauta", 0);
                                        $query->where("clientes.origen", "!=","Formulario Web");
                                        $query->OrwhereNull('clientes.origen');
                                        
                                        
                                    }

                                }) 



                                ->where(function ($query) use ($date_init) {
                                    if($date_init != 0){
                                        $query->where("auditoria.fec_update", ">=", $date_init." 00:00:00");
                                    }
                                }) 




                                ->where(function ($query) use ($date_finish) {
                                    if($date_finish != 0){
                                        $query->where("auditoria.fec_update", "<=", $date_finish." 23:59:59");
                                    }
                                }) 


                               



                               
                                ->with("logs")
                                ->with("phones")
                                ->with("emails")

                                ->where("auditoria.tabla", "clientes")
                                ->join("users as user_registro", "user_registro.id", "=", "auditoria.usr_regins")
                                ->where("auditoria.status", "!=", "0")

                              
                              //  ->orderBy("clientes.id_cliente", "DESC")
                                //->orderBy("auditoria.fec_regins", "DESC")
                                ->orderBy("auditoria.fec_update", "DESC")

                                ->paginate(10);


                
           
            return response()->json($data)->setStatusCode(200);
        }else{
            return response()->json("No esta autorizado")->setStatusCode(400);
        }
    }



    public function List(Request $request){
        if ($this->VerifyLogin($request["id_user"],$request["token"])){

          //  ini_set('memory_limit', '-1'); 


            $data = Clients::select("clientes.id_cliente","clientes.nombres", "auditoria.status"
                                     )

                                ->join("auditoria", "auditoria.cod_reg", "=", "clientes.id_cliente")

                                ->where("auditoria.tabla", "clientes")
                               
                                ->where("auditoria.status", "!=", "0")

                                ->orderBy("clientes.id_cliente", "DESC")

                                ->get();
           
            return response()->json($data)->setStatusCode(200);
        }
    }
    public function GetByIdentification($identification){
        $data = Clients::where("identificacion", $identification)->first();
        
        if($data){
            return response()->json($data)->setStatusCode(200);
        }else{
            return response()->json($data)->setStatusCode(400);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
          
            $messages = [
                'required' => 'El Campo :attribute es requirdo.',
                'unique'   => 'El Campo :attribute ya se encuentra en uso.'
            ];

            if($request["identificacion"] != null){
               $valid = Clients::where("identificacion", $request["identificacion"])->get();

               if(sizeof($valid) > 0){
                    return response()->json("Numero de Identificacion se encuentra registrado en la base de datos")->setStatusCode(400);
               }
            }

            $request["identificacion_verify"] == 1 ? $request["identificacion_verify"] = 1 : $request["identificacion_verify"] = 0;
            $validator = Validator::make($request->all(), [
                'nombres'         => 'required',
               // 'apellidos'       => 'required',
               // 'telefono'        => 'required|unique:clientes',
               // 'email'           => 'required|unique:clientes',
               // 'direccion'       => 'required'

            ], $messages);  


            if ($validator->fails()) {
                return response()->json($validator->errors())->setStatusCode(400);
            }else{


                $permitted_chars        = '0123456789abcdefghijklmnopqrstuvwxyz';
                $code                   = substr(str_shuffle($permitted_chars), 0, 4);
                $request["code_client"] = strtoupper($code);


                $request["nombres"] = $request["nombres"]." ".$request["apellidos"];

                $cliente = Clients::create($request->all());
                
                $request["id_client"] = $cliente["id_cliente"];
                
                ClientInformationAditionalSurgery::create($request->all());
                ClientClinicHistory::create($request->all());
                ClientCreditInformation::create($request->all());


                if(isset($request["telefono2"])){
                    foreach($request["telefono2"] as $value){
                       
                        DB::table('clients_phone_aditional')->insert([
                            'id_cliente' => $cliente["id_cliente"],
                            'phone' => $value
                        ]);

                    }   
                }




                if(isset($request["email2"])){
                    foreach($request["email2"] as $value){
                       
                        DB::table('clients_email_aditional')->insert([
                            'id_cliente' => $cliente["id_cliente"],
                            'email' => $value
                        ]);

                    }   
                }




                $request["table"]    = "clients";
                $request["id_event"] = $cliente["id_cliente"];

                if(isset($request["comment"]) && $request["comment"] != "<p><br></p>"){
                    Comments::create($request->all());
                }



                $auditoria              = new Auditoria;
                $auditoria->tabla       = "clientes";
                $auditoria->cod_reg     = $cliente["id_cliente"];
                $auditoria->status      = 1;
                $auditoria->usr_regins  = $request["id_user"];
                $auditoria->fec_regins  = date("Y-m-d H:i:s");
                $auditoria->fec_update  = date("Y-m-d H:i:s");
                $auditoria->save();

                if ($cliente) {
                    $data = array('mensagge' => "Los datos fueron registrados satisfactoriamente");    
                    return response()->json($data)->setStatusCode(200);
                }else{
                    return response()->json("A ocurrido un error")->setStatusCode(400);
                }
            }

        // }else{
        //     return response()->json("No esta autorizado")->setStatusCode(400);
        // }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $clients)
    {
        if ($this->VerifyLogin($request["id_user"],$request["token"])){

           
            $data = Clients::select("clientes.*","client_clinic_history.*", 
                                    "clientc_credit_information.*", "lines_business.nombre_line", "client_information_aditional_surgery.*"
                                     )


                                ->join("client_clinic_history", "client_clinic_history.id_client", "=", "clientes.id_cliente")
                                ->join("clientc_credit_information", "clientc_credit_information.id_client", "=", "clientes.id_cliente")
                                ->join("client_information_aditional_surgery", "client_information_aditional_surgery.id_client", "=", "clientes.id_cliente")
                                ->join("lines_business", "lines_business.id_line", "=", "clientes.id_line", "left")
                               
                               
                                ->with("logs")
                                ->with("phones")
                                ->with("emails")

                                ->where("clientes.id_cliente", $clients)
                               
                                ->first();
           
            return response()->json($data)->setStatusCode(200);
        }else{
            return response()->json("No esta autorizado")->setStatusCode(400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function edit(Clients $clients)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_cliente)
    {   
        if ($this->VerifyLogin($request["id_user"],$request["token"])){


            $data = Clients::select("state")->find($id_cliente);

            if($data->state != $request["state"]){
                $version["id_user"]   = $request["id_user"];
                $version["id_client"] = $id_cliente;
                $version["event"]     = "Actualizo el estado de: ".$data->state." a ".$request['state'];

                LogsClients::create($version);
            }


            $request["identificacion_verify"] == 1 ? $request["identificacion_verify"] = 1 : $request["identificacion_verify"] = 0;

            $request["children"]   == 1 ? $request["children"]   = 1 : $request["children"]   = 0;
            $request["alcohol"]    == 1 ? $request["alcohol"]    = 1 : $request["alcohol"]    = 0;
            $request["smoke"]      == 1 ? $request["smoke"]      = 1 : $request["smoke"]      = 0;
            $request["surgery"]    == 1 ? $request["surgery"]    = 1 : $request["surgery"]    = 0;
            $request["disease"]    == 1 ? $request["disease"]    = 1 : $request["disease"]    = 0;
            $request["medication"] == 1 ? $request["medication"] = 1 : $request["medication"] = 0;
            $request["allergic"]   == 1 ? $request["allergic"]   = 1 : $request["allergic"]   = 0;

            $request["properties"] == 1 ? $request["properties"] = 1 : $request["properties"] = 0;
            $request["vehicle"]    == 1 ? $request["vehicle"]    = 1 : $request["vehicle"]    = 0;




            $request["nombres"] = $request["nombres"]." ".$request["apellidos"];

            $cliente = Clients::find($id_cliente)->update($request->all());
            ClientInformationAditionalSurgery::find($id_cliente)->update($request->all());
            ClientClinicHistory::find($id_cliente)->update($request->all());
            ClientCreditInformation::find($id_cliente)->update($request->all());




            DB::table('clients_phone_aditional')->where("id_cliente", $id_cliente)->delete();
            if(isset($request["telefono2"])){
                foreach($request["telefono2"] as $value){
                   
                    DB::table('clients_phone_aditional')->insert([
                        'id_cliente' => $id_cliente,
                        'phone' => $value
                    ]);

                }   
                
            }


            DB::table('clients_email_aditional')->where("id_cliente", $id_cliente)->delete();
            if(isset($request["email2"])){
                foreach($request["email2"] as $value){
                   
                    DB::table('clients_email_aditional')->insert([
                        'id_cliente' => $id_cliente,
                        'email' => $value
                    ]);

                }   
            }







            $data = Clients::select("state")->find($id_cliente);

            if($data->state != $request["state"]){
                $version["id_user"]   = $request["id_user"];
                $version["id_client"] = $id_cliente;
                $version["event"]     = "Actualizo el estado de: ".$data->state." a ".$request['state'];

                LogsClients::create($version);
            }



            if($request->comment != "<p><br></p>"){

                $array = [];
                $array["id_event"]   = $id_cliente;
                $array["table"]      = "clients";
                $array["id_user"]    = $request["id_user"];
                $array["comment"]    = $request->comment;
                Comments::insert($array);
            }
            

            /*

            if(isset($request->comments)){
                $comments = [];

                foreach($request->comments as $key => $value){
                    $array = [];
                    $array["id_event"]   = $id_cliente;
                    $array["table"]      = "clients";
                    $array["id_user"]    = $request["id_user"];
                    $array["comment"]   = $value;
                    array_push($comments, $array);
                }
                Comments::insert($comments);
                
            }*/

            DB::table('auditoria')->where("cod_reg", $id_cliente)->where("tabla", "clientes")

            ->update(['usr_update' => $request["id_user"],'fec_update' => date("Y-m-d H:i:s")]);



            if ($cliente) {
                $data = array('mensagge' => "Los datos fueron registrados satisfactoriamente");    
                return response()->json($data)->setStatusCode(200);
            }else{
                return response()->json("A ocurrido un error")->setStatusCode(400);
            }

        }else{
            return response()->json("No esta autorizado")->setStatusCode(400);
        }
    }



    public function status($id_cliente, $status, Request $request)
    {
        //if ($this->VerifyLogin($request["id_user"],$request["token"])){
            $auditoria =  Auditoria::where("cod_reg", $id_cliente)
                                     ->where("tabla", "clientes")->first();

            $auditoria->status = $status;

            if($status == 0){
                $auditoria->usr_regmod = $request["id_user"];
                $auditoria->fec_regmod = date("Y-m-d");
            }
            $auditoria->save();

            $data = array('mensagge' => "Los datos fueron actualizados satisfactoriamente");    
            return response()->json($data)->setStatusCode(200);
      //  }else{
           //return response()->json("No esta autorizado")->setStatusCode(400);
        //}
    }




    public function Tasks(Request $request){
        
        if ($this->VerifyLogin($request["id_user"],$request["token"])){
          //  $request["responsable"] = $request["id_user"];
            $store = ClientsTasks::create($request->all());


            $auditoria              = new Auditoria;
            $auditoria->tabla       = "clients_tasks";
            $auditoria->cod_reg     = $store["id_clients_tasks"];
            $auditoria->status      = 1;
            $auditoria->fec_regins  = date("Y-m-d H:i:s");
            $auditoria->usr_regins  = $request["id_user"];
            $auditoria->save();


            $followers = [];
            foreach($request->followers as $key => $value){
                $array = [];
                $array["id_task"]     = $store["id_clients_tasks"];
                $array["id_follower"] = $value;
                array_push($followers, $array);
            }

            ClientsTasksFollowers::insert($followers);
            $request["id_task"] = $store["id_clients_tasks"];

            if($request->comments != "<p><br></p>"){
                ClientsTasksComments::create($request->all());
            }


            $data = array('mensagge' => "Los datos fueron actualizados satisfactoriamente");    
            return response()->json($data)->setStatusCode(200);
        }else{
            return response()->json("No esta autorizado")->setStatusCode(400);
        }

    }


    public function TasksUpdate(Request $request, $id_task){
        
        

        if ($this->VerifyLogin($request["id_user"],$request["token"])){
            
            $update = ClientsTasks::find($id_task)->update($request->all());

            ClientsTasksFollowers::where("id_task", $id_task)->delete();


            if(isset($request->followers)){
                $followers = [];
                foreach($request->followers as $key => $value){
                    $array = [];
                    $array["id_task"]     = $id_task;
                    $array["id_follower"] = $value;
                    array_push($followers, $array);
                }

                ClientsTasksFollowers::insert($followers);
            }
            
            if($request->comments != "<p><br></p>"){
                $array = [];
                $array["id_task"]     = $id_task;
                $array["id_user"] = $request["id_user"];
                $array["comments"] = $request->comments;

                ClientsTasksComments::insert($array);
                
            }


            if ($update) {
                $data = array('mensagge' => "Los datos fueron actualizados satisfactoriamente");    
                return response()->json($data)->setStatusCode(200);
            }else{
                return response()->json("A ocurrido un error")->setStatusCode(400);
            }

        }else{
            return response()->json("No esta autorizado")->setStatusCode(400);
        }




    }



    public function GetTasksByClient(Request $request, $id_client){
        if ($this->VerifyLogin($request["id_user"],$request["token"])){
            
            $tasks = ClientsTasks::select("clients_tasks.*", "responsable.email as email_responsable", "datos_personales.nombres as name_responsable", 
                                   "datos_personales.apellido_p as last_name_responsable", "auditoria.*", "users.email as email_regis", "clientes.nombres as name_client")

                                    ->join("auditoria", "auditoria.cod_reg", "=", "clients_tasks.id_clients_tasks")
                                    ->join("users", "users.id", "=", "auditoria.usr_regins")

                                    ->join("users as responsable", "responsable.id", "=", "clients_tasks.responsable")

                                    ->join("clientes", "clientes.id_cliente", "=", "clients_tasks.id_client")


                                    ->join("datos_personales", "datos_personales.id_usuario", "=", "responsable.id")

                                    ->with("followers")
                                    ->with("comments")

                                    ->where("clients_tasks.id_client", $id_client)

                                    ->where("auditoria.tabla", "clients_tasks")
                                    ->where("auditoria.status", "!=", "0")
                                    ->orderBy("clients_tasks.id_clients_tasks", "DESC")
                                    ->get();


                echo json_encode($tasks);
        }else{
            return response()->json("No esta autorizado")->setStatusCode(400);
        }
    }   




    public function GetTasks(Request $request){
        if ($this->VerifyLogin($request["id_user"],$request["token"])){
            

            $rol     = $request["rol"];
            $id_user = $request["id_user"];


            $adviser = 0;
            if(isset($request["adviser"])){
              $adviser = $request["adviser"];
            }


            $tasks = ClientsTasks::select("clients_tasks.*", "responsable.email as email_responsable", "datos_personales.nombres as name_responsable", 
                                   "datos_personales.apellido_p as last_name_responsable", "auditoria.*", "users.email as email_regis", "clientes.nombres as name_client")

                                    ->join("auditoria", "auditoria.cod_reg", "=", "clients_tasks.id_clients_tasks")
                                    ->join("users", "users.id", "=", "auditoria.usr_regins")

                                    ->join("clientes", "clientes.id_cliente", "=", "clients_tasks.id_client")


                                    ->join("users as responsable", "responsable.id", "=", "clients_tasks.responsable")
                                    ->join("datos_personales", "datos_personales.id_usuario", "=", "responsable.id")

                                    ->with("followers")
                                    //->with("comments")


                                    ->where(function ($query) use ($rol, $id_user) {
                                        if($rol == "Asesor"){
                                            $query->where("clients_tasks.responsable", $id_user);
                                        }
                                    })


                                    ->where(function ($query) use ($adviser) {
                                        if($adviser != 0){
                                            $query->whereIn("clients_tasks.responsable", $adviser);
                                        }
                                    }) 

                                    ->where("auditoria.tabla", "clients_tasks")
                                    ->where("auditoria.status", "!=", "0")
                                    ->orderBy("clients_tasks.id_clients_tasks", "DESC")
                                    ->get();


                echo json_encode($tasks);
        }else{
            return response()->json("No esta autorizado")->setStatusCode(400);
        }
    } 




    public function GetCommentsTasks($id){

        $data = DB::table("clients_tasks_comments")->select('clients_tasks_comments.*', 'users.email', 'users.img_profile', "datos_personales.nombres as name_user", 
                                                            "datos_personales.apellido_p as last_name_user")
                  
                    ->join('users', 'users.id', '=', 'clients_tasks_comments.id_user')  
                    ->join('datos_personales', 'datos_personales.id_usuario', '=', 'clients_tasks_comments.id_user')     
                    ->where("id_task", $id)
                    ->get();


        return response()->json($data)->setStatusCode(200);
    }


    public function TasksStatus($id_cliente, $status, Request $request)
    {
       
        $auditoria =  Auditoria::where("cod_reg", $id_cliente)
                                    ->where("tabla", "clients_tasks")->first();

        $auditoria->status = $status;

        if($status == 0){
            $auditoria->usr_regmod = $request["id_user"];
            $auditoria->fec_regmod = date("Y-m-d");
        }
        $auditoria->save();

        $data = array('mensagge' => "Los datos fueron actualizados satisfactoriamente");    
        return response()->json($data)->setStatusCode(200);
     
    }


    public function AddCommentTask(Request $request){


        $array["id_task"]  = $request["id"];
        $array["id_user"]  = $request["id_user"];
        $array["comments"] = $request["comment"];
        ClientsTasksComments::insert($array);

        return response()->json("Ok")->setStatusCode(200);

    }


    public function Excel($linea_negocio, $adviser, $origen, $date_init, $date_finish, $state, $search = 5){


        $xls = new ClientsExport;

        $xls->linea_negocio = $linea_negocio == 0 ? 0 :  explode(",", $linea_negocio);
        $xls->asesor        = $adviser == 0 ? 0 :  explode(",", $adviser);
        $xls->origen        = $origen;
        $xls->date_init     = $date_init;
        $xls->date_finish   = $date_finish;
        $xls->state         = $state;
        $xls->search        = $search;

        
        return Excel::download($xls, 'ClientExport.xlsx');
    }



    public function Import(Request $request){
        $file            = $request->file('file_import');
        $destinationPath = 'import_csv';
        $name_file       = $file->getClientOriginalName();
        $file->move($destinationPath,$name_file);

        $xmldata = simplexml_load_file("import_csv/".$name_file) or die("Failed to load");
       
        $fila = 0;

        $data = [];
        foreach($xmldata->Worksheet->Table->Row as $key => $data) {   

            if($fila != 0){
                $array = [];
                $array["origen"]          = "Pauta ".(string) $data->Cell[1]->{'Data'};
                $array["nombres"]         = (string) $data->Cell[2]->{'Data'};
                $array["telefono"]        = (string) $data->Cell[3]->{'Data'};
                $array["email"]           = (string) $data->Cell[4]->{'Data'};
                $array["direccion"]       = (string) $data->Cell[5]->{'Data'};
                $array["id_user_asesora"] = $request["id_user_asesora"];
                $array["id_line"]         = $request["id_line"];

             //  echo json_encode($array)."<br><br>";
                $array["pauta"] = 1;
                $cliente = Clients::create($array);

                $array["id_client"]   = $cliente["id_cliente"];
                
                ClientInformationAditionalSurgery::create($array);
                ClientClinicHistory::create($array);
                ClientCreditInformation::create($array);

                $auditoria              = new Auditoria;
                $auditoria->tabla       = "clientes";
                $auditoria->cod_reg     = $cliente["id_cliente"];
                $auditoria->status      = 1;
                $auditoria->fec_regins  = date("Y-m-d H:i:s");
                $auditoria->usr_regins  = $request["id_user"];
                $auditoria->save();

            }
            $fila++;
        }

        $data = array('mensagge' => "Se importaron ".$fila." contactos");    
        return response()->json($data)->setStatusCode(200);
        
        
    }


    public function ClientForms(Request $request){

        $users = User::join("users_line_business", "users_line_business.id_user", "=", "users.id")
                        ->where("users_line_business.id_line", $request["id_line"])
                        ->where("users.queue", 0)
                        ->where("users.id", "!=", 69)
                        ->first();


       
       if($users){

            $request["id_user_asesora"] =  $users["id"];

            $permitted_chars        = '0123456789abcdefghijklmnopqrstuvwxyz';
            $code                   = substr(str_shuffle($permitted_chars), 0, 4);
            $request["code_client"] = strtoupper($code);


            $cliente = Clients::create($request->all());
                    
            $request["id_client"] = $cliente["id_cliente"];


            



            
            ClientInformationAditionalSurgery::create($request->all());
            ClientClinicHistory::create($request->all());
            ClientCreditInformation::create($request->all());

            $auditoria              = new Auditoria;
            $auditoria->tabla       = "clientes";
            $auditoria->cod_reg     = $cliente["id_cliente"];
            $auditoria->status      = 1;
            $auditoria->fec_regins  = date("Y-m-d H:i:s");
            $auditoria->fec_update  = date("Y-m-d H:i:s");
            $auditoria->usr_regins  = $users["id"];
            $auditoria->save();


            $update = User::find($users["id"]);
            $update->queue = 1;
            $update->save();



            $subject = "Formulario Web";

            //$for = "cardenascarlos18@gmail.com";
            $for = $users["email"];
         //   $for = "cardenascarlos18@gmail.com";

            $request["msg"]  = "Un Paciente a registrado un Formulario Web";

            Mail::send('emails.forms',$request->all(), function($msj) use($subject,$for){
                $msj->from("cardenascarlos18@gmail.com","CRM");
                $msj->subject($subject);
                $msj->to($for);
            });
           
            

       }else{
          
           $users = User::join("users_line_business", "users_line_business.id_user", "=", "users.id")
                        ->where("users_line_business.id_line", $request["id_line"])
                        ->where("users.queue", 1)
                        ->update(["queue" => 0]);

            $this->ClientForms($request);
       }


       $data = array('mensagge' => "Los datos fueron registrados satisfactoriamente");    
        return response()->json($data)->setStatusCode(200);


        
        
    }




    public function ClientFormsPrp(Request $request){

        $users = User::join("users_line_business", "users_line_business.id_user", "=", "users.id")
                        ->join("datos_personales", "datos_personales.id_usuario", "=", "users.id")
                        ->where("users_line_business.id_line", $request["id_line"])
                        ->where("users.queue_prp", 0)
                        ->where("users.id", "!=", 69)
                        ->first();
       if($users){

            $request["name_user"]   = $users["nombres"]." ".$users["apellido_p"];

            $permitted_chars        = '0123456789abcdefghijklmnopqrstuvwxyz';
            $code                   = substr(str_shuffle($permitted_chars), 0, 4);
            $request["code_client"] = strtoupper($code);
            $request["prp"]         = "Si";
            $request["to_db"]       = "1";

            $request["id_user_asesora"] =  $users["id"];
            $request["origen"] =  "PRP Agencia";

            $client = Clients::where("identificacion", $request["identificacion"])->get();

          
            if((sizeof($client) > 0) && ($request["identificacion"] != "")){

                foreach($client as $value){

                    if($value["prp"] == "Si"){
                        $data = array('mensagge' => "Ya se encuentra registrado en el PRP con el codigo: ".$value["code_client"]);    
                        return response()->json($data)->setStatusCode(400);
                    }

                    $update = array(
                        "code_client"     => $request["code_client"],
                        "prp"             => "Si",
                        "to_db"           => "1",
                        "origen"          =>  $request["origen"],
                        "telefono"        =>  $request["telefono"],
                        "id_user_asesora" => $request["id_user_asesora"],
                        "id_line"         => $request["id_line"]
                    );

                    Clients::find($value["id_cliente"])->update($update);
                    DB::table('auditoria')->where("cod_reg", $value["id_cliente"])
                            ->where("tabla", "clientes")
                            ->update(['fec_update' => date("Y-m-d H:i:s")]);

                    $id_client = $value["id_cliente"];
                }
                

            }else{

                $cliente = Clients::create($request->all());
                    
                $request["id_client"] = $cliente["id_cliente"];
                
                ClientInformationAditionalSurgery::create($request->all());
                ClientClinicHistory::create($request->all());
                ClientCreditInformation::create($request->all());
    
                $auditoria              = new Auditoria;
                $auditoria->tabla       = "clientes";
                $auditoria->cod_reg     = $cliente["id_cliente"];
                $auditoria->status      = 1;
                $auditoria->fec_regins  = date("Y-m-d H:i:s");
                $auditoria->fec_update  = date("Y-m-d H:i:s");
                $auditoria->usr_regins  = $users["id"];
                $auditoria->save();
    
                $update            = User::find($users["id"]);
                $update->queue_prp = 1;
                $update->save();

                $id_client = $cliente["id_cliente"];
            }
            


            $notification["fecha"]    = date("Y-m-d");
            $notification["title"]    = "Hoy Ingreso de PRP ".$request["nombres"]." codigo: ".$request["code_client"];
            $notification["id_user"]  = $users["id"];
            $notification["id_event"] = $id_client;
            $notification["type"]     = "prp";

            Notification::insert($notification);


            if($request["id_line"] == 2){
                $request["name_line"] = "Clínica Especialistas del Poblado (CEP)";
            }

            if($request["id_line"] == 3){
                $request["name_line"] = "CiruCredito";
            }

            if($request["id_line"] == 17){
                $request["name_line"] = "Doctor Daniel Correa";
            }
            if($request["id_line"] == 16){
                $request["name_line"] = "Planmed";
            }


            if($request["id_line"] == 18){
                $request["name_line"] = "CEP";
            }

            if($request["id_line"] == 14){
                $request["name_line"] = "Mas Estetic";
            }

            if($request["id_line"] == 15){
                $request["name_line"] = "Global Medical";
            }


            if(($request["id_line"] == 9)){
                $subject = "Formulario Trabaja con Nosotros para Paulina  Clinica Laser: ".$request["nombres"];
            }

            if(($request["id_line"] == 2) || ($request["id_line"] == 3) || ($request["id_line"] == 17)){
                $subject = "Formulario Trabaja con Nosotros para Paulina ".$request["name_line"]." : ".$request["nombres"];
            }

            if(($request["id_line"] == 18) || ($request["id_line"] == 14) || ($request["id_line"] == 15)  || ($request["id_line"] == 16)){
                $subject = "Formulario Trabaja con Nosotros para Manuela ".$request["name_line"].": ".$request["nombres"];
            }

            //$for = "cardenascarlos18@gmail.com";
            $for = $users["email"];
           // $for = "cardenascarlos18@gmail.com..";

            $request["msg"]  = "Wiiii :D";

            Mail::send('emails.formsPrp',$request->all(), function($msj) use($subject,$for){
                $msj->from("cardenascarlos18@gmail.com","CRM");
                $msj->subject($subject);
                $msj->to($for);
            });


            Mail::send('emails.formsPrp',$request->all(), function($msj) use($subject,$for){
                $msj->from("cardenascarlos18@gmail.com","CRM");
                $msj->subject($subject);
                $msj->to("pdtagenciademedios@gmail.com");
            });
            

       }else{
          
           $users = User::join("users_line_business", "users_line_business.id_user", "=", "users.id")
                        ->where("users_line_business.id_line", $request["id_line"])
                        ->where("users.queue_prp", 1)
                        ->update(["queue_prp" => 0]);

            $this->ClientForms($request);
       }


       $data = array('mensagge' => "Los datos fueron registrados satisfactoriamente");    
        return response()->json($data)->setStatusCode(200);
        
        
    }






    public function ClientFormsPrpAdviser(Request $request){

       
        $users = User::join("users_line_business", "users_line_business.id_user", "=", "users.id")
                        ->join("datos_personales", "datos_personales.id_usuario", "=", "users.id")
                        ->where("users_line_business.id_line", $request["id_line"])
                        ->where("users.id", $request["adviser"])
                        ->where("users.id", "!=", 69)
                        ->first();


       if($users){

            $request["name_user"]   = $users["nombres"]." ".$users["apellido_p"];

            $permitted_chars        = '0123456789abcdefghijklmnopqrstuvwxyz';
            $code                   = substr(str_shuffle($permitted_chars), 0, 4);
            $request["code_client"] = strtoupper($code);
            $request["prp"]         = "Si";
            $request["to_db"]       = "1";

            $request["id_user_asesora"] =  $users["id"];
            $request["origen"] =  "PRP Asesora ". $request["name_user"];


            $client = Clients::where("identificacion", $request["identificacion"])->get();
        

            if((sizeof($client) > 0) && ($request["identificacion"] != "")){


                foreach($client as $value){


                    if($value["prp"] == "Si"){
                        $data = array('mensagge' => "Ya se encuentra registrado en el PRP con el codigo: ".$value["code_client"]);    
                        return response()->json($data)->setStatusCode(400);
                    }
                    $update = array(
                        "code_client"     => $request["code_client"],
                        "prp"             => "Si",
                        "to_db"           => "1",
                        "origen"          =>  $request["origen"],
                        "telefono"        =>  $request["telefono"],
                        "id_user_asesora" => $request["id_user_asesora"],
                        "id_line"         => $request["id_line"]
                    );

                    Clients::find($value["id_cliente"])->update($update);
                    DB::table('auditoria')->where("cod_reg", $value["id_cliente"])
                            ->where("tabla", "clientes")
                            ->update(['fec_update' => date("Y-m-d H:i:s")]);
                    
                    $id_client = $value["id_cliente"];
                }

            }else{

                $cliente = Clients::create($request->all());
                    
                $request["id_client"] = $cliente["id_cliente"];
                
                ClientInformationAditionalSurgery::create($request->all());
                ClientClinicHistory::create($request->all());
                ClientCreditInformation::create($request->all());

                $auditoria              = new Auditoria;
                $auditoria->tabla       = "clientes";
                $auditoria->cod_reg     = $cliente["id_cliente"];
                $auditoria->status      = 1;
                $auditoria->fec_regins  = date("Y-m-d H:i:s");
                $auditoria->fec_update  = date("Y-m-d H:i:s");
                $auditoria->usr_regins  = $users["id"];
                $auditoria->save();


                $id_client = $cliente["id_cliente"];


            }


            $notification["fecha"]    = date("Y-m-d");
            $notification["title"]    = "Hoy Ingreso de PRP ".$request["nombres"]." codigo: ".$request["code_client"];
            $notification["id_user"]  = $users["id"];
            $notification["id_event"] = $id_client;
            $notification["type"]     = "prp";

            Notification::insert($notification);



            if($request["id_line"] == 2){
                $request["name_line"] = "Clínica Especialistas del Poblado (CEP)";
            }

            if($request["id_line"] == 3){
                $request["name_line"] = "CiruCredito";
            }

            if($request["id_line"] == 17){
                $request["name_line"] = "Doctor Daniel Correa";
            }
            if($request["id_line"] == 16){
                $request["name_line"] = "Planmed";
            }




            if($request["id_line"] == 18){
                $request["name_line"] = "CEP";
            }

            if($request["id_line"] == 14){
                $request["name_line"] = "Mas Estetic";
            }

            if($request["id_line"] == 15){
                $request["name_line"] = "Global Medical";
            }


            if(($request["id_line"] == 9)){
                $subject = "Formulario PRP Asesora  Clinica Laser: ".$request["nombres"];
            }

            if(($request["id_line"] == 2) || ($request["id_line"] == 3) || ($request["id_line"] == 17)){
                $subject = "Formulario PRP Asesora  ".$request["name_line"]." : ".$request["nombres"];
            }

            if(($request["id_line"] == 18) || ($request["id_line"] == 14) || ($request["id_line"] == 15)  || ($request["id_line"] == 16)){
                $subject = "Formulario PRP Asesora  ".$request["name_line"].": ".$request["nombres"];
            }

           // $for = "cardenascarlos18@gmail.com";
            $for = $users["email"];
           // $for = "cardenascarlos18@gmail.com";

            $request["msg"]  = "Wiiii :D";

            Mail::send('emails.formsPrp',$request->all(), function($msj) use($subject,$for){
                $msj->from("cardenascarlos18@gmail.com","CRM");
                $msj->subject($subject);
                $msj->to($for);
            });

            /*
                Mail::send('emails.formsPrp',$request->all(), function($msj) use($subject,$for){
                    $msj->from("cardenascarlos18@gmail.com","CRM");
                    $msj->subject($subject);
                    $msj->to("pdtagenciademedios@gmail.com");
                });
            */

       }


       $data = array('mensagge' => "Los datos fueron registrados satisfactoriamente");    
       return response()->json($data)->setStatusCode(200);

        
    }
    


    public function ClientFormsPrpAdviserLuisa(Request $request){

       
        $users = User::join("users_line_business", "users_line_business.id_user", "=", "users.id")
                        ->join("datos_personales", "datos_personales.id_usuario", "=", "users.id")
                        ->where("users_line_business.id_line", $request["id_line"])
                        ->where("users.id", $request["adviser"])
                        ->first();


       if($users){


            $request["name_user"]   = $users["nombres"]." ".$users["apellido_p"];

            $permitted_chars        = '0123456789abcdefghijklmnopqrstuvwxyz';
            $code                   = substr(str_shuffle($permitted_chars), 0, 4);
            $request["code_client"] = strtoupper($code);
            $request["prp"]         = "Si";
            $request["to_db"]       = "1";

            $request["id_user_asesora"] =  $users["id"];
            $request["origen"]          =  "PRP Asesora ". $request["name_user"];


            $client = Clients::where("identificacion", $request["identificacion"])->get();

            if((sizeof($client) > 0) && ($request["identificacion"] != "")){

                foreach($client as $value){

                    if($value["prp"] == "Si"){
                        $data = array('mensagge' => "Ya se encuentra registrado en el PRP con el codigo: ".$value["code_client"]);    
                        return response()->json($data)->setStatusCode(400);
                    }


                    $update = array(
                        "code_client"     => $request["code_client"],
                        "prp"             => "Si",
                        "to_db"           => "1",
                        "origen"          =>  $request["origen"],
                        "telefono"        =>  $request["telefono"],
                        "id_user_asesora" => $request["id_user_asesora"],
                        "id_line"         => $request["id_line"]
                    );

                    Clients::find($value["id_cliente"])->update($update);
                    DB::table('auditoria')->where("cod_reg", $value["id_cliente"])
                            ->where("tabla", "clientes")
                            ->update(['fec_update' => date("Y-m-d H:i:s")]);
                    
                    $id_client = $value["id_cliente"];
                }

            }else{
                $cliente = Clients::create($request->all());
                    
                $request["id_client"] = $cliente["id_cliente"];
                
                ClientInformationAditionalSurgery::create($request->all());
                ClientClinicHistory::create($request->all());
                ClientCreditInformation::create($request->all());

                $auditoria              = new Auditoria;
                $auditoria->tabla       = "clientes";
                $auditoria->cod_reg     = $cliente["id_cliente"];
                $auditoria->status      = 1;
                $auditoria->fec_regins  = date("Y-m-d H:i:s");
                $auditoria->fec_update  = date("Y-m-d H:i:s");
                $auditoria->usr_regins  = $users["id"];
                $auditoria->save();

                $id_client = $cliente["id_cliente"];
            }
            

            $notification["fecha"]    = date("Y-m-d");
            $notification["title"]    = "Hoy Ingreso de PRP ".$request["nombres"]." codigo: ".$request["code_client"];
            $notification["id_user"]  = $users["id"];
            $notification["id_event"] = $id_client;
            $notification["type"]     = "prp";

            Notification::insert($notification);




            if($request["id_line"] == 8){
                $request["name_line"] = "Cirugía Plástica Medellin CPEI";
            }

            if($request["id_line"] == 6){
                $request["name_line"] = "Cirufacil";
            }



            $subject = "Formulario PRP para ".$request["name_user"]." : ".$request["name_line"].": ".$request["nombres"];

            //$for = "cardenascarlos18@gmail.com";
            $for = $users["email"];
           // $for = "cardenascarlos18@gmail.com";

            $request["msg"]  = "..";

            Mail::send('emails.formsPrp',$request->all(), function($msj) use($subject,$for){
                $msj->from("cardenascarlos18@gmail.com","CRM");
                $msj->subject($subject);
                $msj->to($for);
            });


            Mail::send('emails.formsPrp',$request->all(), function($msj) use($subject,$for){
                $msj->from("cardenascarlos18@gmail.com","CRM");
                $msj->subject($subject);
                $msj->to("cardenascarlos18@gmail.com");
            });
           

       }


       $data = array('mensagge' => "Los datos fueron registrados satisfactoriamente");    
       return response()->json($data)->setStatusCode(200);


        
        
    }







    public function changeName(){

        $data = Clients::get();

        foreach($data as $value){

           $new_nombre = $value["nombres"]." ".$value["apellidos"];

           $cliente = Clients::find($value["id_cliente"])->update(["nombres" => $new_nombre]);

           echo $new_nombre."<br><br>";

        }
    }

    public function GenerateCodes(){
        $data = Clients::get();

        foreach($data as $value){



            $permitted_chars        = '0123456789abcdefghijklmnopqrstuvwxyz';
            $code                   = substr(str_shuffle($permitted_chars), 0, 4);

           $cliente = Clients::find($value["id_cliente"])->update(["code_client" => strtoupper($code)]);

           echo $code."<br><br>";

        }
        

       
    }


    public function GetComments($id_client){

        $data = Comments::select('comments.*', 'users.email', 'users.img_profile', "datos_personales.nombres as name_user", "datos_personales.apellido_p as last_name_user")
                            ->where("id_event", $id_client)
                            ->join('users', 'users.id', '=', 'comments.id_user')  
                            ->join('datos_personales', 'datos_personales.id_usuario', '=', 'comments.id_user')     
                            ->where("table", "clients")
                            ->get();

        return response()->json($data)->setStatusCode(200);
    }


    public function UpdateHc(Request $request, $client){

        $request["children"]    = 1;
        $request["surgery"]    = 1;
        $request["disease"]    = 1;
        $request["medication"] = 1;
        $request["allergic"]   = 1;

        $alcohol = strtoupper($request["alcohol"]);
        $alcohol   == "SI" ? $request["alcohol"] = 1 : $request["alcohol"] = 0;


        $smoke = strtoupper($request["smoke"]);
        $smoke   == "SI" ? $request["smoke"] = 1 : $request["smoke"] = 0;



        ClientClinicHistory::find($client)->update($request->all());

        return response()->json("Ok")->setStatusCode(200);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clients $clients)
    {
        //
    }
}
