<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WhatsAppController extends Controller
{
    public function StoreClient(){
        return response()->json([1,2,3])->setStatusCode(404);
    }
}
