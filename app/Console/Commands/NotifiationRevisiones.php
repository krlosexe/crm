<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
class NotifiationRevisiones extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'registered:NotificationRevisiones';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Job para notificar Revisiones';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->line("Some text");
        $today    = date("Y-m-d");
        $tomorrow = date("Y-m-d",strtotime($today."+ 1 days"));

        $this->line("HOY");
        
        $data_today    = DB::table("appointments_agenda")->where("fecha", $today)
                            ->join("revision_appointment", "revision_appointment.id_revision", "=", "appointments_agenda.id_revision")
                            ->join("clientes", "clientes.id_cliente", "=", "revision_appointment.id_paciente")
                            ->get();
        $data_tomorrow = DB::table("appointments_agenda")->where("fecha", $tomorrow)
                            ->join("revision_appointment", "revision_appointment.id_revision", "=", "appointments_agenda.id_revision")
                            ->join("clientes", "clientes.id_cliente", "=", "revision_appointment.id_paciente")
                            ->get();

        foreach($data_today as $value){
            if($value->fcmToken){
                $this->line($value->fcmToken);
                switch ($value->id_line) {
                    case 17:
                       $apiKey = "AAAAg-p1HsU:APA91bHJHYE__7tBgvxXHPbMwR2cm7-KyYOknyMz7fAfBYm34YrFMF9QK4FieAEPL54o7EPXilihGevzxoBSf3X4CCHAswTk9NctvFTYY1ftYTYI5hj_-qXVFtCizHHzM060Ojphq62q";
                        break;
                    default:
                        $apiKey = 'AAAA3cdYfsY:APA91bF1mZUGbz72Z-qZhvT4ZFTwj6IUxAIZn9cchDvBxtmj47oRX6JKK8u8-thLD94GBUiRRGJqVndybDASTjHLwiRTkQlqyYqyCf4Oqt3nTqdeyh246t5KSXcPWUvY9fSp1bbOrg_L';
                        break;
                }

                $FCM_token = $value->fcmToken;
                $url = "https://fcm.googleapis.com/fcm/send";
                $token = $FCM_token;
                $serverKey = $apiKey;
                $title = "Recordatorio Cita de Revisión";
                $body = "Tienes una cita de Revision para el dia de Hoy: ".$value->fecha;
                $notification = array('title' =>$title , 'body' => $body, 'sound' => 'default', 'badge' => '1');
                $arrayToSend = array('to' => $token, 'notification' => $notification,'priority'=>'high');
                $json = json_encode($arrayToSend);
                $headers = array();
                $headers[] = 'Content-Type: application/json';
                $headers[] = 'Authorization: key='. $serverKey;
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
                curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
                curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                //Send the request
                $response = curl_exec($ch);
                //Close request
                if ($response === FALSE) {
                    die('FCM Send Error: ' . curl_error($ch));
                }
                curl_close($ch);
            }
        }


        $this->line("MAÑANA");
        foreach($data_tomorrow as $value){
            if($value->fcmToken){
                $this->line($value->fcmToken);
                switch ($value->id_line) {
                    case 17:
                       $apiKey = "AAAAg-p1HsU:APA91bHJHYE__7tBgvxXHPbMwR2cm7-KyYOknyMz7fAfBYm34YrFMF9QK4FieAEPL54o7EPXilihGevzxoBSf3X4CCHAswTk9NctvFTYY1ftYTYI5hj_-qXVFtCizHHzM060Ojphq62q";
                        break;
                    default:
                        $apiKey = 'AAAA3cdYfsY:APA91bF1mZUGbz72Z-qZhvT4ZFTwj6IUxAIZn9cchDvBxtmj47oRX6JKK8u8-thLD94GBUiRRGJqVndybDASTjHLwiRTkQlqyYqyCf4Oqt3nTqdeyh246t5KSXcPWUvY9fSp1bbOrg_L';
                        break;
                }

                $FCM_token = $value->fcmToken;
                $url = "https://fcm.googleapis.com/fcm/send";
                $token = $FCM_token;
                $serverKey = $apiKey;
                $title = "Recordatorio Cita de Revisión";
                $body = "Tienes una cita de Revision para el dia de Mañana: ".$value->fecha;
                $notification = array('title' =>$title , 'body' => $body, 'sound' => 'default', 'badge' => '1');
                $arrayToSend = array('to' => $token, 'notification' => $notification,'priority'=>'high');
                $json = json_encode($arrayToSend);
                $headers = array();
                $headers[] = 'Content-Type: application/json';
                $headers[] = 'Authorization: key='. $serverKey;
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
                curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
                curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                //Send the request
                $response = curl_exec($ch);
                //Close request
                if ($response === FALSE) {
                    die('FCM Send Error: ' . curl_error($ch));
                }
                curl_close($ch);
                
            }
        }
    }
}
