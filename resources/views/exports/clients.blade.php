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
        <th><b>Forma de Pago</b></th>
        <th><b>Asesora</b></th>
        <th><b>Fecha de Registro</b></th>
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
            <td>{{ $value->name_city }}</td>
            <td>{{ $value->name_clinic }}</td>
            <td>{{ $value->direccion }}</td>
            <td>{{ $value->facebook }}</td>
            <td>{{ $value->instagram }}</td>
            <td>{{ $value->twitter }}</td>
            <td>{{ $value->youtube }}</td>
            <td>{{ $value->code_client }}</td>
            <td>{{ $value->prp }}</td>
            <td>{{ $value->forma_pago }}</td>
            <td>{{ $value->name_register }} {{ $value->apellido_register }}</td>
            <td>{{ $value->fec_regins }}</td>
        </tr>
    @endforeach
    </tbody>
</table>