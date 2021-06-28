<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotasEnfermeria extends Model
{
   protected $fillable = ['id_history_cliente_historia',
   'not_enfermeria','id_client'
    ];

    protected $table = 'history_cliente_notas';


}
