<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;


use App\Clients;
use App\Auditoria;
use App\ClientClinicHistory;
use App\ClientCreditInformation;
use App\ClientInformationAditionalSurgery;



use App\Tasks;


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


                    $row = array(
                        "nombres" => $datos[0]." ".$datos[2]." ".$datos[1],
                        "apellidos" => "",
                        "identificacion" =>  isset($datos[11]) ? $datos[11] : null,
                        "identificacion_verify" => 0,
                        "fecha_nacimiento" => $datos[3] != "" ? $datos[3] : null,
                        "city" => $city,
                        "clinic" => 5,
                        "telefono" => $datos[8],
                        "email" => isset($datos[9]) ? $datos[9] : null,
                        "id_line" => 16,
                        "id_user_asesora" => 95,
                        "direccion" => isset($datos[12]) ? $datos[12] : null, 
                        "origen"    => $datos[5],
                        "state"     =>isset($datos[14]) ? $datos[14] != "" ? $datos[14] : null : null,
                        "code_client" => strtoupper($code)
                    );
                    

                $data[] = $row;
                $cliente = Clients::create($row);

                $auditoria              = new Auditoria;
                $auditoria->tabla       = "clientes";
                $auditoria->cod_reg     = $cliente["id_cliente"];
                $auditoria->status      = 1;
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
