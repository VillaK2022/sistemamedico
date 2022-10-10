<?php

namespace App\Http\Controllers;
use App\Models\Cita;
use App\Models\ExamenFisico;
use App\Models\Consulta;
use App\Models\Diagnostico;
use App\Models\Receta;
use App\Models\RecetaDetalle;
use App\Models\Auditoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AtencionController extends Controller
{
    public function index($id)
    {
        $cita = Cita::find($id);
        $ultim_examen = ExamenFisico::whereNull('fechaeliminacion')->where('id_paciente', $cita->id_paciente)->orderBy('id', 'DESC')->first();
        return view ('cita/atencion')->with('cita', $cita)->with('ultim_examen', $ultim_examen);
    }

    public function store(Request $request)
    {
        $cita = Cita::find($request->get('id_citas'));
            $cita->estado = 1;
        $cita->save();

        $auditoria_cita = new Auditoria();
            $auditoria_cita->accion = 2;
            $auditoria_cita->id_dato = $cita->id;
            $auditoria_cita->tabla = 'citas';
            $auditoria_cita->modificaciones = '(estado = 0, estado = 1)';
            $auditoria_cita->id_usuario = Auth::id();
        $auditoria_cita->save();
        
        $consultas = new Consulta();
            $consultas->id_paciente = $cita->id_paciente;
            $consultas->id_medico = $cita->id_medico;
            $consultas->fechareg_consulta = date("Y-m-d H:i:s");
        $consultas->save();

        $auditoria_consultas = new Auditoria();
            $auditoria_consultas->accion = 1;
            $auditoria_consultas->id_dato = $consultas->id;
            $auditoria_consultas->tabla = 'consultas';
            $auditoria_consultas->id_usuario = Auth::id();
        $auditoria_consultas->save();

        $diagnostico = new Diagnostico();
            $diagnostico->enfermedad_diagnostico = $request->get('enfermedad_diagnostico');
            $diagnostico->sinstomas_diagnostico = $request->get('sinstomas_diagnostico');
            $diagnostico->tratamiento_diagnostico = $request->get('tratamiento_diagnostico');
            $diagnostico->examenes_diagnostico = $request->get('examenes_diagnostico');
            $diagnostico->nro_consulta = $consultas->id;
            $diagnostico->id_consulta = $consultas->id;
        $diagnostico->save();

        $auditoria_diagnostico = new Auditoria();
            $auditoria_diagnostico->accion = 1;
            $auditoria_diagnostico->id_dato = $diagnostico->id;
            $auditoria_diagnostico->tabla = 'diagnosticos';
            $auditoria_diagnostico->id_usuario = Auth::id();
        $auditoria_diagnostico->save();

        $recetas = new Receta();
            $recetas->id_paciente = $cita->id_paciente;
            $recetas->id_medico = $cita->id_medico;
        $recetas->save();

        $auditoria_receta = new Auditoria();
            $auditoria_receta->accion = 1;
            $auditoria_receta->id_dato = $recetas->id;
            $auditoria_receta->tabla = 'recetas';
            $auditoria_receta->id_usuario = Auth::id();
        $auditoria_receta->save();

        $recetas_detalle = new RecetaDetalle();
            $recetas_detalle->medicamento_receta = $request->get('medicamento_receta');
            $recetas_detalle->presentacion_receta = $request->get('presentacion_receta');
            $recetas_detalle->dosis_receta = $request->get('dosis_receta');
            $recetas_detalle->duracion_receta = $request->get('duracion_receta');
            $recetas_detalle->cantidad_receta = $request->get('cantidad_receta');
            $recetas_detalle->uso_receta = $request->get('uso_receta');
            $recetas_detalle->id_receta = $recetas->id;
        $recetas_detalle->save();

        $auditoria_recetas_detalle = new Auditoria();
            $auditoria_recetas_detalle->accion = 1;
            $auditoria_recetas_detalle->id_dato = $recetas_detalle->id;
            $auditoria_recetas_detalle->tabla = 'recetas_detalles';
            $auditoria_recetas_detalle->id_usuario = Auth::id();
        $auditoria_recetas_detalle->save();

        return  redirect('/index');
    }
}
