<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{

    protected $fillable = [
        'id_client', 'id_product', 'qty'
    ];


    protected $table = 'car';
}
