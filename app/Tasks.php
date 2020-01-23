<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    protected $fillable = [
        'responsable', 'issue', 'fecha', 'time', 'status_task', 'observaciones'
    ];

    protected $table         = 'tasks';
    public    $timestamps    = false;
    protected $primaryKey    = 'id_tasks';

    public function followers(){
        return $this->hasMany('App\TasksFollowers', 'id_task')
                       ->join('users', 'users.id', '=', 'tasks_followers.id_follower') 
                       ->join('datos_personales', 'datos_personales.id_usuario', '=', 'tasks_followers.id_follower') 
                       ->select(array('tasks_followers.*', 'users.email', 'users.img_profile', "datos_personales.nombres as name_follower", 
                       "datos_personales.apellido_p as last_name_follower"));
    }



}
