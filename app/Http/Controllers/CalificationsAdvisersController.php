<?php

namespace App\Http\Controllers;

use App\CalificationsAdvisers;
use Illuminate\Http\Request;

class CalificationsAdvisersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = CalificationsAdvisers::selectRaw("califications_advisers.*, CONCAT(datos_personales.nombres, ' ', datos_personales.apellido_p) as name_adviser")
                                        ->join("users", "users.id", "=", "califications_advisers.id_user")
                                        ->join("datos_personales", "datos_personales.id_usuario", "=", "users.id")
                                        ->orderBy("califications_advisers.id", "DESC")
                                        ->get();
        return response()->json($data)->setStatusCode(200);
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


        if($file = $request->file('evidence_file')){
            $destinationPath = 'img/califications';
            $file->move($destinationPath,$file->getClientOriginalName());
            $request["evidence"] = $file->getClientOriginalName();
        }



        $store = CalificationsAdvisers::create($request->all());

        if ($store) {
            $data = array('mensagge' => "Los datos fueron registrados satisfactoriamente");    
            return response()->json($data)->setStatusCode(200);
        }else{
            return response()->json("A ocurrido un error")->setStatusCode(400);
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CalificationsAdvisers  $calificationsAdvisers
     * @return \Illuminate\Http\Response
     */
    public function show(CalificationsAdvisers $calificationsAdvisers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CalificationsAdvisers  $calificationsAdvisers
     * @return \Illuminate\Http\Response
     */
    public function edit(CalificationsAdvisers $calificationsAdvisers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CalificationsAdvisers  $calificationsAdvisers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $calificationsAdvisers)
    {


        if($file = $request->file('evidence_file')){
            $destinationPath = 'img/califications';
            $file->move($destinationPath,$file->getClientOriginalName());
            $request["evidence"] = $file->getClientOriginalName();
        }


        $update = CalificationsAdvisers::find($calificationsAdvisers)->update($request->all());

        if ($update) {
            $data = array('mensagge' => "Los datos fueron actualizados satisfactoriamente");    
            return response()->json($data)->setStatusCode(200);
        }else{
            return response()->json("A ocurrido un error")->setStatusCode(400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CalificationsAdvisers  $calificationsAdvisers
     * @return \Illuminate\Http\Response
     */
    public function destroy(CalificationsAdvisers $calificationsAdvisers)
    {
        //
    }
}
