<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SedacionFamiliares extends Model
{
   protected $fillable = ['id_history_cliente_sedacion','fam_item','fam_observacion','id_client'


    ];



    protected $table = 'sed_familiares_tabla';

}
