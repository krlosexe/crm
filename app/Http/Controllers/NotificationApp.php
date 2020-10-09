<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class NotificationApp extends Controller
{
    public function index(){


      $ConfigNotification = [
        "tokens" => [
            "efIvCVVqQJePFigMkveF3N:APA91bGMhunmS19JIWEZzoT3jTPARyk1lNWRVmjOZXHxPHE9SlXtu42YVu7h8LKCAhQYHkV9txvqUclyNTRuiOPw-77eilj5GpY30YdxxyZm-VTpR-GjOXn7_1FJGA6hnTRJFYSHIIj0"
        ],

        "tittle" => "Para Leo, de Camila",
        "body"   => "Nesecito Verte, Respondeme",
        "data"   => ['type' => 'refferers']

      ];

      $code = SendNotifications($ConfigNotification);

      echo "aassa";

    }
}