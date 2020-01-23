<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurgeriesPayments extends Model
{
    protected $fillable = [
        'id_surgerie', 'date', 'way_to_pay', 'amount'
    ];

    protected $table         = 'surgeries_payments';
    public    $timestamps    = false;
    protected $primaryKey    = 'id_surgeries_payments';
}
