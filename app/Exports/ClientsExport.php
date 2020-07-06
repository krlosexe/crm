<?php

namespace App\Exports;

use App\User;
use DB;
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

        ini_set('memory_limit', '-1'); 
        $data = DB::table('clientes')->select( 'state',
                                               'clientes.nombres',
                                               'apellidos', 
                                               'identificacion',
                                               'clientes.telefono' ,
                                               'email',
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
                                               "datos_personales.nombres as name_register",
                                               "datos_personales.apellido_p as apellido_register",
                                               "auditoria.*",
                                               "lines_business.nombre_line",
                                               "citys.nombre as name_city",
                                               "clinic.nombre as name_clinic",
                                               "clientc_credit_information.have_initial"
                                            )
                                            ->join("auditoria", "auditoria.cod_reg", "=", "clientes.id_cliente", "left")
                                            ->join('datos_personales', 'datos_personales.id_usuario', '=', 'clientes.id_user_asesora', "left")
                                            ->join("clientc_credit_information", "clientc_credit_information.id_client", "=", "clientes.id_cliente")
                                            ->join("lines_business", "lines_business.id_line", "=", "clientes.id_line", "left")

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



                                            ->where(function ($query) use ($date_init) {
                                                if($date_init != 0){
                                                    $query->where("auditoria.fec_update", ">=", $date_init." 00:00:00");
                                                }
                                            }) 
            
            
                                            ->where(function ($query) use ($date_finish) {
                                                if($date_finish != 0){
                                                    $query->where("auditoria.fec_update", "<=", $date_finish." 23:59:59");
                                                }
                                            })


                                           // ->orderBy("clientes.id_line", "DESC")
                                           // ->orderBy("clientes.id_cliente", "DESC")
                                           ->orderBy("auditoria.fec_update", "DESC")
                                            ->get();

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
