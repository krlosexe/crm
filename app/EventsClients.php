<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventsClients extends Model
{
    protected $fillable = [
        'event', 'id_client', 'id_event', 'create_at'
    ];

    public $timestamps    = true;
    protected $table      = 'events_client';
    protected $primaryKey = 'id';
}
