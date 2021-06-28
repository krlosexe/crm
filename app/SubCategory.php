<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $table = 'sub_category';
    protected $guarded= [];
    public $timestamps = false;

    public function category(){
        return $this->belongsTo(Category::class,'id_category');
    }
}
