<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormAutorizationStudioCredit extends Model
{
    protected $fillable = [
        'id_form',  'names', 'last_names', 'number_document', 'phone_house', 'phone_mobil', 'email', 'address', 'accept'
    ];

    public $timestamps    = false;
    protected $table      = 'form_autorizacion_estudio_credito';
}
