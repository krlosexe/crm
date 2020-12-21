<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WellezyService;


class WellezyServicesController extends Controller
{
    public function ListServices()
    {
        try {
            
            $list = WellezyService::get();
            return response()->json($list)->setStatusCode(200);

        } catch (\Throwable $th) {
            return  $th;
        }
    }
    public function CreateServices(Request $request)
    {
        try {

            $file = $request->file('img-profile');
            $destinationPath = 'img/wellezy/services';
            $file->move($destinationPath,$file->getClientOriginalName());
            
            $request["image"] = $file->getClientOriginalName(); 

            $create = new WellezyService;
            $create->name = $request->name;
            $create->image = $request->image;
            $create->save();

            if ($create) {
                $data = array('mensagge' => "Los datos fueron registrados satisfactoriamente");
                return response()->json($data)->setStatusCode(200);
            }else{
                return response()->json("A ocurrido un error")->setStatusCode(400);
            }

        } catch (\Throwable $th) {
            return  $th;
        }
    }
    public function UpdateServices(Request $request, $id)
    {
        try {
            $file = $request->file('img-profile');
                
            $edit =  WellezyService::find($id);
            $edit->name = $request->name;
            if ($file!=null) {
                $destinationPath = 'img/wellezy/services';
                $file->move($destinationPath,$file->getClientOriginalName());
                $edit->image = $file->getClientOriginalName(); 
            }
            $edit->save();
        
            if ($edit) {
                $data = array('mensagge' => "Los datos fueron actualizados satisfactoriamente");
                return response()->json($data)->setStatusCode(200);
            }else{
                return response()->json("A ocurrido un error")->setStatusCode(400);
            }
        } catch (\Throwable $th) {
            return  $th;
        }
    }
    public function DeleteServices($id)
    {
        try {
            $services =  WellezyService::find($id);
            $services->delete();

            if ($services) {
                $data = array('mensagge' => "Los datos fueron eliminados satisfactoriamente");
                return response()->json($data)->setStatusCode(200);
            }else{
                return response()->json("A ocurrido un error")->setStatusCode(400);
            }
        } catch (\Throwable $th) {
            return  $th;
        }
    }
}
