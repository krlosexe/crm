<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnestesiaPremedicacion extends Model
{
   protected $fillable = ['id_history_cliente_anestesico','ane_premedicacion','id_client'

    ];



    protected $table = 'ane_premedicacion_tabla';

}
