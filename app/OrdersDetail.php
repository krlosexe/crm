<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdersDetail extends Model
{
    protected $fillable = [
        'id_order', 'id_product', 'qty', 'price', 'price_total'
    ];  

    public $timestamps = false;

    protected $table = 'orders_detail';
}
