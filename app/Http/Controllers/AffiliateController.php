<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clients;
class AffiliateController extends Controller
{
    public function qty($id_affiliate){
        
        $data = Clients::where("id_affiliate", $id_affiliate)
                        ->get();

        return response()->json(sizeof($data))->setStatusCode(200);
    }
}
