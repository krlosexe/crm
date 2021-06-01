<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $guarded= [];
    public $timestamps = false;


    public function child(){
        return $this->hasMany('App\SubCategory', 'id_category')
                        ->where("sub_category.state", 1)
                        ->select(array('sub_category.id', 'sub_category.name', 'sub_category.id_category','sub_category.foto as img', 'sub_category.description', 'sub_category.information'));
    }


}
