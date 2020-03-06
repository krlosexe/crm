<?php

namespace App\Exports;

use App\User;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class ClientsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */


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
