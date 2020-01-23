<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preanesthesia extends Model
{
    protected $fillable = [
        'id_cliente', 'fecha', 'time', 'time_end','surgeon', 'operating_room', 'clinic','observaciones', 'status_surgeries'
    ];

    protected $table         = 'preanesthesias';
    public    $timestamps    = false;
    protected $primaryKey    = 'id_preanesthesias';
}
