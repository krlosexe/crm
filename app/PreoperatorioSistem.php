<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreoperatorioSistem extends Model
{
   protected $fillable = [
        'id_client','sis_nombre','sis_hallazgo','id_history_cliente_preoperatorio'

    ];



    protected $table = 'pro_sistemas_tabla';

}
