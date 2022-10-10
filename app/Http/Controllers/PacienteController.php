<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Auditoria;

class PacienteController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $pacientes = Paciente::whereNull('fechaeliminacion')->get();
        return view('paciente.index')->with('pacientes',$pacientes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('paciente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pacientes = new Paciente();

        $pacientes->apellidop_paciente = $request->get('apellidop_paciente');
        $pacientes->apellidom_paciente = $request->get('apellidom_paciente');
        $pacientes->nombre_paciente = $request->get('nombre_paciente');
        $pacientes->fechanac_paciente = $request->get('fechanac_paciente');
        $pacientes->ecivil_paciente = $request->get('ecivil_paciente');
        $pacientes->tlf_paciente = $request->get('tlf_paciente');
        $pacientes->ocupacion_paciente = $request->get('ocupacion_paciente');
        $pacientes->resid_paciente = $request->get('resid_paciente');
        $pacientes->nhistoria_paciente = $request->get('nhistoria_paciente');
        $pacientes->cedula_paciente = $request->get('cedula_paciente');
        $pacientes->save();

        $auditoria_pacientes = new Auditoria();
            $auditoria_pacientes->accion = 1;
            $auditoria_pacientes->id_dato = $pacientes->id;
            $auditoria_pacientes->tabla = 'pacientes';
            $auditoria_pacientes->id_usuario = Auth::id();
        $auditoria_pacientes->save();

        return  redirect('/pacientes');
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
        $paciente = Paciente::find($id);
        return view('paciente.edit')->with('paciente', $paciente);
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
        $paciente = Paciente::find($id);

        $paciente->apellidop_paciente = $request->get('apellidop_paciente');
        $paciente->apellidom_paciente = $request->get('apellidom_paciente');
        $paciente->nombre_paciente = $request->get('nombre_paciente');
        $paciente->fechanac_paciente = $request->get('fechanac_paciente');
        $paciente->ecivil_paciente = $request->get('ecivil_paciente');
        $paciente->tlf_paciente = $request->get('tlf_paciente');
        $paciente->ocupacion_paciente = $request->get('ocupacion_paciente');
        $paciente->resid_paciente = $request->get('resid_paciente');
        $paciente->nhistoria_paciente = $request->get('nhistoria_paciente');
        $paciente->cedula_paciente = $request->get('cedula_paciente');
        $paciente->save();

        $auditoria_pacientes = new Auditoria();
            $auditoria_pacientes->accion = 2;
            $auditoria_pacientes->id_dato = $paciente->id;
            $auditoria_pacientes->tabla = 'pacientes';
            $auditoria_pacientes->id_usuario = Auth::id();
        $auditoria_pacientes->save();

        return  redirect('/pacientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paciente = Paciente::find($id);
        $paciente->fechaeliminacion = date("Y-m-d H:i:s");
        $paciente->id_usuario_eliminacion = Auth::id();
        $paciente->save();
       
        $auditoria_pacientes = new Auditoria();
            $auditoria_pacientes->accion = 3;
            $auditoria_pacientes->id_dato = $paciente->id;
            $auditoria_pacientes->tabla = 'paciente';
            $auditoria_pacientes->id_usuario = Auth::id();
        $auditoria_pacientes->save();
        return  redirect('/pacientes'); 
    }

    public function imprimir() {
        $pacientes = Paciente::whereNull('fechaeliminacion')->get();
        $pdf = Pdf::loadView('paciente.pdf.paciente', ["datos" => $pacientes]);
        return $pdf->download('archivo.pdf');
    }

    public function index2()
    {
        $pacientes = Paciente::whereNull('fechaeliminacion')->get();
        return view('inicio.index')->with('pacientes', $pacientes);
    }

    public function buscarCedula (Request $request) {
        $paciente = Paciente::whereRaw('cedula_paciente LIKE ?', ["%".$request->get('cedula_paciente')."%"])->first();
        if ($paciente) {
            return view('paciente.find')->with('paciente', $paciente);
        }else{
        return view('paciente.create')->with('paciente', $request->get('cedula_paciente'));
        }

    }

    public function index2()
    {
        return view('inicio.index');
    }

    public function buscarCedula (Request $request) {
        $paciente = Paciente::whereRaw('cedula_paciente LIKE ?', ["%".$request->get('cedula_paciente')."%"])->first();
        if ($paciente) {
            return view('paciente.find')->with('paciente', $paciente);
        }else{
        return view('paciente.create')->with('paciente', $request->get('cedula_paciente'));
        }
    }
}
