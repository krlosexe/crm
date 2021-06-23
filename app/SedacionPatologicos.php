<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SedacionPatologicos extends Model
{
   protected $fillable = ['id_history_cliente_sedacion','pat_item','pat_observacion'


    ];



    protected $table = 'sed_patologicos_tabla';

}



