<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Valuations extends Model
{
    protected $fillable = [
        'id_cliente', 'id_asesora_valoracion', 'fecha', 'time', 'time_end', 'type','observaciones', 'cotizacion', 'status'
    ];

    protected $table         = 'valuations';
    public    $timestamps    = false;
    protected $primaryKey    = 'id_valuations';
}
