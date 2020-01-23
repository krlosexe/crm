<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TasksFollowers extends Model
{
    protected $fillable = [
        'id_task', 'id_follower'
    ];

    protected $table         = 'tasks_followers';
    public    $timestamps    = false;
    protected $primaryKey    = 'id_tasks_followers';

    
}
