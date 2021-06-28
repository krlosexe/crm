<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnfermeriaClient extends Model
{
   protected $fillable = ['enf_quirofano','enf_fechaini','enfe_horaini','enf_fechafin','enf_horafin','enf_fecha','enf_hora','enf_tension',
   'enf_cardiaca','enf_oxigeno','enf_creacion','id_client'

    ];



    protected $table = 'history_cliente_enfermeria';

}
