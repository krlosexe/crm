<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormCreditDatosGenerales extends Model
{


    protected $fillable = [
        'id_line','first_name', 'second_name', 'first_last_name', 'second_last_name','type_document', 'number_document', 
        'location_expedition_document', 'date_expedition_document','birthdate', 'birthplace', 'sexo', 'state_civil','level_education',
         'profession', 'number_person_in_charge', 'number_children', 'housing_type', 'name_lessor', 'phone_lessor'
    ];



    public $timestamps    = false;
    protected $table      = 'form_credit_datos_generales';
}
