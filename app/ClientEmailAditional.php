<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientEmailAditional extends Model
{
    protected $fillable = [
        'id_cliente',  'email'
    ];

    protected $table         = 'clients_email_aditional';
    public    $timestamps    = false;
    protected $primaryKey    = 'id';
}
