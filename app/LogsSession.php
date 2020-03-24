<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogsSession extends Model
{
    protected $fillable = [
        'id_user', 'date_login'
    ];

    protected $table         = 'logs_sessions';
    public    $timestamps    = false;
    protected $primaryKey    = 'id';
}
