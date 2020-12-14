<?php

namespace App\Http\Controllers;

use App\Category;
use DB;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data = Category::get();
       return response()->json($data)->setStatusCode(200);
    }


    public function getSubCategory($category){

        $data = DB::table("sub_category")->where("id_category", $category)->get();
        return response()->json($data)->setStatusCode(200);
    }   


    public function getSubCategoryAll(){
        $data = DB::table("sub_category")->get();
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
        try {
            $file = $request->file('img-profile');
            $destinationPath = 'img/category/picture';
            $file->move($destinationPath,$file->getClientOriginalName());
            
            $request["foto"] = $file->getClientOriginalName(); 
        
            $category = new Category;
            $category->name = $request->name;
            $category->name_ingles = $request->name_ingles;
            $category->foto = $request->foto;
            $category->save();
        
            if ($category) {
                $data = array('mensagge' => "Los datos fueron registrados satisfactoriamente");
                return response()->json($data)->setStatusCode(200);
            }else{
                return response()->json("A ocurrido un error")->setStatusCode(400);
            }
        } catch (\Throwable $th) {
            return $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$category)
    {

        try {
           
            $file = $request->file('img-profile');
            
            $category =  Category::find($category);
            $category->name = $request->name;
            $category->name_ingles = $request->name_ingles;

            if ($file!=null) {
                $destinationPath = 'img/category/picture';
                $file->move($destinationPath,$file->getClientOriginalName());
                $category->foto = $file->getClientOriginalName(); 
            }
            $category->save();
        
            if ($category) {
                $data = array('mensagge' => "Los datos fueron actualizados satisfactoriamente");
                return response()->json($data)->setStatusCode(200);
            }else{
                return response()->json("A ocurrido un error")->setStatusCode(400);
            }

        } catch (\Throwable $th) {
            return $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        try {
            $category =  Category::find($category);
            $category->delete();
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
