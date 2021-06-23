<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoriaClinicaMedicamentos extends Model
{
   protected $fillable = ['id_history_cliente_historia',
   'his_med_nombre','his_med_posologia','his_med_cantidad','his_med_fecha'

    ];

    protected $table = 'his_medicamento_tabla';

}
