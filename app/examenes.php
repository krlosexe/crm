<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class examenes extends Model
{
    protected $fillable = [
        'id_cliente', 'fecha', 'time', 'clinic','status_surgeries'
    ];

    protected $table         = 'examenes';
    public    $timestamps    = false;



    public function comments(){
        return $this->hasMany('App\Comments', 'id_event', 'id')
                    ->where("comments.table", "examenes")
                    ->select(array('comments.*'));
    }



}
