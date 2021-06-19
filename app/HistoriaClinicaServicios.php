<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoriaClinicaServicios extends Model
{
   protected $fillable = ['id_history_cliente_historia',
   'his_ser_nombre','his_ser_observaciones','his_ser_cantidad','his_ser_fecha'

    ];



    protected $table = 'his_servicios_tabla';

}
