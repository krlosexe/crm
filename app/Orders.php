<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $fillable = [
        'id_client', 'total_invoice', 'method_pay', 'reference_pay', 'status'
    ];

    protected $table = 'orders';

    public function products(){
        return $this->hasMany('App\OrdersDetail', 'id_order')
                ->join('products', 'products.id', '=', 'orders_detail.id_product')  
        ->select(array('orders_detail.*', 'products.description', 'products.photo'));
    }

}
