<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientsTasks extends Model
{
    protected $fillable = [
        'id_client', 'responsable', 'issue', 'fecha', 'time', 'status_task'
    ];

    protected $table         = 'clients_tasks';
    public    $timestamps    = false;
    protected $primaryKey    = 'id_clients_tasks';


    public function followers(){
        return $this->hasMany('App\ClientsTasksFollowers', 'id_task')
                       ->join('users', 'users.id', '=', 'clients_tasks_followers.id_follower') 
                       ->join('datos_personales', 'datos_personales.id_usuario', '=', 'clients_tasks_followers.id_follower') 
                       ->select(array('clients_tasks_followers.*', 'users.email', 'users.img_profile', "datos_personales.nombres as name_follower", 
                       "datos_personales.apellido_p as last_name_follower"));
    }


    public function comments(){
        return $this->hasMany('App\ClientsTasksComments', 'id_task')
                    ->join('users', 'users.id', '=', 'clients_tasks_comments.id_user')  
                    ->join('datos_personales', 'datos_personales.id_usuario', '=', 'clients_tasks_comments.id_user') 
                    ->select(array('clients_tasks_comments.*', 'users.email', 'users.img_profile', "datos_personales.nombres as name_user", 
                       "datos_personales.apellido_p as last_name_user"));   
    }





}
