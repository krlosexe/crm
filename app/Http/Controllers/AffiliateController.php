<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clients;
use App\User;
use DB;
class AffiliateController extends Controller
{
    public function qty($id_affiliate){
        
        $data = Clients::where("id_affiliate", $id_affiliate)
                        ->get();

        return response()->json(sizeof($data))->setStatusCode(200);
    }




    public function Dasboard($id_user){

        

        $data = [
            "total_refferers" => $this->TotalReffers($id_user),
            "earnings"        => $this->Earnings($id_user),
            "global_meta"     => 0
        ];

        return response()->json($data)->setStatusCode(200);

    }













    public function Earnings($id_user){

        $data = DB::table("paysheet")
                          ->selectRaw("SUM(total) as total")
                          ->where("id_affiliate", $id_user)
                          ->first();
        
        if($data){
            $total = round($data->total, 2);
        }else{
            $total = 0;
        }
        return $total;
    }




    public function TotalReffers($id_user){

        $user = User::where("id", $id_user)->first();

        if($user["id_rol"] == 6){
            $where = array(
                "clientes.id_user_asesora" => $id_user,
                "clientes.origen"          => "Referido Asesora",
            );

            $total_refferers = Clients::where($where)->selectRaw("clientes.*")
                                                    ->get();
        }


        if($user["id_rol"] == 17){
            $total_refferers = Clients::where("id_affiliate", $user["id_client"])
                        ->get();
        }


        return sizeof($total_refferers);
    }








    public function StatisticsSales($user_id){
       
        $data = [
            "week"  => $this->StatisticsSalesWeek($user_id),
            "month" => $this->StatisticsSalesMonth($user_id),
            "year"  => $this->StatisticsSalesYear($user_id)
        ];

        return response()->json($data)->setStatusCode(200);
    }
    









    public function StatisticsSalesWeek($user_id){

        $year  = date("Y");
        $month = date("m");
        $day   = date("d");


        $days = [1, 2, 3, 4, 5, 6, 7];
        $sales = [];
        foreach($days as $value){

            # Obtenemos el numero de la semana
            $semana = date("W",mktime(0,0,0,$month,$day,$year));
            
            # Obtenemos el día de la semana de la fecha dada
            $diaSemana = date("w",mktime(0,0,0,$month,$day,$year));
            
            # el 0 equivale al domingo...
            if($diaSemana == 0)
                $diaSemana = 7;
            
            # A la fecha recibida, le restamos el dia de la semana y obtendremos el lunes
            $DayWeek = date("Y-m-d",mktime(0,0,0,$month,$day-$diaSemana+$value,$year));
        
            $data = DB::table("paysheet")
                          ->selectRaw("COUNT(total) as total")
                          ->where("id_affiliate", $user_id)
                          ->where("create_at", ">=", $DayWeek." 00:00:00")
                          ->where("create_at", "<=", $DayWeek." 23:59:59")
                          ->first();

            if($data){
                $total = round($data->total, 2);
            }else{
                $total = 0;
            }

            $sales[] = $total;

        }

        $data = [
            "datasets" => [
                "data"  => $sales
            ]
        ];

        return $data;
    }



    public function StatisticsSalesMonth($user_id){

        $days = cal_days_in_month(CAL_GREGORIAN, date("m"), date("Y"));

        $sales = [];
        for($i = 1; $i <= $days; $i++){

           $date = date("Y")."-".date("m")."-".$i;

           $data = DB::table("paysheet")
                          ->selectRaw("COUNT(total) as total")
                          ->where("id_affiliate", $user_id)
                          ->where("create_at", ">=", $date." 00:00:00")
                          ->where("create_at", "<=", $date." 23:59:59")
                          ->first();

            if($data){
                $total = round($data->total, 2);
            }else{
                $total = 0;
            }

            $sales[] = $total;

        }

        $data = [
            "datasets" => [
                "data"  => $sales
            ]
        ];

        return $data;



    }



    public function StatisticsSalesYear($user_id){

        
        $months = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];


        foreach($months as $value){

           $data = DB::table("paysheet")
                        ->selectRaw("COUNT(total) as total")
                        ->where("id_affiliate", $user_id)
                        ->whereRaw("MONTH(create_at) = ".$value." and YEAR(create_at) = ".date("Y")."")
                        ->first();

            if($data){
                $total = round($data->total, 2);
            }else{
                $total = 0;
            }

            $sales[] = $total;

        }


        $data = [
            "datasets" => [
                "data"  => $sales
            ]
        ];

        return $data;

        
    }

}
