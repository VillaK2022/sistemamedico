@extends('adminlte::page')

@section('title', 'Atención al paciente')

@section('content_header')
    <h1>Atender paciente</h1>
@stop

@section('content')
<form action="/atencion/registrar" method="POST">
    @csrf
    @method('POST')
    @if ($ultim_examen)
    <input type="hidden" id="id_citas" name="id_citas" value="{{ $cita->id }}">
    <div class="row">
        <div class="mb-3">
            <label for="" class="form-label">Precion Arterial</label>
            <input type="text" id="parterial_exfisico" readonly name="parterial_exfisico" required class="form-control" value="{{ $ultim_examen->parterial_exfisico }}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Temperatura</label>
            <input type="text" id="temperatura_exfisico" readonly name="temperatura_exfisico" required class="form-control" value="{{ $ultim_examen->temperatura_exfisico }}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Frecuencia Cardiaca </label>
            <input type="text" id="fcardiaca_exfisico" readonly name="fcardiaca_exfisico" required class="form-control" value="{{ $ultim_examen->fcardiaca_exfisico }}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Frecuencia Respiratoria </label>
            <input type="text" id="frespiratoria_exfisico" readonly name="frespiratoria_exfisico" required class="form-control" value="{{ $ultim_examen->frespiratoria_exfisico }}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Peso</label>
            <input type="text" id="peso_exfisico" readonly name="peso_exfisico" required class="form-control" value="{{ $ultim_examen->peso_exfisico }}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Altura</label>
            <input type="text" id="altura_exfisico" readonly name="altura_exfisico" required class="form-control" value="{{ $ultim_examen->altura_exfisico }}">
        </div>
    </div>
    @else
        <h1>No tuvo examen fisico</h1>
    @endif
    <h1>Diagnostico</h1>
    <div class="row">
        
            <div class="mb-3">
                <label for="" class="form-label">Enfermedad</label>
                <input type="text" id="enfermedad_diagnostico" name="enfermedad_diagnostico" required class="form-control" value="{{ $cita->enfermedad_diagnostico }}">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Sintomas</label>
                <input type="text" id="sinstomas_diagnostico" name="sinstomas_diagnostico" required class="form-control" value="{{ $cita->sinstomas_diagnostico }}">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Tratamientos</label>
                <input type="text" id="tratamiento_diagnostico" name="tratamiento_diagnostico" required class="form-control" value="{{ $cita->tratamiento_diagnostico }}">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Examenes</label>
                <input type="text" id="examenes_diagnostico" name="examenes_diagnostico" required class="form-control" value="{{ $cita->examenes_diagnostico }}">
            </div>

        
    </div>

    <h1>Receta</h1>
    <div class="row">
        
            <div class="mb-3">
                <label for="" class="form-label">Medicamento</label>
                <input type="text" id="medicamento_receta" name="medicamento_receta" required class="form-control" value="">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Presentación</label>
                <input type="text" id="presentacion_receta" name="presentacion_receta" required class="form-control">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Dosis</label>
                <input type="text" id="dosis_receta" name="dosis_receta" required class="form-control" >
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Duración</label>
                <input type="text" id="duracion_receta" name="duracion_receta" required class="form-control">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Cantidad</label>
                <input type="text" id="cantidad_receta" name="cantidad_receta" required class="form-control">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Uso</label>
                <input type="text" id="uso_receta" name="uso_receta" required class="form-control">
            </div>

        
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
