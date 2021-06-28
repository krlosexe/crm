<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venues extends Model
{
    protected $fillable = [
        'name', 'about', 'address', 'phone', 'images', 'latitud', 'longitud'
    ];

    protected $table = 'venues';

    public function galeria(){
        return $this->hasMany('App\VenuesGalerry', 'id_venues');
    }


    public function horario(){
        return $this->hasMany('App\VenuesSchedule', 'id_venues');
    }
}
