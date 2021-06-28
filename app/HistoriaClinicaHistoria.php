<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoriaClinicaHistoria extends Model
{
   protected $fillable = ['his_motivo','his_enfermedades','his_patologicos','his_procedimientos','his_quirurgicos','his_hospitalarios','his_farmacologicos','his_alergicos','his_toxicos',
   'his_transfuncionales','his_habitos','his_familiares','his_escleroterapia','his_planificacion','his_factores','his_otros','his_gestaciones','his_partos','his_cesareas','his_abortos',
   'his_ectopicos','his_fmestruacion','his_ciclos','his_metodos','his_cardiobasculas','his_digestivo','his_genitourinario','his_neurologico','his_ocular','his_osteomuscular','his_respiratorio',
   'his_abdomen','his_boca','his_cabeza','his_cara','his_general','his_nariz','his_exameneurologico','his_oidos','his_ojos','his_piel','his_musculoesqueletico','his_periferico','his_torax',
   'his_nombreservi','his_diagnosticoser','his_origenser','his_resultadoser','id_client'

    ];



    protected $table = 'history_cliente_historia';



    public function consultas(){
        return $this->hasMany('App\HistoriaClinicaCunsultas', 'id_history_cliente_historia');
    }
    public function medicamentos(){
        return $this->hasMany('App\HistoriaClinicaMedicamentos', 'id_history_cliente_historia');
    }
    public function servicios(){
        return $this->hasMany('App\HistoriaClinicaServicios', 'id_history_cliente_historia');
    }
    public function Remision(){
        return $this->hasMany('App\HistoriaClinicaRemision', 'id_history_cliente_historia');
    }
    public function incapacidad(){
        return $this->hasMany('App\HistoriaClinicaIncapacidad', 'id_history_cliente_historia');
    }
    
    

}
