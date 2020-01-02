<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Surgeries extends Model
{
    protected $fillable = [
        'id_cliente', 'fecha', 'time', 'surgeon', 'operating_room', 'clinic','observaciones', 'status_surgeries'
    ];

    protected $table         = 'surgeries';
    public    $timestamps    = false;
    protected $primaryKey    = 'id_surgeries';
}
