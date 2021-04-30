<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = [
        'code', 'description', 'register_invima', 'price_cop', 'presentation', 'available_store', 'photo'
    ];

    protected $table = 'products';

    public function categories(){
        return $this->hasMany('App\ProductsCategories', 'id_product');
    }


}
