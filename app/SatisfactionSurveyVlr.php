<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SatisfactionSurveyVlr extends Model
{
    protected $table ="satisfaction_survey_vlr";
    protected $guarded = [];

     public function client(){
        return $this->belongsTo(Clients::class,'id_client');
    }
    public function user(){
       return $this->belongsTo(User::class,'id_user');
   }
}
