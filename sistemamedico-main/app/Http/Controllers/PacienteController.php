<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;

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
        $pacientes = Paciente::all();
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
        //
    }
}
