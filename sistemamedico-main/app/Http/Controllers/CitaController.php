<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;
use App\Models\Paciente;
use App\Models\Medico;
class CitaController extends Controller
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
        $medicos = Medico::all();
        $citas = Cita::all();
        return view('cita.index')->with('pacientes',$pacientes)->with('medicos',$medicos)->with('citas',$citas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pacientes = Paciente::all();
        $medicos = Medico::all();
        $citas = Cita::all();
        return view('cita.create')->with('pacientes',$pacientes)->with('medicos',$medicos)->with('citas',$citas);
        
       
    
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $citas = new Cita();

        $citas->razon_cita = $request->get('razon_cita');
        $citas->fecha_cita = $request->get('fecha_cita');
        $citas->id_paciente = $request->get('id_paciente');
        $citas->id_medico = $request->get('id_medico');

        $citas->save();

        return  redirect('/citas');
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
        $cita = Cita::find($id);
        return view('cita.edit')->with('cita', $cita);
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
        $cita =  Cita::find($id);

        $cita->razon_cita = $request->get('razon_cita');
        $cita->fecha_cita = $request->get('fecha_cita');
        $cita->id_paciente = $request->get('id_paciente');
        $cita->id_medico = $request->get('id_medico');

        $cita->save();

        return  redirect('/citas'); 
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
