<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoriaClinicaRemision extends Model
{
   protected $fillable = ['id_history_cliente_historia',
   'his_rem_nombre','his_rem_dias','his_rem_fecha'

    ];



    protected $table = 'his_remision_tabla';

}
