<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SedacionMonitorizacion extends Model
{
   protected $fillable = ['id_history_cliente_sedacion','mon_tiempo','mon_farmaco','mon_dosis','mon_ta','mon_fc','mon_sat','mon_ramsay'

    ];

    protected $table = 'sed_monitorizacion_tabla';

}

