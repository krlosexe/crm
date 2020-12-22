<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Clients,WellezyCotization,WellezyValoration};
use DB;

class CotizacionController extends Controller
{
    public function ListCotization()
    {
        try {

            $valuations = DB::table('clientes')
                ->select(
                    'wellezy_cotization.*',
                    'clientes.*'
                )
                ->leftJoin('wellezy_cotization','clientes.id_cliente','wellezy_cotization.id_cliente')
                ->where('clientes.wallezy',1)
                ->get();

                $valuations->map(function($item){
                    $item->detalle  =  WellezyCotization::where('id_padre',$item->id)->get();
                     return $item;
                });

            return $valuations;

        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function CreateCotization(Request $request,$cliente)
    {
        try {

            $select =  WellezyCotization::where('id_cliente',$request->id_cliente)->exists();

                if($select){

                    $padre =  WellezyCotization::where('id_cliente',$request->id_cliente)->first();
                    WellezyCotization::where('id_padre',$padre['id'])->delete();
                    WellezyCotization::where('id_cliente',$request->id_cliente)->delete();

                }

                $wellezy = new WellezyCotization;
                $wellezy->id_cliente = $request->id_cliente;
                $wellezy->amount_surgery = $request->amount;
                $wellezy->save();

                if(count($request->aditional) > 0){
                        foreach($request->aditional as $key => $value){
                        $array = [];
                        $array["id_padre"]     = $wellezy->id;;
                        $array["decription_aditional"]     = $value;
                        $array["price_aditional"] = str_replace('.', '', $request["price_aditional"][$key]);
                        $array["price_aditional"] = str_replace(',', '.', $array["price_aditional"]);

                        $create =  WellezyCotization::create($array);
                    }
                }

                if ($create) {
                    $data = array('mensagge' => "Los datos fueron registrados satisfactoriamente");
                    return response()->json($data)->setStatusCode(200);
                }else{
                    return response()->json("A ocurrido un error")->setStatusCode(400);
                }

        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function ListCotizationByClient($cliente)
    {
        try {

            $cotization =  WellezyCotization::where('id_cliente',$cliente)->whereNull('id_padre')->get();

                $cotization->map(function($item){
                    $item->detalle  =  WellezyCotization::where('id_padre',$item->id)->get();
                    $item->solicitud = DB::table('wellezy_valoration')
                                ->select(
                                    'wellezy_valoration.*',
                                    'sub_category.*',
                                    'sub_category.name as name_sub',
                                    'sub_category.name_ingles as name_ingles_sub',
                                    'category.*'
                                )
                                ->join('sub_category','wellezy_valoration.id_subcategory','sub_category.id')
                                ->join('category','sub_category.id_category','category.id')
                                ->get();

                    return $item;
                });

            return $cotization;

        } catch (\Throwable $th) {
            return $th;
        }
    }
    public function CreateValoration(Request $request)
    {



        foreach($request["photos"] as $value){


            $folder = "img/wellezy/valorations";

            $img      = str_replace('data:image/png;base64,', '', $value);
            $fileData = base64_decode($img);
            $fileName = rand(0, 100000000) . '-foto-valoration.png';
            file_put_contents($folder . "/" . $fileName, $fileData);

            $request["photo"] = $fileName;

            $res = WellezyValoration::create([
                "id_cliente"     => $request["id_cliente"],
                "id_subcategory" => $request["id_subcategory"],
                "photo"          => $request["photo"],
            ]);
        }
        $data = array('mensagge' => "Los datos fueron registrados satisfactoriamente");
        return response()->json($data)->setStatusCode(200);
    }
}
