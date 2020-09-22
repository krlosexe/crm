<?php

namespace App\Exports;

use DB;
use App\User;
use App\Clients;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class ClientsExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    
    var $linea_negocio;
    var $asesor;
    var $origen;

    var $date_init;
    var $date_finish;
    var $state;
    var $search;
    var $city;


    public function view(): View
    {

        $business_line = $this->linea_negocio;
        $adviser       = $this->asesor;
        $origen        = $this->origen;
        $date_init     = $this->date_init;
        $date_finish   = $this->date_finish;
        $state         = $this->state;
        $search        = $this->search;
        $city          = $this->city ;
        $have_initial  = $this->have_initial ;
        $to_prp        = $this->to_prp ;
        $use_app       = $this->use_app ;

        ini_set('memory_limit', '-1'); 
        ini_set('max_execution_time', 360);
        $data = Clients::select('state',      'clientes.id_cliente',
                                               'clientes.nombres',
                                               'apellidos', 
                                               'identificacion',
                                               'clientes.telefono' ,
                                               'clientes.email',
                                               'origen',
                                               'forma_pago',
                                               'clientes.fecha_nacimiento',
                                               'clientes.direccion',
                                               'facebook',
                                               'instagram',
                                               'twitter',
                                               'youtube',
                                               'code_client',
                                               'prp',
                                               'created_prp',
                                               "datos_personales.nombres as name_register",
                                               "datos_personales.apellido_p as apellido_register",
                                               "auditoria.*",
                                               "lines_business.nombre_line",
                                               "citys.nombre as name_city",
                                               "clinic.nombre as name_clinic",


                                               "clientc_credit_information.*",

                                               "valuations.fecha as fecha_valoration",
                                               "valuations.surgeon as name_surgeon_valoration",
                                               "valuations.way_to_pay",

                                               "surgeries.fecha as fecha_surgerie",
                                               "surgeries.surgeon as name_surgeon_cx",
                                               "sub_category.name as name_procedure",

                                               "dp2.nombres as name_asesora_valorations",
                                               "dp2.apellido_p as apellido_asesora_valorations",

                                               "auditoria.usr_regins as user_register"
                                            )
                                            ->join("auditoria", "auditoria.cod_reg", "=", "clientes.id_cliente", "left")
                                            ->join('datos_personales', 'datos_personales.id_usuario', '=', 'clientes.id_user_asesora', "left")
                                            ->join("clientc_credit_information", "clientc_credit_information.id_client", "=", "clientes.id_cliente")
                                            ->join("lines_business", "lines_business.id_line", "=", "clientes.id_line", "left")

                                            ->join("surgeries", "surgeries.id_cliente", "=", "clientes.id_cliente", "left")
                                            ->join("clients_procedures", "clients_procedures.id_client", "=", "clientes.id_cliente", "left")
                                            ->join("sub_category", "sub_category.id", "=", "clients_procedures.id_sub_category", "left")

                                            ->join("valuations", "valuations.id_cliente", "=", "clientes.id_cliente", "left")



                                            ->join("users as us2", "us2.id", "=", "valuations.id_asesora_valoracion", "left")
                                            ->join('datos_personales as dp2', 'dp2.id_usuario', '=', 'us2.id', "left")


                                            ->join("citys", "citys.id_city", "=", "clientes.city", "left")
                                            ->join("clinic", "clinic.id_clinic", "=", "clientes.clinic", "left")




                                            ->where("auditoria.tabla", "clientes")
                                            ->where("auditoria.status", "!=", "0")



                                            ->where(function ($query) use ($search) {
                                                if($search != 5){
                                                    $query->where("clientes.nombres", 'like', '%'.$search.'%');
                                                    $query->orWhere("clientes.identificacion", 'like', '%'.$search.'%');
                                                    $query->orWhere("clientes.telefono", 'like', '%'.$search.'%');
                                                    $query->orWhere("clientes.code_client", 'like', '%'.$search.'%');
                                                    $query->orWhere("clientes.origen", 'like', '%'.$search.'%');
                                                }
                                            }) 



                                            ->where(function ($query) use ($business_line) {
                                                if($business_line != 0){
                                                    $query->whereIn("clientes.id_line", $business_line);
                                                }
                                            })


                                            ->where(function ($query) use ($city) {
                                                if($city != 0){
                                                    $query->where("clientes.city", $city);
                                                }
                                            }) 



                                            ->where(function ($query) use ($have_initial) {
                                                if($have_initial == 1){
                                                    $query->whereNotNull("clientc_credit_information.have_initial");
                                                    $query->whereRaw('clientc_credit_information.have_initial LIKE "%si%"');
                                                }
                                            }) 



                                            ->where(function ($query) use ($to_prp) {
                                                if($to_prp == 1){
                                                    $query->where("clientes.prp", "Si");
                                                }
                                            }) 


                                            ->where(function ($query) use ($use_app) {
                                                if($use_app == 1){
                                                    $query->where("clientes.auth_app", 1);
                                                }
                                            }) 

                                            

                                            ->where(function ($query) use ($state) {
                                                if($state != "0"){
                                                    $query->where("clientes.state", $state);
                                                }
                                            }) 


                                            
            
                                            ->where(function ($query) use ($adviser) {
                                                if($adviser != 0){
                                                    $query->whereIn("clientes.id_user_asesora", $adviser);
                                                }
                                            }) 



                                            ->where(function ($query) use ($origen) {

                                                if($origen == "Formulario"){
                                                    $query->where("clientes.origen", "Formulario Web");
                                                }
            
            
            
                                                if($origen == "Otros"){
                                                    $query->where("clientes.to_db", 0);
                                                    $query->where("clientes.pauta", 0);
                                                    $query->where("clientes.origen", "!=","Formulario Web");
                                                    $query->OrwhereNull('clientes.origen');
                                                }
            
                                            }) 



                                            ->where(function ($query) use ($date_init, $to_prp) {
                                                if($date_init != 0 && $to_prp == 0){
                                                    $query->where("auditoria.fec_update", ">=", $date_init." 00:00:00");
                                                }
            
                                                if($date_init != 0 && $to_prp == 1){
                                                    $query->where("clientes.created_prp", ">=", $date_init);
                                                }
                                            }) 
            
            
                                            ->where(function ($query) use ($date_finish, $to_prp) {
                                                if($date_finish != 0 && $to_prp == 0){
                                                    $query->where("auditoria.fec_update", "<=", $date_finish." 23:59:59");
                                                }
            
                                                if($date_finish != 0 && $to_prp == 1){
                                                    $query->where("clientes.created_prp", "<=", $date_finish);
                                                }
            
            
                                            }) 

                                            ->with("tasks")

                                           // ->orderBy("clientes.id_line", "DESC")
                                           // ->orderBy("clientes.id_cliente", "DESC")
                                           ->groupBy("clientes.id_cliente")
                                           ->orderBy("auditoria.fec_update", "DESC")
                                            ->get();



    
        foreach($data as $value){


      
            $valoration =  DB::table("valuations")->where("id_cliente", $value->id_cliente)->first();
            if($valoration){
                $auditoria = DB::table("auditoria")->where("tabla", "valuations")->where("cod_reg", $valoration->id_valuations)->first();
               
                $data_user = DB::table("datos_personales")->where("id_usuario", $value->usr_regins)->first();

                $value->adviser_created = $data_user->nombres." ".$data_user->apellido_p;
            }
            
        }
        
        return view('exports.clients', [
            'data' => $data
        ]);
    }



    public function headings(): array
    {
        return [
            'nombres',
            'apellidos',
            'identificacion',
            'telefono',
            'email',
            'origen',

            'nombre_line',


            'forma_pago',
        ];
    }



    public function collection()
    {
        $users = DB::table('clientes')->select('nombres',
                                               'apellidos', 
                                               'identificacion',
                                               'telefono' ,
                                               'email',
                                               'origen',
                                               'forma_pago'
                                            )
                                            ->join("auditoria", "auditoria.cod_reg", "=", "clientes.id_cliente")
                                            ->where("auditoria.tabla", "clientes")
                                            ->where("auditoria.status", "!=", "0")
                                            ->orderBy("clientes.id_cliente", "DESC")->get();
         return $users;
    }
}
