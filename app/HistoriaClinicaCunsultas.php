<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoriaClinicaCunsultas extends Model
{
   protected $fillable = ['id_history_cliente_historia','his_cons_consulta	','his_cons_valor','his_cons_resultado'

    ];

    protected $table = 'his_cons_tabla';


}
