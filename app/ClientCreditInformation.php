<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientCreditInformation extends Model
{
    protected $fillable = [
        'id_client', 'dependent_independent', 'type_contract', 'antiquity', 'average_monthly_income', 'previous_credits', 'reported', 'bank_account', 'properties', 'vehicle'
    ];


    protected $table         = 'clientc_credit_information';
    public    $timestamps    = false;
    protected $primaryKey    = 'id_client';
}
