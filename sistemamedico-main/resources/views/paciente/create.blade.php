@extends('adminlte::page')

@section('title', 'Crear Paciente')

@section('content_header')
    <h1>Crear Paciente</h1>
@stop

@section('content')
<form action="/pacientes" method="POST">
    @csrf
    <div class="mb-3">
        <label for="" class="form-label">Apellido paterno</label>
        <input type="text" id="apellidop_paciente" name="apellidop_paciente" class="form-control" tabindex="1">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Apellido Materno</label>
        <input type="text" id="apellidom_paciente" name="apellidom_paciente" class="form-control" tabindex="1">
    </div>
    
    <div class="mb-3">
        <label for="" class="form-label">Nombre</label>
        <input type="text" id="nombre_paciente" name="nombre_paciente" class="form-control" tabindex="1">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Fecha nacimiento</label>
        <input type="date" id="fechanac_paciente" name="fechanac_paciente" class="form-control" tabindex="1">
    </div>

    <div class="mb-3">
    <label for="" class="form-label">Estado civil</label>
        <select id="ecivil_paciente" name="ecivil_paciente" class="form-control" class="mb-3">
            
            <option value="1">Casado</option>
            <option value="2">Soltero</option>
            <option value="3">Divorciado</option>
            <option value="4">Viudo</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Cedula</label>
        <input type="number" id="cedula_paciente" name="cedula_paciente" required class="form-control" tabindex="1">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Telefono</label>
        <input type="number" id="tlf_paciente" name="tlf_paciente" required class="form-control" tabindex="1">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Ocupacion</label>
        <input type="text" id="ocupacion_paciente" name="ocupacion_paciente" required class="form-control" tabindex="1">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Lugar donde vive</label>
        <input type="text" id="resid_paciente" name="resid_paciente" required class="form-control" tabindex="1">
    </div>

    <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
    <a href="/pacientes" class="btn btn-secondary" tabindex="5">Cancelar</a>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop