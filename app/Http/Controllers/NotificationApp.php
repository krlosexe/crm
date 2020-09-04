<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class NotificationApp extends Controller
{
    public function index(){


      $ConfigNotification = [
        "tokens" => [
            "dhjvnRDHQNiIFQX0mWmmE_:APA91bEHSAjSRFWruOUXUU1XPV9vofFftrxTTvkQ2XkuJZvfr3tQ8NvVpGGjKWeNSBrgz_lRn0_4FmLu_GYmyPPvU1v2ol0hr1VMli4l-aLIIHjZDDsN2r7knC9kqQLHD9aHfSCjOxdx"
        ],

        "tittle" => "Para Leo, de Camila",
        "body"   => "Nesecito Verte, Respondeme",
        "data"   => ['type' => 'refferers']

      ];

      $code = SendNotifications($ConfigNotification);

      echo "aassa";

    }
}