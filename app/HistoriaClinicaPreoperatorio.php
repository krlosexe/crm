<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoriaClinicaPreoperatorio extends Model
{
   protected $fillable = [
        'id_client','pro_cirugia','pro_quirofano','pro_alimento','pro_cirujano','pro_anestesiologo','pro_enfermera','pro_sistemas_id',
        'pro_pertenencias','pro_entrega','pro_recibe'

    ];
    protected $table = 'history_cliente_preoperatorio';


    public function operatorio(){
        return $this->hasMany('App\PreoperatorioSistem', 'id_history_cliente_preoperatorio');
    }
    

}
