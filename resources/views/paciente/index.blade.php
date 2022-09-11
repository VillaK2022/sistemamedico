@extends('adminlte::page')

@section('title', 'Pacientes')

@section('content_header')
    <h1>Pacientes</h1>
@stop

@section('content')
    <a href="pacientes/create" class="btn btn-primary mb-3">CREAR</a>
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
                            <form action="{{ route ('pacientes.destroy', $paciente->id) }}" method="POST">
                                <a href="/pacientes/{{ $paciente->id }}/edit" class="btn btn-info">Editar</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Borrar</button>
                            </form>
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
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function () {
        $('#medicos').DataTable({
            "lengthMenu":[[5,10,20,-1], [5,10,20,"All"]]
        });
        });
    </script>
@stop