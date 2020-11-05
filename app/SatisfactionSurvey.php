<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SatisfactionSurvey extends Model
{
    protected $table ="satisfaction_survey";
    protected $guarded = [];

     public function client(){
        return $this->belongsTo(Clients::class,'id_client');
    }
    public function user(){
       return $this->belongsTo(User::class,'id_user');
   }
}
