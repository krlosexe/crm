<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoriaClinicaQuirurgica extends Model
{
   protected $fillable = ['id_client','qui_cie10','qui_diagnostico','qui_tipo','qui_anestesia','qui_procedimiento','qui_cirujano','qui_cirujano2','qui_anestesiologo',
   'qui_ayudante','qui_ayudante2','qui_instrumentador','qui_auxiliares','qui_fecha','qui_hora','qui_descripcion','qui_complicaciones'

    ];



    protected $table = 'history_cliente_quirurgica';

}
