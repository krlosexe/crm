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



    public function followers(){
      return $this->hasMany('App\FollwersEvents', 'id_event')
                  ->join('users', 'users.id', '=', 'followers_events.id_user')  
                  ->join('datos_personales', 'datos_personales.id_usuario', '=', 'followers_events.id_user')     
                  ->where("followers_events.tabla", "surgeries")
                  ->select(array('followers_events.*', 'users.img_profile', "datos_personales.nombres as name_user", 
                  "datos_personales.apellido_p as last_name_user"));
    }



    public function procedures(){
        
      return $this->hasMany('App\ClientsProcedure', 'id_client', 'id_cliente')
                  ->join('sub_category', 'sub_category.id', '=', 'clients_procedures.id_sub_category')  
                  ->select(array('clients_procedures.*', 'sub_category.name'));
      
    }




    public function aditionals(){
        
      return $this->hasMany('App\SurgeriesAdditional', 'id_surgerie') ;
      
    }

   












}
