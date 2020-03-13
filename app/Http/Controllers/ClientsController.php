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

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



use App\Exports\ClientsExport;
use Maatwebsite\Excel\Facades\Excel;

use Orchestra\Parser\Xml\Facade as XmlParser;

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
            
            $data = Clients::select("clientes.*", "client_information_aditional_surgery.*" , "client_clinic_history.*", 
                                       "clientc_credit_information.*", "auditoria.*", "user_registro.email as email_regis", "datos_personales.nombres as name_register",
                                       "datos_personales.apellido_p as apellido_register"
                                     )

                                ->join("auditoria", "auditoria.cod_reg", "=", "clientes.id_cliente")

                                ->join("client_information_aditional_surgery", "client_information_aditional_surgery.id_client", "=", "clientes.id_cliente")
                                ->join("client_clinic_history", "client_clinic_history.id_client", "=", "clientes.id_cliente")
                                ->join("clientc_credit_information", "clientc_credit_information.id_client", "=", "clientes.id_cliente")
                                ->join('datos_personales', 'datos_personales.id_usuario', '=', 'clientes.id_user_asesora')


                                // ->where(function ($query) use ($rol, $id_user) {
                                //     if($rol == "Asesor"){
                                //         $query->where("clientes.id_user_asesora", $id_user);
                                //         $query->orWhere("clientes.id_asesora_valoracion", $id_user);
                                //     }
                                // })


                                ->where("auditoria.tabla", "clientes")
                                ->join("users as user_registro", "user_registro.id", "=", "auditoria.usr_regins")
                                ->where("auditoria.status", "!=", "0")
                                ->orderBy("clientes.id_cliente", "DESC")
                                ->get();


                
           
            return response()->json($data)->setStatusCode(200);
        }else{
            return response()->json("No esta autorizado")->setStatusCode(400);
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
                'apellidos'       => 'required',
                'telefono'        => 'required|unique:clientes',
                'email'           => 'required|unique:clientes',
               // 'direccion'       => 'required'

            ], $messages);  


            if ($validator->fails()) {
                return response()->json($validator->errors())->setStatusCode(400);
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
                $auditoria->usr_regins  = $request["id_user"];
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
            $modulos = Clients::select("clientes.*", "auditoria.*", "user_registro.email as email_regis")
                                ->join("auditoria", "auditoria.cod_reg", "=", "clientes.id_cliente")
                                ->join("users as user_registro", "user_registro.id", "=", "auditoria.usr_regins")
                                ->where("auditoria.tabla", "clientes")
                                ->where("auditoria.status", "!=", "0")
                                ->where("clientes.id_cliente", "=", $clients)
                                ->orderBy("clientes.id_cliente", "DESC")
                                ->first();
           
            return response()->json($modulos)->setStatusCode(200);
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


            $cliente = Clients::find($id_cliente)->update($request->all());
            ClientInformationAditionalSurgery::find($id_cliente)->update($request->all());
            ClientClinicHistory::find($id_cliente)->update($request->all());
            ClientCreditInformation::find($id_cliente)->update($request->all());

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
            $request["responsable"] = $request["id_user"];
            $store = ClientsTasks::create($request->all());


            $auditoria              = new Auditoria;
            $auditoria->tabla       = "clients_tasks";
            $auditoria->cod_reg     = $store["id_clients_tasks"];
            $auditoria->status      = 1;
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
            ClientsTasksComments::create($request->all());


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
            

            if(isset($request->comments)){
                $comments = [];

                foreach($request->comments as $key => $value){
                    $array = [];
                    $array["id_task"]     = $id_task;
                    $array["id_user"] = $request["id_user"];
                    $array["comments"] = $value;
                    array_push($comments, $array);
                }
                ClientsTasksComments::insert($comments);
                
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
                                   "datos_personales.apellido_p as last_name_responsable", "auditoria.*", "users.email as email_regis")

                                    ->join("auditoria", "auditoria.cod_reg", "=", "clients_tasks.id_clients_tasks")
                                    ->join("users", "users.id", "=", "auditoria.usr_regins")

                                    ->join("users as responsable", "responsable.id", "=", "clients_tasks.responsable")
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



            $tasks = ClientsTasks::select("clients_tasks.*", "responsable.email as email_responsable", "datos_personales.nombres as name_responsable", 
                                   "datos_personales.apellido_p as last_name_responsable", "auditoria.*", "users.email as email_regis")

                                    ->join("auditoria", "auditoria.cod_reg", "=", "clients_tasks.id_clients_tasks")
                                    ->join("users", "users.id", "=", "auditoria.usr_regins")

                                    ->join("users as responsable", "responsable.id", "=", "clients_tasks.responsable")
                                    ->join("datos_personales", "datos_personales.id_usuario", "=", "responsable.id")

                                    ->with("followers")
                                    ->with("comments")


                                    ->where(function ($query) use ($rol, $id_user) {
                                        if($rol == "Asesor"){
                                            $query->where("clients_tasks.responsable", $id_user);
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




    public function Excel(){
        return Excel::download(new ClientsExport, 'ClientExport.xlsx');
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
                $cliente = Clients::create($array);

                $array["id_client"]   = $cliente["id_cliente"];
                
                ClientInformationAditionalSurgery::create($array);
                ClientClinicHistory::create($array);
                ClientCreditInformation::create($array);

                $auditoria              = new Auditoria;
                $auditoria->tabla       = "clientes";
                $auditoria->cod_reg     = $cliente["id_cliente"];
                $auditoria->status      = 1;
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
                        ->first();

       if($users){

            $request["id_user_asesora"] =  $users["id"];
            $cliente = Clients::create($request->all());
                    
            $request["id_client"] = $cliente["id_cliente"];
            
            ClientInformationAditionalSurgery::create($request->all());
            ClientClinicHistory::create($request->all());
            ClientCreditInformation::create($request->all());

            $auditoria              = new Auditoria;
            $auditoria->tabla       = "clientes";
            $auditoria->cod_reg     = $cliente["id_cliente"];
            $auditoria->status      = 1;
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
           
            $data = array('mensagge' => "Los datos fueron registrados satisfactoriamente");    
            return response()->json($data)->setStatusCode(200);

       }else{
          
           $users = User::join("users_line_business", "users_line_business.id_user", "=", "users.id")
                        ->where("users_line_business.id_line", $request["id_line"])
                        ->where("users.queue", 1)
                        ->update(["queue" => 0]);

            $this->ClientForms($request);
       }
        
        
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
