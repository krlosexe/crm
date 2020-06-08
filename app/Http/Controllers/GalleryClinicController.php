<?php

namespace App\Http\Controllers;

use App\GalleryClinic;
use App\Clinic;
use Illuminate\Http\Request;
use Image;
use DB;
class GalleryClinicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = GalleryClinic::select("gallery_clinic.*", "clinic.nombre as name_clinic")
                              ->join("clinic", "clinic.id_clinic", "=", "gallery_clinic.id_clinic")
                              ->orderBy("gallery_clinic.id", "DESC")
                              ->get();
        
        return response()->json($data)->setStatusCode(200);

    }



    public function get()
    {

        $categories = Category::get();

        $data = [];
        foreach($categories as $category){
            $data_category = [];

            $sub_categorias = DB::table("sub_category")->where("id_category", $category["id"])->get();
            $data_category["category"] = $category["name"];

            $sub_cates = [];
            foreach($sub_categorias as $sub_categoria){
                $data_sub_cate = [];
                $data_sub_cate["name"] = $sub_categoria->name;


                $images = GalleryClinic::select("gallery_clinic.*", "category.name as name_category")
                              ->join("category", "category.id", "=", "gallery_clinic.id_category")
                              ->where("gallery_clinic.id_category", $category["id"])
                              ->where("gallery_clinic.id_sub_category", $sub_categoria->id)
                              ->get();


                $data_sub_cate["images"] = $images;
                array_push($sub_cates, $data_sub_cate);

            }

            $data_category["sub_category"] = $sub_cates;
            array_push($data, $data_category);
           

        }
       
           
        $gallery = [
            "path" => "img/gallery",
            "gallery" => $data
        ];
      
        return response()->json($gallery)->setStatusCode(200);

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
        if($file = $request->file('file')){
            $destinationPath = 'img/gallery/clinic';
            $file->move($destinationPath,$file->getClientOriginalName());
            $request["image"] = $file->getClientOriginalName();


            $imageResize = Image::make($destinationPath."/".$request["image"]);
            $imageResize->orientate()
            ->fit(300, 300, function ($constraint) {
                $constraint->upsize();
            })
            ->save($destinationPath."/".$request["image"]."-thumbnail.png");

            $request["thumbnail"] = $request["image"]."-thumbnail.png";

        }

        GalleryClinic::create($request->all());

        $data = array('mensagge' => "Los datos fueron registrados satisfactoriamente");    
        return response()->json($data)->setStatusCode(200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GalleryClinic  $galleryClinic
     * @return \Illuminate\Http\Response
     */
    public function show($client, $limit)
    {   

        $client = DB::table("clientes")->where("id_cliente", $client)->first();
   
       $data = GalleryClinic::select("gallery_clinic.*", "clinic.nombre as name_clinic", "clinic.logo as logo_clinic")
                              ->join("clinic", "clinic.id_clinic", "=", "gallery_clinic.id_clinic")
                              ->where("gallery_clinic.id_clinic", $client->clinic)
                              ->orderBy("gallery_clinic.id", "DESC")
                              ->limit($limit)
                              ->get();
        
        $response = [
            "path_gallery" => "img/gallery/clinic/",
            "path_logo"    => "img/clinic/gallery/",
            "logo"         => $data[0]["logo_clinic"],
            "data"         => $data
        ];
        return response()->json($response)->setStatusCode(200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GalleryClinic  $galleryClinic
     * @return \Illuminate\Http\Response
     */
    public function edit(GalleryClinic $galleryClinic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GalleryClinic  $galleryClinic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $galleryClinic)
    {
        if($file = $request->file('file')){
            $destinationPath = 'img/gallery/clinic';
            $file->move($destinationPath,$file->getClientOriginalName());
            $request["image"] = $file->getClientOriginalName();


            $imageResize = Image::make($destinationPath."/".$request["image"]);
            $imageResize->orientate()
            ->fit(300, 300, function ($constraint) {
                $constraint->upsize();
            })
            ->save($destinationPath."/".$request["image"]."-thumbnail.png");

            $request["thumbnail"] = $request["image"]."-thumbnail.png";

        }

        GalleryClinic::find($galleryClinic)->update($request->all());

        $data = array('mensagge' => "Los datos fueron actualizados satisfactoriamente");    
        return response()->json($data)->setStatusCode(200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GalleryClinic  $galleryClinic
     * @return \Illuminate\Http\Response
     */
    public function destroy(GalleryClinic $galleryClinic)
    {
        //
    }
}
