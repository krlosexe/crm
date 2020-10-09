<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormCreditProcedure extends Model
{
    protected $fillable = [
        'id_form',  'procedure'
    ];

    public $timestamps    = false;
    protected $table      = 'form_credit_procedure';
}