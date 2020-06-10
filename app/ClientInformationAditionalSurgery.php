<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientInformationAditionalSurgery extends Model
{
    protected $fillable = [
        'id_client', 'name_surgery', 'current_size', 'desired_size', 'implant_volumem', 'id_category', 'id_sub_category'
    ];


    protected $table         = 'client_information_aditional_surgery';
    public    $timestamps    = false;
    protected $primaryKey    = 'id_client';
}