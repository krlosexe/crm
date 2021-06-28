<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoriaClienteSedacion extends Model
{
   protected $fillable = ['sed_solidos','sed_solidos2','sed_consulta','sed_arterial','sed_cardiaca','sed_peso','sed_talla','sed_imc',
   'sed_asa','sed_4extremidades','sed_4ok','sed_2extremidades','sed_2ok','sed_koextremidades','sed_ko','sed_respira','sed_respiraok',
   'sed_disnea','sed_okdisnea','sed_apnea','sed_okapnea','sed_presedacion','sed_okpresedacion','sed_mediosedacion','sed_okmediosed',
   'sed_sensa','sed_despierto','sed_okdespierto','sed_responde','sed_okresponde','sed_sinrespuesta','sed_oksinrespuesta','sed_observaciones','id_client'

    ];

    protected $table = 'history_cliente_sedacion';


    public function consulta(){
        return $this->hasMany('App\SedacionAlegicos', 'id_history_cliente_sedacion');
    }
    
    public function familiares(){
        return $this->hasMany('App\SedacionFamiliares', 'id_history_cliente_sedacion');
    }
    
    public function patologico(){
        return $this->hasMany('App\SedacionPatologicos', 'id_history_cliente_sedacion');
    }

    public function quirurgicos(){
        return $this->hasMany('App\SedacionQuirurgicas', 'id_history_cliente_sedacion');
    }

    public function monitoria(){
        return $this->hasMany('App\SedacionMonitorizacion', 'id_history_cliente_sedacion');
    }
    
    public function toxicologico(){
        return $this->hasMany('App\SedacionToxicologicas', 'id_history_cliente_sedacion');
    }
    

}
