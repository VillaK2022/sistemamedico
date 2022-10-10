@extends('adminlte::page')

@section('title', 'Examen fisico')

@section('content_header')
    <h1>Examen Fisico</h1>

@stop

@section('content')
    <form action="/examenfisico" method="POST">
        @csrf
        <div class="row">
            <input type="hidden" value="{{$paciente->id}}" id="id_paciente" name="id_paciente">
            <div class="col-lg-4 mb-3">
                <label  for="" class="form-label">Nombre paciente</label>
                <br>
                <label  for="" class="form-label">{{$paciente->nombre_paciente}}</label>
            </div>
            <div class="col-lg-4 mb-3">
                <label  for="" class="form-label">Apellido paciente</label>
                <br>
                <label  for="" class="form-label">{{$paciente->apellidom_paciente}}</label>
            </div>
            <div class="col-lg-4 mb-3">
                <label for="" class="form-label">Cedula paciente</label>
                <br>
                <label for="" class="form-label">{{$paciente->cedula_paciente}}</label>
            </div>
            <div class="col-lg-4 mb-3">
                <label for="" class="form-label">Fecha nacimiento</label>
                <br>
                <label for="" class="form-label">{{$paciente->fechanac_paciente}}</label>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 mb-3">
                <label  for="" class="form-label">Precion Arterial</label>
                <input required type="number" id="parterial_exfisico" name="parterial_exfisico" class="form-control" tabindex="1">
            </div>
        
            <div class="col-lg-4 mb-3">
                <label  for="" class="form-label">Temperatura</label>
                <input required type="number" id="temperatura_exfisico" name="temperatura_exfisico" class="form-control" tabindex="1">
            </div>
            
            <div class="col-lg-4 mb-3">
                <label  for="" class="form-label">Frecuencia Respiratoria</label>
                <input required type="number" id="frespiratoria_exfisico" name="frespiratoria_exfisico" class="form-control" tabindex="1">
            </div>
        
            <div class="col-lg-4 mb-3">
                <label  for="" class="form-label">Frecuencia Cardiaca</label>
                <input required type="number" id="fcardiaca_exfisico" name="fcardiaca_exfisico" class="form-control" tabindex="1">
            </div>
            <div class="col-lg-4 mb-3">
                <label  for="" class="form-label">Peso</label>
                <input required type="number" id="peso_exfisico" name="peso_exfisico" class="form-control" tabindex="1">
            </div>
            <div class="col-lg-4 mb-3">
                <label  for="" class="form-label">Altura</label>
                <input required type="number" id="altura_exfisico" name="altura_exfisico" class="form-control" tabindex="1">
            </div>
        </div>

        <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
        <a href="/index" class="btn btn-secondary" tabindex="5">Cancelar</a>
    </form>
        
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