<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class NotificationApp extends Controller
{
    public function index(){


      $ConfigNotification = [
        "tokens" => [
            "fRKK6URySv-gpuAT4xmQvc:APA91bEZU4ewWcK8SB7ZfONszCZM1A6ODlQoJ5zFFlCOwaEIldyjUUlnS6UuOSdT1y2DgM9T7fPUdXxQ1vpDmPOGz5DvKnscC8g046WxRxQy2WMwwxLDKRpRSar4rdy1FaoQH0qu7TyT"
        ],

        "tittle" => "Para Leo, de Camila",
        "body"   => "Nesecito Verte, Respondeme",
        "data"   => ['type' => 'refferers']

      ];

      $code = SendNotifications($ConfigNotification);

      echo "aassa";

    }
}
