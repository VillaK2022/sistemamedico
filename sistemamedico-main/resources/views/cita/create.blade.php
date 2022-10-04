@extends('adminlte::page')

@section('title', 'Crear cita')

@section('content_header')
    <h1>Crear Cita</h1>
@stop

@section('content')
<form action="/citas" method="POST">
    @csrf
    <div class="mb-3">
        <label for="" class="form-label">Motivo de la consulta</label>
        <input type="text" id="razon_cita" name="razon_cita" required class="form-control" tabindex="1">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Fecha de la consulta</label>
        <input type="date" id="fecha_cita" name="fecha_cita" class="form-control" tabindex="1">
    </div>

    <div class="mb-3">
    <label for="" class="form-label">Paciente</label>
        <select id="id_paciente" name="id_paciente" required class="form-control" class="mb-3">
            @foreach ( $pacientes as $paciente)
                <option value="{{ $paciente->id }}">{{ $paciente->nombre_paciente }}</option>
            @endforeach
            
        </select>
    </div>
   
    <div class="mb-3">
        <label for="" class="form-label">Medico</label>
            <select id="id_medico" name="id_medico" required class="form-control" class="mb-3">
                @foreach ( $medicos as $medico)
                    <option value="{{ $medico->id }}">{{ $medico->nombre_medico }}</option>
                @endforeach
            </select>
    </div>

    

    <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
    <a href="/citas" class="btn btn-secondary" tabindex="5">Cancelar</a>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop