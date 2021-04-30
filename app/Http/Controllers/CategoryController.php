<?php

namespace App\Http\Controllers;

use App\{Category,SubCategory};
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
       $data = Category::where("status", 1)->get();
       return response()->json($data)->setStatusCode(200);
    }


    public function getSubCategory($category,$state=null){

        $data = DB::table("sub_category")
        ->where("id_category", $category)
        ->when($state, function ($q) use($state)  {
            return $q->where("state",$state);
        })
        ->get();
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

    public function ListSubCategory(){
        $data = SubCategory::with("category")->get();
        return response()->json($data)->setStatusCode(200);
    }

    public function crearSubCategoria(Request $request)
    {

        try {

            $file = $request->file('img-profile');
            $destinationPath = 'img/category/picture';
            $file->move($destinationPath,$file->getClientOriginalName());
            
            $request["foto"] = $file->getClientOriginalName(); 
            
            $file_a = $request->file('img-profile-antes');
            $destinationPath = 'img/category/picture';
            $file_a->move($destinationPath,$file_a->getClientOriginalName());
            
            $request["foto_before"] = $file->getClientOriginalName(); 
        
            $file_b = $request->file('img-profile-despues');
            $destinationPath = 'img/category/picture';
            $file_b->move($destinationPath,$file_b->getClientOriginalName());
            
            $request["foto_after"] = $file->getClientOriginalName(); 
        

            $category = new SubCategory;
            $category->name = $request->name;
            $category->name_ingles = $request->name_ingles;
            $category->id_category = $request->categoria;
            $category->state = $request->use_app ? $request->use_app : 0 ;
            $category->description   = $request->comments;
            $category->foto = $request->foto;
            $category->foto_before = $request->foto_before;
            $category->foto_after = $request->foto_after;
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

    public function updateSubCategoria(Request $request,$id)
    {


        try {
           
            $file = $request->file('img-profile');
            $file_b = $request->file('img-profile-before');
            $file_a = $request->file('img-profile-after');
            
            $category =  SubCategory::find($id);

            $category->name = $request->name;
            $category->name_ingles = $request->name_ingles;
            $category->id_category = $request->categoria;
            $category->state = $request->use_app ? $request->use_app : 0 ;
            $category->description = $request->comments;

            if ($file!=null) {
                $destinationPath = 'img/category/picture';
                $file->move($destinationPath,$file->getClientOriginalName());
                $category->foto = $file->getClientOriginalName(); 
            }
            if ($file_b!=null) {
                $destinationPath = 'img/category/picture';
                $file_b->move($destinationPath,$file_b->getClientOriginalName());
                $category->foto_before = $file_b->getClientOriginalName(); 
            }
            
            if ($file_a!=null) {
                $destinationPath = 'img/category/picture';
                $file_a->move($destinationPath,$file_a->getClientOriginalName());
                $category->foto_after = $file_a->getClientOriginalName(); 
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

    public function EliminarSubCategoria($category)
    {
        try {
            $category =  SubCategory::find($category);
            $category->delete();

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




    public function GetProcedures(){

        $categories = Category::select("category.*")
                               ->with("child")
                               ->where("category.status", 1)
                                ->get();
       
        return response()->json($categories)->setStatusCode(200);
    }


}
