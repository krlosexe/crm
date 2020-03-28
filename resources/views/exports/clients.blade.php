<table>
    <thead>
    <tr>
        <th><b>Estado</b></th>
        <th><b>Nombres y Apellidos</b></th>
        <th><b>identificacion</b></th>
        <th><b>telefono</b></th>
        <th><b>email</b></th>
        <th><b>origen</b></th>
        <th><b>Linea</b></th>
        <th><b>forma_pago</b></th>
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
            <td>{{ $value->origen }}</td>
            <td>{{ $value->nombre_line }}</td>
            <td>{{ $value->forma_pago }}</td>
            <td>{{ $value->name_register }} {{ $value->apellido_register }}</td>
            <td>{{ $value->fec_regins }}</td>
        </tr>
    @endforeach
    </tbody>
</table>