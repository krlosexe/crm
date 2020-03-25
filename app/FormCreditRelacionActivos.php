<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormCreditRelacionActivos extends Model
{
    protected $fillable = [
        'id_form',  'type_apartamento',  'address_bien',  'barrio',  'city',  'valor_comercail',  'hipoteca',  'afectacion_familiar',  'type_vehicule',  
        'placa',  'transito',  'marca',  'modelo',  'valor_comercial',  'prenda_valor',  'otro_activos'
    ];

    public $timestamps    = false;
    protected $table      = 'form_credit_relacion_activo';
}
