<table>
    <thead>
    <tr>
        <th><b>Estado</b></th>
        <th><b>Nombres y Apellidos</b></th>
        <th><b>identificacion</b></th>
        <th><b>telefono</b></th>
        <th><b>email</b></th>
        <th><b>Fecha de Nacimiento</b></th>
        <th><b>origen</b></th>
        <th><b>Linea</b></th>
        <th><b>Clinica</b></th>
        <th><b>Ciudad</b></th>
        <th><b>Direccion</b></th>
        <th><b>Facebook</b></th>
        <th><b>Instagram</b></th>
        <th><b>Twitter</b></th>
        <th><b>Youtube</b></th>
        <th><b>Codigo de Cliente</b></th>
        <th><b>PRP</b></th>
        <th><b>APP</b></th>
        <th><b>Ingreso al PRP</b></th>
        <th><b>Forma de Pago</b></th>


        <th><b>Tiene Inicial ?</b></th>
        <th><b>Dependiente / independiente</b></th>
        <th><b>Tipo de Contrato</b></th>
        <th><b>Antiguedad</b></th>
        <th><b>Promedio de Ingresos Mensuales</b></th>
        <th><b>Créditos Anteriores</b></th>
        <th><b>Esta reportado</b></th>
        <th><b>Cuenta Bancaria</b></th>



        <th><b>Asesora</b></th>

        <th><b>Fecha de Valoracion</b></th>
        <th><b>Cirujano Valoracion</b></th>
        <th><b>Forma de pago Valoracion</b></th>
        <th><b>Asesora que Agendo</b></th>
        <th><b>Asesora de Valoracion</b></th>


        <th><b>Cirugia</b></th>
        <th><b>Cirujano</b></th>
        <th><b>Fecha de Cirugia</b></th>

        <th><b>Tareas</b></th>

        <th><b>Fecha de Registro</b></th>
        <th><b>Ultima Modificacion</b></th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $value)
        <tr>
            <td>{{ $value->state }}</td>
            <td>{{ $value->nombres }} {{ $value->apellidos }}</td>
            <td>{{ $value->identificacion }}</td>
            <td>{{ $value->telefono }}</td>
            <td>{{ $value->email }}</td>
            <td>{{ $value->fecha_nacimiento }}</td>
            <td>{{ $value->origen }}</td>
            <td>{{ $value->nombre_line }}</td>
            <td>{{ $value->name_clinic }}</td>
            <td>{{ $value->name_city }}</td>
            <td>{{ $value->direccion }}</td>
            <td>{{ $value->facebook }}</td>
            <td>{{ $value->instagram }}</td>
            <td>{{ $value->twitter }}</td>
            <td>{{ $value->youtube }}</td>
            <td>{{ $value->code_client }}</td>
            <td>{{ $value->prp }}</td>

            <td>
                {{ $value->auth_app == 1 ? 'Si' : 'No'}}

            </td>


            <td>{{ $value->created_prp }}</td>
            <td>{{ $value->forma_pago }}</td>


            <td>{{ $value->have_initial }}</td>
            <td>{{ $value->dependent_independent }}</td>
            <td>{{ $value->type_contract }}</td>
            <td>{{ $value->antiquity }}</td>
            <td>{{ $value->average_monthly_income }}</td>
            <td>{{ $value->previous_credits }}</td>
            <td>{{ $value->reported }}</td>
            <td>{{ $value->bank_account }}</td>


            <td>{{ $value->name_register }} {{ $value->apellido_register }}</td>

            <td>{{ $value->fecha_valoration }}</td>
            <td>{{ $value->name_surgeon_valoration }}</td>
            <td>{{ $value->way_to_pay }}</td>

            <td>{{ $value->adviser_created }}</td>
            <td>{{ $value->name_asesora_valorations }} {{ $value->apellido_asesora_valorations }}</td>



            <td>{{ $value->name_procedure }}</td>
            <td>{{ $value->name_surgeon_cx }}</td>
            <td>{{ $value->fecha_surgerie }}</td>

            <th>
                <b>
                    @foreach($value->tasks as $task)
                    {{$task->issue}} {{$task->fecha}} <br>
                    @endforeach
                </b>
            </th>








            <td>{{ $value->fec_regins }}</td>
            <td>{{ $value->fec_update }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
