<?php

namespace App\Http\Controllers;

use App\Products;
use App\Auditoria;
use App\Car;

use DB;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::select("products.*", "auditoria.*", "user_registro.email as email_regis")
                            ->join("auditoria", "auditoria.cod_reg", "=", "products.id")
                            ->join("users as user_registro", "user_registro.id", "=", "auditoria.usr_regins")
                            ->where("auditoria.tabla", "products")
                            ->where("auditoria.status", "!=", "0")
                            ->with("categories")
                            ->orderBy("products.id", "DESC")
                            ->get();
        
        //foreach($products as $value){
            //$existence = $this->GetExistence($value["id"]);

           // $value["existence"] = $existence;
       // }
        return response()->json($products)->setStatusCode(200);
    }


    public function Paginates($category = null)
    {
        $products = Products::select("products.*", "auditoria.*", "user_registro.email as email_regis")
                            ->join("auditoria", "auditoria.cod_reg", "=", "products.id")
                            ->join("users as user_registro", "user_registro.id", "=", "auditoria.usr_regins")
                            ->where("auditoria.tabla", "products")
                            ->where("auditoria.status", "!=", "0")
                            ->where("products.available_store", "1")
                            ->join('products_categories', 'products_categories.id_product', '=', 'products.id', 'left')

                            ->where(function ($query) use ($category) {
                                if($category != null){
                                    $query->where("products_categories.id_category", $category);
                                }
                            })

                            ->orderBy("products.id", "DESC")
                            ->groupBy("products.id")
                            ->paginate(10);
        
        //foreach($products as $value){
            //$existence = $this->GetExistence($value["id"]);

           // $value["existence"] = $existence;
       // }
        return response()->json($products)->setStatusCode(200);
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
        
        $products = Products::create($request->all());

        $auditoria              = new Auditoria;
        $auditoria->tabla       = "products";
        $auditoria->cod_reg     = $products->id;
        $auditoria->status      = 1;
        $auditoria->fec_regins  = date("Y-m-d H:i:s");
        $auditoria->usr_regins  = $request["id_user"];
        $auditoria->save();

        if ($products) {
            $data = array('mensagge' => "Los datos fueron registrados satisfactoriamente", "data" => $products);    
            return response()->json($data)->setStatusCode(200);
        }else{
            return response()->json("A ocurrido un error")->setStatusCode(400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show($products)
    {
        $products = Products::select("products.*", "auditoria.*", "user_registro.email as email_regis")
                            ->join("auditoria", "auditoria.cod_reg", "=", "products.id")
                            ->join("users as user_registro", "user_registro.id", "=", "auditoria.usr_regins")
                            ->where("auditoria.tabla", "products")
                            ->where("products.id", $products)
                            ->where("auditoria.status", "!=", "0")
                            ->orderBy("products.id", "DESC")
                            ->first();
        return response()->json($products)->setStatusCode(200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $products)
    {
        DB::table("products_categories")->where("id_product", $products)->delete();

        foreach($request["categorie"] as $value){
            $insert["id_category"] = $value;
            $insert["id_product"]  = $products;
            DB::table("products_categories")->insert($insert);
        }

        $request["available_store"] == 1 ? $request["available_store"] = 1 : $request["available_store"] = 0;


        if($file = $request->file('img-photo')){
            $destinationPath = 'img/products/';
            $file->move($destinationPath,$file->getClientOriginalName());
            $request["photo"] = "https://pdtclientsolutions.com/crm-public/img/products/".$file->getClientOriginalName();
        }
        



        

        $update_product = Products::find($products)->update($request->all());

        if ($update_product) {
            $data = array('mensagge' => "Los datos fueron registrados satisfactoriamente");    
            return response()->json($data)->setStatusCode(200);
        }else{
            return response()->json("A ocurrido un error")->setStatusCode(400);
        }
    }




    public function GetExistence($id_product){
 

        $entry_medellin = DB::table("product_entry_items")
                            ->selectRaw("product_entry_items.id_product, products.description, (SUM(product_entry_items.qty))  as total")
                            ->join("products_entry", "products_entry.id", "product_entry_items.id_entry")
                            ->join("products", "products.id", "product_entry_items.id_product")
                            ->where("products_entry.warehouse", "Medellin")
                            ->where("products.id", $id_product)
                            ->groupBy("product_entry_items.id_product")
                            ->first();

        $output_medellin = DB::table("product_output_items")
                            ->selectRaw("product_output_items.id_product, products.description, (SUM(product_output_items.qty))  as total")
                            ->join("product_output", "product_output.id", "product_output_items.id_output")
                            ->join("products", "products.id", "product_output_items.id_product")
                            ->where("product_output.warehouse", "Medellin")
                            ->where("products.id", $id_product)
                            ->groupBy("product_output_items.id_product")
                            ->first();




        $entry_bogota = DB::table("product_entry_items")
                            ->selectRaw("product_entry_items.id_product, products.description, (SUM(product_entry_items.qty))  as total")
                            ->join("products_entry", "products_entry.id", "product_entry_items.id_entry")
                            ->join("products", "products.id", "product_entry_items.id_product")
                            ->where("products_entry.warehouse", "Bogota")
                            ->where("products.id", $id_product)
                            ->groupBy("product_entry_items.id_product")
                            ->first();

        $output_bogota = DB::table("product_output_items")
                            ->selectRaw("product_output_items.id_product, products.description, (SUM(product_output_items.qty))  as total")
                            ->join("product_output", "product_output.id", "product_output_items.id_output")
                            ->join("products", "products.id", "product_output_items.id_product")
                            ->where("product_output.warehouse", "Bogota")
                            ->where("products.id", $id_product)
                            ->groupBy("product_output_items.id_product")
                            ->first();


        $data_medellin = [];
        if($entry_medellin){
            $total_output_medellin = 0;
            if($output_medellin){
                $total_output_medellin = $output_medellin->total;
            }

            $data_medellin["medellin"]["total"] = $entry_medellin->total - $total_output_medellin;
        }else{
            $data_medellin["medellin"]["total"] = 0;
        }




        if($entry_bogota){

            $total_output_bogota = 0;
            if($output_bogota){
                $total_output_bogota = $output_bogota->total;
            }

            $data_medellin["bogota"]["total"] = $entry_bogota->total - $total_output_bogota;
        }else{
            $data_medellin["bogota"]["total"] = 0;
        }

        return $data_medellin;
       
    }



    public function GetExistenceWarehouse($warehouse){

        $entry = DB::table("product_entry_items")
                    ->selectRaw("product_entry_items.id_product, products.description, (SUM(product_entry_items.qty))  as total, products.presentation, products.price_cop, products.price_distributor_x_caja, products.price_distributor_x_vial, products.price_cliente_x_caja, products.price_cliente_x_vial")
                    ->join("products_entry", "products_entry.id", "product_entry_items.id_entry")
                    ->join("products", "products.id", "product_entry_items.id_product")
                    ->where("products_entry.warehouse", $warehouse)
                    ->groupBy("product_entry_items.id_product")
                    ->get();


        $output = DB::table("product_output_items")
                    ->selectRaw("product_output_items.id_product, products.description, (SUM(product_output_items.qty))  as total, products.presentation, products.price_cop, products.price_distributor_x_caja, products.price_distributor_x_vial, products.price_cliente_x_caja, products.price_cliente_x_vial")
                    ->join("product_output", "product_output.id", "product_output_items.id_output")
                    ->join("products", "products.id", "product_output_items.id_product")
                    ->where("product_output.warehouse", $warehouse)
                    ->groupBy("product_output_items.id_product")
                    ->get();

        foreach($entry as $value){
            foreach($output as $out){
                if($value->id_product == $out->id_product){
                    $value->total = $value->total - $out->total;
                }else{
                    $value->total = (int)$value->total;
                }
            }
        }  
        
        
        return response()->json($entry)->setStatusCode(200);
    }



    


    public function status($id, $status, Request $request)
    {
      
        $auditoria =  Auditoria::where("cod_reg", $id)
                                    ->where("tabla", "products")->first();

        $auditoria->status = $status;

        if($status == 0){
            $auditoria->usr_regmod = $request["id_user"];
            $auditoria->fec_regmod = date("Y-m-d");
        }
        $auditoria->save();

        $data = array('mensagge' => "Los datos fueron actualizados satisfactoriamente");    
        return response()->json($data)->setStatusCode(200);
    
    }



    public function addCar(Request $request){
        Car::updateOrCreate(
            ["id_client" => $request["id_client"],"id_product" => $request["id_product"]],
            ["qty"   => $request["qty"]]
        );
        $data = array('mensagge' => "Los datos fueron actualizados satisfactoriamente");  
        return response()->json($data)->setStatusCode(200);
    }


    public function getCar($id){
        $data = DB::table("car")
                    ->selectRaw("car.*, products.description,  products.price_cop, products.photo, products.presentation")
                    ->join("products", "products.id", "=", "car.id_product")
                    ->where("car.id_client", $id)->get();

        $total_car = 0;
        foreach($data as $value){
        
            $total_car = $total_car + ($value->qty * $value->price_cop);
        }
        $response = [
            "data"  => $data,
            "total" => number_format($total_car, 2, ',', '.'),
            "total_pay" => $total_car
        ];
        return response()->json($response)->setStatusCode(200);
    }


    public function DeleteCar($id){
        $data = DB::table("car")->where("id", $id)->delete();
        return response()->json("Ok")->setStatusCode(200);
    }



    public function DeleteCarAll($id){
        $data = DB::table("car")->where("id_client", $id)->delete();
        return response()->json("Ok")->setStatusCode(200);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $products)
    {
        //
    }
}
