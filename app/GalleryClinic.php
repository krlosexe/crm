<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GalleryClinic extends Model
{
    protected $fillable = [
        'image', 'thumbnail', "id_clinic"
    ];


    public    $timestamps    = false;
    protected $table = 'gallery_clinic';
}
