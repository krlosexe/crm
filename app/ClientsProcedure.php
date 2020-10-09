<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientsProcedure extends Model
{
    protected $fillable = [
        'id_client', 'id_sub_category'
    ];


    public    $timestamps    = false;
    protected $table = 'clients_procedures';
}
