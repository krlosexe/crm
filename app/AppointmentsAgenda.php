<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppointmentsAgenda extends Model
{
    protected $table   = 'appointments_agenda';
    public $timestamps = false;


    public function agenda(){
        return $this->hasMany('App\AppointmentsAgenda', 'id_revision', 'id_revision');
    }



}
