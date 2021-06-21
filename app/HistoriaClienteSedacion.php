<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoriaClienteSedacion extends Model
{
   protected $fillable = ['sed_solidos','sed_solidos2','sed_consulta','sed_arterial','sed_cardiaca','sed_peso','sed_talla','sed_imc',
   'sed_asa','sed_4extremidades','sed_4ok','sed_2extremidades','sed_2ok','sed_koextremidades','sed_ko','sed_respira','sed_respiraok',
   'sed_disnea','sed_okdisnea','sed_apnea','sed_okapnea','sed_presedacion','sed_okpresedacion','sed_mediosedacion','sed_okmediosed',
   'sed_sensa','sed_despierto','sed_okdespierto','sed_responde','sed_okresponde','sed_sinrespuesta','sed_oksinrespuesta','sed_observaciones',
   'sed_alergicos_id','sed_familiares_id','sed_patologicos_id','sed_quirurgicos_id','sed_toxicologicos_id','sed_monitorizacion_id'

    ];



    protected $table = 'history_cliente_sedacion';

}
