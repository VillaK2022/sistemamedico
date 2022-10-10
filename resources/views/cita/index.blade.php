@extends('adminlte::page')

@section('title', 'Citas')

@section('content_header')
    <h1>Citas</h1>
@stop

@section('content')
        @if ($user_rol == 1 or $user_rol == 3)
            <a href="citas/create" class="btn btn-primary mb-3">CREAR CITA</a>
        @endif
        <table id="citas" class="table table-hover shadow-lg mt-4" style="width:100%">
            <thead class="bg-primary text-white">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Paciente</th>
                    <th scope="col">Medico</th>
                    <th scope="col">Fecha de la cita</th>
                    <th scope="col">Motivo</th>
                    <th scope="col">Estado</th>
                    @if ($user_rol == 1 or $user_rol == 2)
                        <th scope="col">Acciones</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ( $citas as $key => $cita)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $cita->nombre_paciente }} {{ $cita->apellidom_paciente }}</td>
                        <td>{{ $cita->nombre_medico }} {{ $cita->apellidom_medico }}</td>
                        <td>{{ $cita->fecha_cita }}</td>
                        <td>{{ $cita->razon_cita }}</td>
                        <td>
                            <span class="badge badge-{{ $cita->estado == 0 ? 'warning' : ($cita->estado == 1 ? 'success' : '') }} right">
                                {{ $cita->estado == 0 ? 'Pendiente' : ($cita->estado == 1 ? 'Finalizada' : '') }}
                            </span>
                        </td>
                        @if ($user_rol == 1 or $user_rol == 2)
                            <td>
                                @if ($cita->estado == 0)
                                    <form action="{{ route ('citas.destroy', $cita->id) }}" method="POST">
                                        <a href="/citas/{{ $cita->id }}/edit" class="btn btn-info">Editar</a>
                                        <a href="/atencion/{{ $cita->id }}" class="btn btn-dark">Atender</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Borrar</button>
                                    </form>
                                @else
                                <a href="imprimir/cita/{{ $cita->id }}" class="btn btn-danger mb-3">Imprimir</a>
                                @endif
                            </td>
                        
                        @endif
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
            $('#citas').DataTable({
                "lengthMenu":[[5,10,20,-1], [5,10,20,"All"]]
            });
        });
    </script>
@stop