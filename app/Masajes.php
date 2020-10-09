<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Masajes extends Model
{
    protected $fillable = [
        'id_cliente', 'fecha', 'time', 'clinic','status_surgeries'
    ];

    protected $table         = 'masajes';
    public    $timestamps    = false;
    protected $primaryKey    = 'id_masajes';
}
