@extends('adminlte::page')

@section('title', 'Editar cita')

@section('content_header')
    <h1>Editar cita</h1>
@stop

@section('content')
<form action="/citas/{{ $cita->id }}" method="POST">
    @csrf
    @method('PUT')
    
    <div class="mb-3">
        <label for="" class="form-label">Motivo de la consulta</label>
        <input type="text" id="razon_cita" name="razon_cita" required class="form-control" value="{{ $cita->razon_cita }}">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Fecha de la consulta</label>
        <input type="date" id="fecha_cita" name="fecha_cita" required class="form-control" value="{{ $cita->fecha_cita }}">
    </div>

    <div class="mb-3">
    <label for="" class="form-label">Paciente</label>
        <select id="id_paciente" name="id_paciente" required class="form-control" class="mb-3" value="{{ $cita->id_paciente }}" >
            
            <option value="1">Casado</option>
            <option value="2">Soltero</option>
            <option value="3">Divorciado</option>
            <option value="4">Viudo</option>
        </select>
    </div>
    
    <div class="mb-3">
        <label for="" class="form-label">Medico</label>
            <select id="id_medico" name="id_medico" required class="form-control" class="mb-3" value="{{ $cita->id_medico }}" >
                
                <option value="1">Casado</option>
                <option value="2">Soltero</option>
                <option value="3">Divorciado</option>
                <option value="4">Viudo</option>
            </select>
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
