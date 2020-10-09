<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormCreditIngresosEgresos extends Model
{
    protected $fillable = [
        'id_form',  'salary_basic',  'comisiones',  'arrendamientos',  'otros',  'cuales',  'total_ingresos',  'prestamos_vivienda', 
         'prestamo_vehiculo_otros',  'credit_card',  'arriendo',  'gastos_familiaros_otros',  'total_egresos',  'valor_cotizado',  'numero_cuotas',  'valor_financiar',  'fecha_cirugia',  
    ];

    public $timestamps    = false;
    protected $table      = 'form_credit_ingresos_egresos';
}
