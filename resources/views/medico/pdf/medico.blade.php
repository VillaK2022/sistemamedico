<table id="medicos" class="table table-hover shadow-lg mt-4" style="width:100%">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Apellido paterno</th>
            <th scope="col">Apellido Materno</th>
            <th scope="col">Nombres</th>
            <th scope="col">Cedula</th>
            <th scope="col">Telefono</th>
        </tr>
    </thead>
    <tbody>
        @foreach ( $datos as $medico)
            <tr>
                <td>{{ $medico->id }}</td>
                <td>{{ $medico->apellidop_medico }}</td>
                <td>{{ $medico->apellidom_medico }}</td>
                <td>{{ $medico->nombre_medico }}</td>
                <td>{{ $medico->cedula_medico }}</td>
                <td>{{ $medico->tlf_medico }}</td>
            </tr>
        @endforeach
    </tbody>
</table>