<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurgeriesAdditional extends Model
{
    protected $fillable = [
        'id_surgerie', 'id_user', 'description', 'price_aditional'
    ];

    protected $table         = 'surgeries_additional';
    public    $timestamps    = false;
}
