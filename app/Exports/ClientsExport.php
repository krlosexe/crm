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



    public function view(): View
    {

        $data = DB::table('clientes')->select( 'state',
                                               'clientes.nombres',
                                               'apellidos', 
                                               'identificacion',
                                               'clientes.telefono' ,
                                               'email',
                                               'origen',
                                               'forma_pago',
                                               "datos_personales.nombres as name_register",
                                               "datos_personales.apellido_p as apellido_register",
                                               "auditoria.*"
                                            )
                                            ->join("auditoria", "auditoria.cod_reg", "=", "clientes.id_cliente")
                                            ->join('datos_personales', 'datos_personales.id_usuario', '=', 'clientes.id_user_asesora')
                                            ->where("auditoria.tabla", "clientes")
                                            ->where("auditoria.status", "!=", "0")
                                            ->orderBy("clientes.id_cliente", "DESC")->get();


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
