<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientsRequirementsCredit extends Model
{
    protected $fillable = [
        'id_client', 'working_letter', 'payment_stubs', 'copy_of_id', 'bank_statements', 'co_debtor', 'property_tradition', 'license_plate_copy'
    ];

    protected $table         = 'client_request_credit_requirements';
    public    $timestamps    = false;

}
