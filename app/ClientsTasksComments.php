<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientsTasksComments extends Model
{
    protected $fillable = [
        'id_task','id_user', 'comments'
    ];

    protected $table         = 'clients_tasks_comments';
    public    $timestamps    = false;
    protected $primaryKey    = 'id_clients_tasks_comments';
}
