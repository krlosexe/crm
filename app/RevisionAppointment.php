<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RevisionAppointment extends Model
{
    protected $fillable = [
        'id_revision', 'id_paciente', 'numero_contrato', 'cirugia', 'clinica'
    ];

    protected $table         = 'revision_appointment';
    public    $timestamps    = false;
    protected $primaryKey    = 'id_revision';



    public function agenda(){
      return $this->hasMany('App\AppointmentsAgenda', 'id_revision', 'id_revision');
    }



}
