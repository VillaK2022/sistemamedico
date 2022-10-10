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
    @if ($user_rol == 1)
        <div class="mb-3">
        <label for="" class="form-label">Paciente</label>
            <select id="id_paciente" name="id_paciente" required class="form-control" class="mb-3">
                @foreach ( $pacientes as $paciente)
                    <option value="{{ $paciente->id }}" {{ $paciente->id == $cita->id_paciente ? 'selected' : ''}}>{{ $paciente->nombre_paciente }}</option>
                @endforeach
                
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Medico</label>
                <select id="id_medico" name="id_medico" required class="form-control" class="mb-3">
                    @foreach ( $medicos as $medico)
                        <option value="{{ $medico->id }}" {{ $medico->id == $cita->id_medico ? 'selected' : ''}}>{{ $medico->nombre_medico }}</option>
                    @endforeach
                </select>
        </div>
    @else
        <div class="mb-3">
            <label for="" class="form-label">Paciente</label>
            <select id="id_paciente" name="id_paciente" required class="form-control" class="mb-3">
                @foreach ( $pacientes as $paciente)
                    @if ($paciente->id == $cita->id_paciente)
                        <option value="{{ $paciente->id }}" selected>{{ $paciente->nombre_paciente }}</option>
                    @endif
                @endforeach
                
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Medico</label>
                <select id="id_medico" name="id_medico" required class="form-control" class="mb-3">
                    @foreach ( $medicos as $medico)
                        @if ($medico->id == $cita->id_medico)
                            <option value="{{ $medico->id}}" selected>{{ $medico->nombre_medico }}</option>
                        @endif
                    @endforeach
                </select>
        </div>
    @endif

    
    <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
    <a href="/citas" class="btn btn-secondary" tabindex="5">Cancelar</a>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop
