<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientsRequirementsCredit extends Model
{
    protected $fillable = [
        'id_client', 'working_letter', 'payment_stubs', 'copy_of_id',
        'bank_statements', 'co_debtor', 'property_tradition', 'license_plate_copy',
        'extractos_bancarios_dependiente', 'rut_chamber_of_commerce', 'declaracion_renta', 'cedula_codeudor', 'rut_camara_comercio_codeudor',
        'extractos_bancarios_codeudor', 'declaracion_renta_codeudor', 'carta_laboral_codeudor', 'colillas_nomina_codeudor'
    ];

    protected $table         = 'client_request_credit_requirements';
    public    $timestamps    = false;

}
