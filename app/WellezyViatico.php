<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WellezyViatico extends Model
{
    protected $table = 'wellezy_viatico';
    protected $guarded= [];

    public function services(){
        return $this->belongsTo(WellezyService::class,'id_services');
    }
}
