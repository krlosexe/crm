<?php

namespace App\Http\Controllers;

use App\Venues;
use Illuminate\Http\Request;

class VenuesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Venues::with("galeria")
                        ->with("horario")
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
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Venues  $venues
     * @return \Illuminate\Http\Response
     */
    public function show(Venues $venues)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Venues  $venues
     * @return \Illuminate\Http\Response
     */
    public function edit(Venues $venues)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Venues  $venues
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venues $venues)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Venues  $venues
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venues $venues)
    {
        //
    }
}
