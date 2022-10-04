@extends('adminlte::page')

@section('title', 'Enfermeros')

@section('content_header')
    <h1>Enfermeros</h1>
@stop

@section('content')
    <a href="enfermeros/create" class="btn btn-primary mb-3">CREAR</a>
        <table id="enfermeros" class="table table-hover shadow-lg mt-4" style="width:100%">
            <thead class="bg-primary text-white">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Apellido paterno</th>
                    <th scope="col">Apellido Materno</th>
                    <th scope="col">Nombres</th>
                    <th scope="col">Cedula</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $enfermeros as $enfermero)
                    <tr>
                        <td>{{ $enfermero->id }}</td>
                        <td>{{ $enfermero->apellidop_enfermera }}</td>
                        <td>{{ $enfermero->apellidom_enfermera }}</td>
                        <td>{{ $enfermero->nombre_enfermera }}</td>
                        <td>{{ $enfermero->cedula_enfermera }}</td>
                        <td>{{ $enfermero->tlf_enfermera }}</td>
                        <td>
                            <form action="{{ route ('enfermeros.destroy', $enfermero->id) }}" method="POST">
                                <a href="/enfermeros/{{ $enfermero->id }}/edit" class="btn btn-info">Editar</a>
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