<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientPayToStudyCredit extends Model
{
    protected $table= "clients_pay_to_study_credit";
    protected $guarded = [];
    public    $timestamps    = false;
}
