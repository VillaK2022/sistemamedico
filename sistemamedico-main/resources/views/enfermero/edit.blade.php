@extends('adminlte::page')

@section('title', 'Editar Enfermero')

@section('content_header')
    <h1>Editar Enfermero</h1>
@stop

@section('content')
<form action="/enfermeros/{{ $enfermero->id }}" method="POST">
    @csrf
    @method('PUT')
    
    <div class="mb-3">
        <label for="" class="form-label">Apellido paterno</label>
        <input type="text" id="apellidop_enfermera" name="apellidop_enfermera" required class="form-control" value="{{ $enfermero->apellidop_enfermera }}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Apellido Materno</label>
        <input type="text" id="apellidom_enfermera" name="apellidom_enfermera" required class="form-control" value="{{ $enfermero->apellidom_enfermera }}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Nombre</label>
        <input type="text" id="nombre_enfermera" name="nombre_enfermera" required class="form-control" value="{{ $enfermero->nombre_enfermera }}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Cedula</label>
        <input type="number" id="cedula_enfermera" name="cedula_enfermera" required class="form-control" value="{{ $enfermero->cedula_enfermera }}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Telefono</label>
        <input type="number" id="tlf_enfermera" name="tlf_enfermera" required class="form-control" value="{{ $enfermero->tlf_enfermera }}">
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
