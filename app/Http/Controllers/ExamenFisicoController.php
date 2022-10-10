<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Models\ExamenFisico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Auditoria;
class ExamenFisicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $paciente = Paciente::find($id)->whereNull('fechaeliminacion')->first();
        return view ('examenfisico/index')->with('paciente', $paciente);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $examenfisico = new ExamenFisico();

        $examenfisico->parterial_exfisico = $request->get('parterial_exfisico');
        $examenfisico->temperatura_exfisico = $request->get('temperatura_exfisico');
        $examenfisico->frespiratoria_exfisico = $request->get('frespiratoria_exfisico');
        $examenfisico->fcardiaca_exfisico = $request->get('fcardiaca_exfisico');
        $examenfisico->peso_exfisico = $request->get('peso_exfisico');
        $examenfisico->altura_exfisico = $request->get('altura_exfisico');
        $examenfisico->id_paciente = $request->get('id_paciente');
       
        $examenfisico->save();

        $auditoria_examenfisico = new Auditoria();
            $auditoria_examenfisico->accion = 1;
            $auditoria_examenfisico->id_dato = $examenfisico->id;
            $auditoria_examenfisico->tabla = 'examenfisico';
            $auditoria_examenfisico->id_usuario = Auth::id();
        $auditoria_examenfisico->save();

        return  redirect('/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function imprimir() {
        $examenfisicos = ExamenFisico::whereNull('fechaeliminacion')->get();
        $pdf = Pdf::loadView('examenfisico.pdf.examenfisico', ["datos" => $examenfisicos]);
        return $pdf->download('archivo.pdf');
    }
}
