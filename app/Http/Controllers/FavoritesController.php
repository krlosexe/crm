<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getClient($id_client)
    {
        $data = DB::table("products_favorites")
                        ->selectRaw("products_favorites.*, products.description name_product, products.photo, products.price_cop")
                        ->join("products", "products.id", "=", "products_favorites.id_product")
                        ->where("products_favorites.id_client", $id_client)
                        ->get();
        return response()->json($data)->setStatusCode(200);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table("products_favorites")->insert($request->all());
        return response()->json("Exito")->setStatusCode(200);
    }


    public function Delete($id)
    {
        DB::table("products_favorites")->where("id", $id)->delete();
        return response()->json("Exito")->setStatusCode(200);
    }
}
