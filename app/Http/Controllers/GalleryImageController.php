<?php

namespace App\Http\Controllers;

use App\GalleryImage;
use App\Category;
use Illuminate\Http\Request;
use Image;
class GalleryImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = GalleryImage::select("gallery_photos.*", "category.name as name_category", "sub_category.name as name_sub_category")
                              ->join("category", "category.id", "=", "gallery_photos.id_category")
                              ->join("sub_category", "sub_category.id", "=", "gallery_photos.id_sub_category")

                              ->orderBy("gallery_photos.id", "DESC")
                              ->get();
        
        return response()->json($data)->setStatusCode(200);

    }



    public function get()
    {

        $categories = Category::get();

        $data = [];
        foreach($categories as $category){
            $data_category = [];

            $data_category["category"] = $category["name"];


            $images = GalleryImage::select("gallery_photos.*", "category.name as name_category")
                              ->join("category", "category.id", "=", "gallery_photos.id_category")
                              ->where("gallery_photos.id_category", $category["id"])
                              ->get();


            $data_category["images"]   = $images;
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
            $destinationPath = 'img/gallery';
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

        GalleryImage::create($request->all());

        $data = array('mensagge' => "Los datos fueron registrados satisfactoriamente");    
        return response()->json($data)->setStatusCode(200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GalleryImage  $galleryImage
     * @return \Illuminate\Http\Response
     */
    public function show(GalleryImage $galleryImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GalleryImage  $galleryImage
     * @return \Illuminate\Http\Response
     */
    public function edit(GalleryImage $galleryImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GalleryImage  $galleryImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $galleryImage)
    {
        if($file = $request->file('file')){
            $destinationPath = 'img/gallery';
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

        GalleryImage::find($galleryImage)->update($request->all());

        $data = array('mensagge' => "Los datos fueron actualizados satisfactoriamente");    
        return response()->json($data)->setStatusCode(200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GalleryImage  $galleryImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(GalleryImage $galleryImage)
    {
        //
    }
}
