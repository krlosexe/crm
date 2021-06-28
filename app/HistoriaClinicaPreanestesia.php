<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoriaClinicaPreanestesia extends Model
{
   protected $fillable = [
        'id_client', 'pre_fecha', 'pre_genero','pre_estado','pre_espquirurgica','pre_procedimiento','pre_arterial','pre_talla','pre_masas',
        'pre_anestesicos','pre_complicaciones','pre_alergicos','pre_farmacologicos','homorragicos','pre_patologicos','pre_quirurgicos','pre_toxicos',
        'pre_transfuncionales','pre_aleotros','pre_cardio','pre_respiratorio','pre_pulso','pre_temperatura','pre_peso','pre_imc','pre_abdomen',
        'pre_interpretacion','pre_dominante','pre_pulmonar','pre_caracteristicas','pre_ruidos','pre_soplos','pre_apertura','pre_cuello','pre_dientes',
        'pre_lentes','pre_lentes','pre_protesis','pre_pulsos','pre_removible','pre_obsabdomen','pre_obsextremidades','pre_otroshalla','pre_hematocrito',
        'pre_creatina','pre_ureico','pre_glicemia','pre_albumina','pre_plaquetas','pre_tp','pre_ptt','pre_bun','pre_transaminas','pre_pcr','pre_igg1',
        'pre_igg2','pre_electro','pre_felectro','pre_rx','pre_frx','pre_otrostudios','pre_fotrostudios','pre_asa','pre_recomendaciones','id_client'

    ];



    protected $table = 'history_cliente_preanestesia';



}
