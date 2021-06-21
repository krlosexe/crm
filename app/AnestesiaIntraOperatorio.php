<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnestesiaIntraOperatorio extends Model
{
   protected $fillable = ['id_history_cliente_anestesico','int_descripcion','int_numero','id_client'

    ];



    protected $table = 'ane_intraoperatorio_tabla';

}
