<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientPhone extends Model
{
    protected $fillable = [
        'id_cliente',  'phone'
    ];

    protected $table         = 'clients_phone_aditional';
    public    $timestamps    = false;
    protected $primaryKey    = 'id';
}
