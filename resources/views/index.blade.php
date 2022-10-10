@extends('adminlte::page')

@section('title', 'Fino')

@section('content_header')
    <h1>Fino</h1>
@stop

@section('content')
    <h1>Fino Pa</h1>
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