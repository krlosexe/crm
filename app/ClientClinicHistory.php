<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientClinicHistory extends Model
{
    protected $fillable = [
        'id_client', 'eps', 'height', 'weight', 'children', 'number_children', 'alcohol', 'smoke', 'surgery', 'previous_surgery', 'disease', 'major_disease', 'medication', 'drink_medication', 'allergic', 'allergic_medication'
    ];


    protected $table         = 'client_clinic_history';
    public    $timestamps    = false;
    protected $primaryKey    = 'id_client';
}
