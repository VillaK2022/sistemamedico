@extends('adminlte::page')

@section('title', 'Editar Medico')

@section('content_header')
    <h1>Editar medico</h1>
@stop

@section('content')
<form action="/medicos/{{ $medico->id }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-3">
            <label for="" class="form-label">Apellido paterno</label>
            <input type="text" id="apellidop_medico" name="apellidop_medico" required class="form-control" value="{{ $medico->apellidop_medico }}">
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-3">
            <label for="" class="form-label">Apellido Materno</label>
            <input type="text" id="apellidom_medico" name="apellidom_medico" required class="form-control" value="{{ $medico->apellidom_medico }}">
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-3">
            <label for="" class="form-label">Nombre</label>
            <input type="text" id="nombre_medico" name="nombre_medico" required class="form-control" value="{{ $medico->nombre_medico }}">
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-3">
            <label for="" class="form-label">Cedula</label>
            <input type="number" id="cedula_medico" name="cedula_medico" required class="form-control" value="{{ $medico->cedula_medico }}">
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-3">
            <label for="" class="form-label">Telefono</label>
            <input type="number" id="tlf_medico" name="tlf_medico" required class="form-control" value="{{ $medico->tlf_medico }}">
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-3">
            <label for="" class="form-label">Usuario</label>
            <select id="id_usuario" name="id_usuario" required class="form-control" class="mb-3">
                <option value="" disabled selected>Seleccione</option>
                @foreach ( $usuarios as $usuario)
                    <option value="{{ $usuario->id }}" {{ $medico->id_usuario == $usuario->id ? 'selected' : '' }}>{{ $usuario->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
    <a href="/medicos" class="btn btn-secondary" tabindex="5">Cancelar</a>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop
