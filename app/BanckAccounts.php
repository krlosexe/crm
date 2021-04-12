<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BanckAccounts extends Model
{
    protected $fillable = [
        'number_account','type_account','name_bank','name','identification','id_client'
    ];

    protected $table         = 'banck_accounts';
}
