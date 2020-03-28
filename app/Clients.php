<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{   

    protected $fillable = [
        'nombres', 'apellidos', 'identificacion', 'telefono', 'email', 'direccion',
        'fecha_nacimiento', 'identificacion_verify', 'city', 'clinic', 'id_line', 
        'id_user_asesora', 'id_asesora_valoracion', 'state', 'origen', 'forma_pago', 'pauta', 'code'
    ];


    protected $table         = 'clientes';
    public    $timestamps    = false;
    protected $primaryKey    = 'id_cliente';



    public function logs(){
        return $this->hasMany('App\LogsClients', 'id_client')
                    ->join('users', 'users.id', '=', 'logs_client.id_user')  
                    ->join('datos_personales', 'datos_personales.id_usuario', '=', 'logs_client.id_user') 
                    ->select(array('logs_client.*', 'users.email', 'users.img_profile', "datos_personales.nombres as name_user", 
                       "datos_personales.apellido_p as last_name_user"));   
    }



}
