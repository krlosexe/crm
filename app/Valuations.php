<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Valuations extends Model
{
    protected $fillable = [
        'id_cliente', 'fecha', 'time','observaciones', 'status'
    ];

    protected $table         = 'valuations';
    public    $timestamps    = false;
    protected $primaryKey    = 'id_valuations';
}
