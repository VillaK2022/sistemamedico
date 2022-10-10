@extends('adminlte::page')

@section('title', 'Enfermeros')

@section('content_header')
    <h1>Buscar por cedula</h1>
@stop

@section('content')
   <form action="buscar" method="GET">
        <input required name="cedula_paciente" id="cedula_paciente" type="text"> 
        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>
    <br>
    <table id="pacientes" class="table table-hover shadow-lg mt-4" style="width:100%">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Apellido paterno</th>
                <th scope="col">Apellido Materno</th>
                <th scope="col">Nombres</th>
                <th scope="col">Fecha nacimiento</th>
                <th scope="col">Estado civil</th>
                <th scope="col">Ocupacion</th>
                <th scope="col">Cedula</th>
                <th scope="col">Telefono</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $pacientes as $paciente)
                <tr>
                    <td>{{ $paciente->id }}</td>
                    <td>{{ $paciente->apellidop_paciente }}</td>
                    <td>{{ $paciente->apellidom_paciente }}</td>
                    <td>{{ $paciente->nombre_paciente }}</td>
                    <td>{{ $paciente->fechanac_paciente }}</td>
                    <td>{{ $paciente->ecivil_paciente }}</td>
                    <td>{{ $paciente->ocupacion_paciente }}</td>
                    <td>{{ $paciente->cedula_paciente }}</td>
                    <td>{{ $paciente->tlf_paciente }}</td>
                    <td>
                        <a href="/examenfisico/{{ $paciente->id }}" class="btn btn-info">Examen</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <!-- <script>
        $(document).ready(function () {
        $('#medicos').DataTable({
            "lengthMenu":[[5,10,20,-1], [5,10,20,"All"]]
        });
        });
    </script> -->
@stop