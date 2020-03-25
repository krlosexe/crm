<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormCreditActividadEconomicaAdress extends Model
{
    protected $fillable = [
        'id_form',  'adress_client', 'city_client', 'phone_client', 'mobil_client', 'email_client', 'mailing', 
        'number_document_spouse', 'address_mailing', 'city_mailing', 'phone_mailing', 'type_activity_client',
         'oter_activity_client', 'name_company_client', 'addres_worck_client', 'city_worck_clirnt', 'phone_worck_client', 
         'ext_phone_worck_client', 'fax_phone_worck_client', 'dependency_area', 'charge_company', 'type_contrato', 'date_vinculacion'
    ];

    public $timestamps    = false;
    protected $table      = 'form_credit_actividad_economica_address_client';
}
