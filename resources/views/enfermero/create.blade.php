@extends('adminlte::page')

@section('title', 'Crear Enfermero')

@section('content_header')
    <h1>Crear Enfermero</h1>
@stop

@section('content')
<form action="/enfermeros" method="POST">
    @csrf
    <div class="mb-3">
        <label for="" class="form-label">Apellido paterno</label>
        <input type="text" id="apellidop_enfermera" name="apellidop_enfermera" class="form-control" tabindex="1">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Apellido Materno</label>
        <input type="text" id="apellidom_enfermera" name="apellidom_enfermera" class="form-control" tabindex="1">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Nombre</label>
        <input type="text" id="nombre_enfermera" name="nombre_enfermera" class="form-control" tabindex="1">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Cedula</label>
        <input type="number" id="cedula_enfermera" name="cedula_enfermera" class="form-control" tabindex="1">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Telefono</label>
        <input type="number" id="tlf_enfermera" name="tlf_enfermera" class="form-control" tabindex="1">
    </div>
    <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
    <a href="/enfermeros" class="btn btn-secondary" tabindex="5">Cancelar</a>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop