<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistrosAnestesicos extends Model
{
   protected $fillable = ['ane_anestesiologo','ane_anestesiologo2','ane_cirujano','ane_cirujano2','ane_instrumentador','ane_auxiliar','ane_principal','ane_diagnostico',
   'ane_premedicacion_id','ane_monitoria_id','ane_ayuno','ane_deficit','ane_mantenimiento','ane_volemia','ane_pps','ane_anesteciatec','ane_aguja','ane_cateter','ane_puncion',
   'ane_antiseptico','ane_bloqueo','ane_metodo','ane_neumo','ane_numeroneumo','ane_tubo','ane_numerotubo','ane_intraoperatorio_id','ane_fechatoma','ane_ph','ane_pco2','ane_pao2',
   'ane_hco2','ane_sat','ane_be','ane_lact','ane_defict','ane_perdidas','ane_diueresis','ane_sangrado','ane_otroseliminados','ane_totaleliminados','ane_ringer','ane_salina',
   'ane_coloies','ane_sangre','ane_rojos','ane_otrosmetodo','ane_totalmetodo','ane_traslado','id_client'

    ];
    protected $table = 'history_cliente_anestesicos';

    public function pre_medicacion(){
        return $this->hasMany('App\AnestesiaPremedicacion', 'id_history_cliente_anestesico');
    }
    
    public function monitoria(){
        return $this->hasMany('App\AnestesiaMonitoria', 'id_history_cliente_anestesico');
    }

    public function operatorio(){
        return $this->hasMany('App\AnestesiaIntraOperatorio', 'id_history_cliente_anestesico');
    }
}
