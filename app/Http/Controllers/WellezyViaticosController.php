<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WellezyViatico;

class WellezyViaticosController extends Controller
{
    public function ListViaticos()
    {
        try {
            
            $list = WellezyViatico::with('services')->get();
            return response()->json($list)->setStatusCode(200);

        } catch (\Throwable $th) {
            return  $th;
        }
    }
    public function CreateViaticos(Request $request)
    {
        try {
            $file = $request->file('img-profile-one');
            $destinationPath = 'img/wellezy/viaticos';
            $file->move($destinationPath,$file->getClientOriginalName());
            
            $request["image"] = $file->getClientOriginalName(); 

            $create = new WellezyViatico;
            $create->id_services = $request->services;
            $create->title = $request->title;
            $create->description = $request->comments;
            $create->image = $request->image;
            $create->costo = $request->costo;
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
    public function UpdateViaticos(Request $request, $id)
    {
        try {

            
            $file = $request->file('img-profile-one');
                
            $edit =  WellezyViatico::find($id);
            $edit->id_services = $request->services;
            $edit->title = $request->title;
            $edit->description = $request->comments;
            if ($file!=null) {
                $destinationPath = 'img/wellezy/viaticos';
                $file->move($destinationPath,$file->getClientOriginalName());
                $edit->image = $file->getClientOriginalName(); 
            }
            $edit->costo = $request->costo;
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
    public function DeleteViaticos($id)
    {
        try {
            $viaticos =  WellezyViatico::find($id);
            $viaticos->delete();

            if ($viaticos) {
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
