<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LogsPhone;

class LogsPhoneController extends Controller
{
    public function LogsPhone (Request $request)
    {
        try {
            LogsPhone::updateOrCreate(
                
                ["name_app" => $request->name_app],
                ["name_file" => $request->name_file],
                ["id_user" => $request->id_user],

                ["content" => $request->content]
            );
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
