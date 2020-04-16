<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Valuations extends Model
{
    protected $fillable = [
        'id_cliente', 'clinic','surgeon','id_asesora_valoracion', 'fecha', 'time', 'time_end', 'type','observaciones', 'cotizacion', 'code','status'
    ];

    protected $table         = 'valuations';
    public    $timestamps    = false;
    protected $primaryKey    = 'id_valuations';


    public function comments(){
        return $this->hasMany('App\Comments', 'id_event')
                    ->join('users', 'users.id', '=', 'comments.id_user')  
                    ->join('datos_personales', 'datos_personales.id_usuario', '=', 'comments.id_user')     
                    ->where("comments.table", "valuations")
                    ->select(array('comments.*', 'users.email', 'users.img_profile', "datos_personales.nombres as name_user", 
                    "datos_personales.apellido_p as last_name_user"));
    }


    public function photos(){
        return $this->hasMany('App\ValuationsPhoto', 'code', 'code');
    }



    public function followers(){
        return $this->hasMany('App\FollwersEvents', 'id_event')
                    ->join('users', 'users.id', '=', 'followers_events.id_user')  
                    ->join('datos_personales', 'datos_personales.id_usuario', '=', 'followers_events.id_user')     
                    ->where("followers_events.tabla", "valuations")
                    ->select(array('followers_events.*', 'users.img_profile', "datos_personales.nombres as name_user", 
                    "datos_personales.apellido_p as last_name_user"));
    }


    
}
