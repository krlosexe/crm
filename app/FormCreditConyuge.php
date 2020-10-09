<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormCreditConyuge extends Model
{
    protected $fillable = [
        'id_form', 'first_name_spouse','second_name_spouse','first_last_name_spouse','second_last_name_spouse','type_document_spouse','number_document_spouse','type_activity_spouse','phone_spouse','company_work_spouse','charge_worck_spouse','monthly_income_spouse'
    ];

    public $timestamps    = false;
    protected $table      = 'form_credit_conyuge';
}
