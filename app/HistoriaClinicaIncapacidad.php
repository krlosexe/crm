<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoriaClinicaIncapacidad extends Model
{
   protected $fillable = ['id_history_cliente_historia',
   'his_inc_motivo	','his_inc_dias','his_inc_tipo','his_inc_fecha'

    ];



    protected $table = 'his_incapacidad_tabla';

}
