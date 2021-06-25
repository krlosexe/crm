<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SedacionQuirurgicas extends Model
{
   protected $fillable = ['id_history_cliente_sedacion','qui_item','qui_observacion'


    ];



    protected $table = 'sed_quirurgicos_tabla';

}

