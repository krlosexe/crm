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

    public function comments(){
        return $this->hasMany('App\Comments', 'id_event', 'id_revision')
                    ->where("comments.table", "revision_appointment")
                    ->select(array('comments.*'));
    }





}
