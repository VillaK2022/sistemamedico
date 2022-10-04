@extends('adminlte::page')

@section('title', 'Enfermeros')

@section('content_header')
    <h1>Enfermeros</h1>
@stop

@section('content')
   <form action="buscar" method="GET">
        <input name="cedula_paciente" id="cedula_paciente" type="text"> holaa
        <button type="submit" class="btn btn-danger">Borrar</button>
    </form>
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