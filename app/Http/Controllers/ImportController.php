<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;


use App\{
    Clients,
    ClientRequestCredit,
    Auditoria,
    ClientCreditInformation,
    ClientInformationAditionalSurgery,
    Tasks,
    ClientClinicHistory,
    ClientRequestCreditPaymentPlan,
};
use DateTime;
class ImportController extends Controller
{
    public function clients()
    {
        ini_set("default_charset", "UTF-8");
        $fila = 1;

        $data = [];
        if (($gestor = fopen("datos.csv", "r")) !== FALSE) {
            while (($datos = fgetcsv($gestor, 1000, ",")) !== FALSE) {

                $numero = count($datos);
                    echo "<p> $numero de campos en la línea $fila: <br /></p>\n";

                if($fila != 1){

                    $permitted_chars        = '0123456789abcdefghijklmnopqrstuvwxyz';
                    $code                   = substr(str_shuffle($permitted_chars), 0, 4);


                    $city = 3;
                    if($datos[12] == "Cali"){
                        $city = 5;
                    }

                    if($datos[12] == "Medellin"){
                        $city = 3;
                    }


                    if($datos[12] == "Bogota"){
                        $city = 4;
                    }

                    $date=date_create($datos[3]);

                    // using date_format() function to format date
                    $datos[3] = date_format($date, "Y-m-d");


                    $row = array(
                        "nombres" => $datos[0]." ".$datos[2]." ".$datos[1],
                        "apellidos" => "",
                        "identificacion" =>  isset($datos[11]) ? $datos[11] : null,
                        "identificacion_verify" => 0,
                        "fecha_nacimiento" => $datos[3] != "" ? $datos[3] : null,
                        "city" => $city,
                        "clinic" => 6,
                        "telefono" => $datos[8],
                        "email" => isset($datos[9]) ? $datos[9] : null,
                        "id_line" => 2,
                        "id_user_asesora" => 83,
                        "direccion" => isset($datos[12]) ? $datos[12] : null,
                        "origen"    => $datos[5],
                        "state"     =>isset($datos[14]) ? $datos[14] != "" ? $datos[14] : null : null,
                        "code_client" => strtoupper($code),
                        "to_db" => 1
                    );


                $data[] = $row;
                $cliente = Clients::create($row);

                $auditoria              = new Auditoria;
                $auditoria->tabla       = "clientes";
                $auditoria->cod_reg     = $cliente["id_cliente"];
                $auditoria->status      = 1;
                $auditoria->fec_regins  = date("2020-04-06 19:05:59");
                $auditoria->fec_update  = date("2020-04-06 19:05:59");
                $auditoria->usr_regins  = 69;
                $auditoria->save();


                    $row = array(
                        "id_client"    => $cliente["id_cliente"],
                        "name_surgery" => isset($datos[32]) ? $datos[32] : null
                    );



                    ClientInformationAditionalSurgery::create($row);
                    ClientClinicHistory::create($row);
                    ClientCreditInformation::create($row);
                }


                $fila++;


            }
           echo json_encode($data);

            fclose($gestor);
        }

    }









    public function Calendar(){
        ini_set("default_charset", "UTF-8");
        $fila = 1;

        $data = [];
        if (($gestor = fopen("data.ics", "r")) !== FALSE) {
            while (($datos = fgetcsv($gestor, 1000, "|")) !== FALSE) {
                $numero = count($datos);
                //echo "<p> $numero de campos en la línea $fila: <br /></p>\n";
                $fila++;

                // $row = array(
                //     "nombres" => $datos[3],
                //     "apellidos" => $datos[4],
                //     "identificacion" =>  isset($datos[57]) ? $datos[57] : null,
                //     "identificacion_verify" => 0,
                //     "fecha_nacimiento" => $datos[6] != "" ? $datos[6] : null,
                //     "city" => 3,
                //     "clinic" => null,
                //     "telefono" => $datos[11],
                //     "email" => isset($datos[25]) ? $datos[25] : null,
                //     "id_line" => 11,
                //     "id_user_asesora" => 69,
                //     "direccion" => isset($datos[66]) ? $datos[66] : null,
                //     "state"     =>isset($datos[63]) ? $datos[63] != "" ? $datos[63] : null : null,
                // );

                // $data[] = $row;
                echo json_encode($datos)."<br><br>";
            }


            fclose($gestor);
        }

    }

    public function ImportCredits()
    {
        ini_set("default_charset", "UTF-8");
        $fila = 1;

        $data = [];
        if (($gestor = fopen("credits.csv", "r")) !== FALSE) {
            while (($datos = fgetcsv($gestor, 1000, ";")) !== FALSE) {

                $numero         = count($datos);
                $cedula         = $datos[0];
                $monto_credito  = $datos[1];
                $periodo        = $datos[2];
                $monto_cuota    = $datos[3];
                $date           = $datos[4];

                $client = Clients::where("identificacion", trim($cedula))->first();




                $datetime = $date;
                $d = DateTime::createFromFormat("d/m/Y", $datetime);
                $date = $d->format("Y-m-d"); // or any you want



                $date = date("Y-m-d", strtotime($date));

                if($client){
                         echo $client["id_cliente"];
                        $head = new ClientRequestCredit;
                        $head->id_client          = $client["id_cliente"];
                        $head->required_amount    = $monto_credito;
                        $head->period             = $periodo;
                        $head->monthly_fee	      = $monto_cuota;
                        $head->status             = "Desembolsado";
                        $head->save();




                    for ($i=1; $i <= $periodo; $i++) {

                        $items = new ClientRequestCreditPaymentPlan;
                        $items->id_request_credit  = $head->id;
                        $items->number             = $i;
                        $items->balance	           = 0;
                        $items->monthly_fees	      = $monto_cuota;
                        $items->date	           = $date;
                        $items->status             = "Pendiente";
                        $items->save();

                        $date  = date("Y-m-d", strtotime($date . "+ 1 month"));
                    }
                }
                echo "<br>";
                $fila++;

                $row = array(
                    "responsable"   => 69,
                   // "issue"         => $datos[1]

                );
            }
          // echo json_encode($datos);
           fclose($gestor);
        }

    }






    public function ImportTasks()
    {
        ini_set("default_charset", "UTF-8");
        $fila = 1;

        $data = [];
        if (($gestor = fopen("tasks.csv", "r")) !== FALSE) {
            while (($datos = fgetcsv($gestor, 1000, ";")) !== FALSE) {
                $numero = count($datos);
                //echo "<p> $numero de campos en la línea $fila: <br /></p>\n";
                $fila++;

                $row = array(
                    "responsable"   => 69,
                    "issue"         => $datos[1],
                    "fecha"         => $datos[2],
                    "time"          => "18:00:00",
                    "status_task"   => $datos[5],
                    "observaciones" => $datos[16]

                );

                $data[] = $row;
                $store = Tasks::create($row);

                $auditoria              = new Auditoria;
                $auditoria->tabla       = "tasks";
                $auditoria->cod_reg     = $store["id_tasks"];
                $auditoria->status      = 1;
                $auditoria->usr_regins  = 69;
                $auditoria->save();

            }
            echo "asd";
           echo json_encode($data);

            fclose($gestor);
        }

    }


}
