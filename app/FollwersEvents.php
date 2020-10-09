<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FollwersEvents extends Model
{
    protected $fillable = [
        'id_event', 'id_user', 'tabla'
    ];

    public $timestamps    = false;
    protected $table      = 'followers_events';
    protected $primaryKey = 'id';
}
