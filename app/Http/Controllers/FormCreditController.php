<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\FormCreditDatosGenerales;
use App\FormCreditConyuge;
use App\FormCreditActividadEconomicaAdress;
use App\FormCreditIngresosEgresos;
use App\FormCreditProcedure;
use App\FormCreditRelacionActivos;
use App\FormCreditReferencias;

use Mail;
use DB;
use App\User;
use App\FormAutorizationStudioCredit;
class FormCreditController extends Controller
{
    public function store(Request $request){

        $form = FormCreditDatosGenerales::create($request->all());

        $request["id_form"] = $form->id;

        FormCreditConyuge::create($request->all());
        FormCreditActividadEconomicaAdress::create($request->all());
        FormCreditIngresosEgresos::create($request->all());

        if(isset($request["procedure"])){

            $procedimientos = $request["procedure"];

            foreach($procedimientos as $value){
                $array["procedure"] = $value;
                $array["id_form"]   = $request["id_form"];

                FormCreditProcedure::create($array);
            }

        }


        FormCreditRelacionActivos::create($request->all());
        FormCreditReferencias::create($request->all());




        if($request["id_line"] == 6){
            $subject = "SOLICITUD DE CREDITO ". $request["first_name"]." ".$request["first_last_name"];
            $for = "aprobacionescirufacil@gmail.com";
            //$for = $user["email"];

            $request["msg"]  = "Han diligenciado un Formulario de Solicitud de Credito";

            Mail::send('emails.form_solicitud_credit',$request->all(), function($msj) use($subject,$for){
                $msj->from("comercial@pdtagencia.com","CRM");
                $msj->subject($subject);
                $msj->to($for);
            });
        }else{

            $users = User::join("users_line_business", "users_line_business.id_user" , "=", "users.id")
                        ->where("users_line_business.id_line", $request["id_line"])
                        ->get();




            foreach($users as $user){

                $subject = "SOLICITUD DE CREDITO ". $request["first_name"]." ".$request["first_last_name"];
            // $for = "comercial@pdtagencia.com";
                $for = $user["email"];

                $request["msg"]  = "Han diligenciado un Formulario de Solicitud de Credito";

                Mail::send('emails.form_solicitud_credit',$request->all(), function($msj) use($subject,$for){
                    $msj->from("comercial@pdtagencia.com","CRM");
                    $msj->subject($subject);
                    $msj->to($for);
                });

            }

        }





        $subject = "SOLICITUD DE CREDITO ". $request["first_name"]." ".$request["first_last_name"];
        $for = "comercial@pdtagencia.com";
        //$for = $user["email"];

        $request["msg"]  = "Han diligenciado un Formulario de Solicitud de Credito";

        Mail::send('emails.form_solicitud_credit',$request->all(), function($msj) use($subject,$for){
            $msj->from("comercial@pdtagencia.com","CRM");
            $msj->subject($subject);
            $msj->to($for);
        });


        return response()->json("Ok")->setStatusCode(200);
    }








    public function storeAutorization(Request $request){

        FormAutorizationStudioCredit::create($request->all());



        if($request["id_line"] == 6){

            $subject = "AUTORIZACION PARA CONSULTA Y REPORTE A CENTRALES DE BANCOS DE DATOS ".$request["names"]." ".$request["last_names"];
            $for = "aprobacionescirufacil@gmail.com";
           // $for = $user["email"];

            $request["msg"]  = "Un Paciente dio Autroizacion para Consulta y Reporte a Centrales de Bancos de Datos";

           Mail::send('emails.forms_authorization',$request->all(), function($msj) use($subject,$for){
                $msj->from("comercial@pdtagencia.com","CRM");
                $msj->subject($subject);
                $msj->to($for);
            });

        }else{

            $users = User::join("users_line_business", "users_line_business.id_user" , "=", "users.id")
                        ->where("users_line_business.id_line", $request["id_line"])
                        ->get();



            foreach($users as $user){

                $subject = "AUTORIZACION PARA CONSULTA Y REPORTE A CENTRALES DE BANCOS DE DATOS ". $request["names"]." ".$request["last_names"];
                //$for = "comercial@pdtagencia.com";
                $for = $user["email"];

                $request["msg"]  = "Un Paciente dio Autroizacion para Consulta y Reporte a Centrales de Bancos de Datos";

                Mail::send('emails.forms_authorization',$request->all(), function($msj) use($subject,$for){
                    $msj->from("comercial@pdtagencia.com","CRM");
                    $msj->subject($subject);
                    $msj->to($for);
                });

            }
        }





            $subject = "AUTORIZACION PARA CONSULTA Y REPORTE A CENTRALES DE BANCOS DE DATOS ".$request["names"]." ".$request["last_names"];
            $for = "comercial@pdtagencia.com";
           // $for = $user["email"];

            $request["msg"]  = "Un Paciente dio Autroizacion para Consulta y Reporte a Centrales de Bancos de Datos";

           Mail::send('emails.forms_authorization',$request->all(), function($msj) use($subject,$for){
                $msj->from("comercial@pdtagencia.com","CRM");
                $msj->subject($subject);
                $msj->to($for);
            });





        return response()->json("Ok")->setStatusCode(200);

    }





    public function StoreDataPersonal(Request $request){

        $form = FormCreditDatosGenerales::create($request->all());

        return response()->json("Ok")->setStatusCode(200);

    }


    public function StoreActivityEconomic(Request $request){

        $form = FormCreditActividadEconomicaAdress::create($request->all());

        return response()->json($request->all())->setStatusCode(200);

    }



    public function StoreRelationsActivos(Request $request){

        $form = FormCreditRelacionActivos::create($request->all());

        return response()->json($request->all())->setStatusCode(200);

    }






    public function GetFormDataPersonal($id_client){
        $data = FormCreditDatosGenerales::where("id_client", $id_client)->get();
        return response()->json(sizeof($data))->setStatusCode(200);
    }



    public function GetActivityEconomic($id_client){
        $data = FormCreditActividadEconomicaAdress::where("id_client", $id_client)->get();
        return response()->json(sizeof($data))->setStatusCode(200);
    }



    public function GetRelationsActivos($id_client){
        $data = FormCreditRelacionActivos::where("id_client", $id_client)->get();
        return response()->json(sizeof($data))->setStatusCode(200);
    }


    public function UploadIdentification(Request $request){



        $folder = "img/credit/cedulas";

        $img      = str_replace('data:image/png;base64,', '', $request["file_base_64"]);
        $fileData = base64_decode($img);
        $fileName = $request["id_client"].'-cedula.png';
        file_put_contents($folder."/".$fileName, $fileData);



        DB::table("form_credit_photo_identification")->insert([
            "id_client" => $request["id_client"],
            "photo"     => $fileName
        ]);
        return response()->json(sizeof([1]))->setStatusCode(200);
    }



    public function GetPhotoIdentification($id_client){
        $data = DB::table("form_credit_photo_identification")->where("id_client", $id_client)->get();
        return response()->json(sizeof($data))->setStatusCode(200);
    }






    public function UploadIdentificationRear(Request $request){

        $folder = "img/credit/cedulas";

        $img      = str_replace('data:image/png;base64,', '', $request["file_base_64"]);
        $fileData = base64_decode($img);
        $fileName = $request["id_client"].'-cedula-rear.png';
        file_put_contents($folder."/".$fileName, $fileData);



        DB::table("form_credit_photo_identification_rear")->insert([
            "id_client" => $request["id_client"],
            "photo"     => $fileName
        ]);
        return response()->json(sizeof([1]))->setStatusCode(200);
    }



    public function GetPhotoIdentificationRear($id_client){
        $data = DB::table("form_credit_photo_identification_rear")->where("id_client", $id_client)->get();
        return response()->json(sizeof($data))->setStatusCode(200);
    }




    public function UploadFace(Request $request){



        $folder = "img/credit/faces";

        $img      = str_replace('data:image/png;base64,', '', $request["file_base_64"]);
        $fileData = base64_decode($img);
        $fileName = $request["id_client"].'-face.png';
        file_put_contents($folder."/".$fileName, $fileData);



        DB::table("form_credit_photo_face")->insert([
            "id_client" => $request["id_client"],
            "photo"     => $fileName
        ]);
        return response()->json(sizeof([1]))->setStatusCode(200);
    }



    public function GetPhotoFace($id_client){
        $data = DB::table("form_credit_photo_face")->where("id_client", $id_client)->get();
        return response()->json(sizeof($data))->setStatusCode(200);
    }





}
