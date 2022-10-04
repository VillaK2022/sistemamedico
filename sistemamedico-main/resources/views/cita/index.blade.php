@extends('adminlte::page')

@section('title', 'Citas')

@section('content_header')
    <h1>Citas</h1>
@stop

@section('content')
    <a href="citas/create" class="btn btn-primary mb-3">CREAR CITA</a>
        <table id="citas" class="table table-hover shadow-lg mt-4" style="width:100%">
            <thead class="bg-primary text-white">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Paciente</th>
                    <th scope="col">Medico</th>
                    <th scope="col">Fecha de la cita</th>
                    <th scope="col">Motivo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $citas as $cita)
                    <tr>
                        <td>{{ $cita->id }}</td>
                        <td>{{ $cita->id_paciente }}</td>
                        <td>{{ $cita->id_medico }}</td>
                        <td>{{ $cita->fecha_cita }}</td>
                        <td>{{ $cita->razon_cita }}</td>
                        <td>
                            <form action="{{ route ('citas.destroy', $cita->id) }}" method="POST">
                                <a href="/citas/{{ $cita->id }}/edit" class="btn btn-info">Editar</a>
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