<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientsTasksFollowers extends Model
{
    protected $fillable = [
        'id_task', 'id_follower'
    ];

    protected $table         = 'clients_tasks_followers';
    public    $timestamps    = false;
    protected $primaryKey    = 'id_clients_tasks_followers';
}
