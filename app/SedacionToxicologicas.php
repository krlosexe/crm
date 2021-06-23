<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SedacionToxicologicas extends Model
{
   protected $fillable = ['id_history_cliente_sedacion','tox_item','tox_observacion'


    ];



    protected $table = 'sed_toxicologicos_tabla';

}

