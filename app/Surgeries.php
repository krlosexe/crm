<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Surgeries extends Model
{
    protected $fillable = [
        'id_cliente', 'surgerie_rental', 'name_paciente', 'fecha', 'time', 'time_end', 'attempt', 'type', 'amount', 'surgeon', 'operating_room', 'clinic','observaciones', 'status_surgeries'
    ];

    protected $table         = 'surgeries';
    public    $timestamps    = false;
    protected $primaryKey    = 'id_surgeries';



    public function payments()
    {
      return $this->hasMany('App\SurgeriesPayments', 'id_surgerie');
    }


}
