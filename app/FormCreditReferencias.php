<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormCreditReferencias extends Model
{
    protected $fillable = [
        'id_form',  'name_last_name1',  'parentezco1',  'phone_recidencia1',  'phone_oficcina1',  'celular1',
          'name_last_name2',  'parentezco2',  'phone_recidencia2',  'phone_oficcina2',  'celular2',  
        'refer_2_name_last_name1',  'refer_2_parentezco1',  'refer_2_phone_recidencia1',  'refer_2_phone_oficcina1',  
        'refer_2_celular1',  'refer_2_name_last_name2',  'refer_2_parentezco2',  'refer_2_phone_recidencia2',  'refer_2_phone_oficcina2',  'refer_2_celular2',  
    ];

    public $timestamps    = false;
    protected $table      = 'form_credit_referencias';
}