<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{   


    protected $fillable = [
        'image', 'thumbnail',"id_category"
    ];


    public    $timestamps    = false;
    protected $table = 'gallery_photos';
}
