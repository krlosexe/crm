<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{   

    protected $fillable = [
        'nombres', 'apellidos', 'identificacion', 'telefono', 'email', 'direccion','facebook','instagram','twitter','youtube', 'photos_google',
        'fecha_nacimiento', 'identificacion_verify', 'city', 'clinic', 'id_line', 
        'id_user_asesora', 'id_affiliate', 'id_asesora_valoracion', 'state', 'origen', 'forma_pago', 'pay_to_study_credit','pauta', 'code_client',  'prp', 'created_prp','to_db', 'auth_app'
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



    public function comments(){
        return $this->hasMany('App\Comments', 'id_event')
                    ->join('users', 'users.id', '=', 'comments.id_user')  
                    ->join('datos_personales', 'datos_personales.id_usuario', '=', 'comments.id_user')     
                    ->where("comments.table", "clients")
                    ->select(array('comments.*', 'users.email', 'users.img_profile', "datos_personales.nombres as name_user", 
                    "datos_personales.apellido_p as last_name_user"));
    }




    public function phones(){
        return $this->hasMany('App\ClientPhone', 'id_cliente');
    }


    public function emails(){
        return $this->hasMany('App\ClientEmailAditional', 'id_cliente');
    }



    public function procedures(){
        
        return $this->hasMany('App\ClientsProcedure', 'id_client')
                    ->join('sub_category', 'sub_category.id', '=', 'clients_procedures.id_sub_category')  
                    ->select(array('clients_procedures.*', 'sub_category.name'));
        
    }



    public function tasks(){
        
        return $this->hasMany('App\ClientsTasks', 'id_client');
        
    }






}
