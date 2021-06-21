<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SedacionAlegicos extends Model
{
   protected $fillable = ['id_history_cliente_sedacion','aler_item','aler_observacion','id_client'


    ];



    protected $table = 'sed_alergicos_tabla';

}
