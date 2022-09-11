<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medico;

class MedicoController extends Controller
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
        $medicos = Medico::all();
        return view('medico.index')->with('medicos',$medicos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('medico.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $medicos = new Medico();

        $medicos->apellidop_medico = $request->get('apellidop_medico');
        $medicos->apellidom_medico = $request->get('apellidom_medico');
        $medicos->nombre_medico = $request->get('nombre_medico');
        $medicos->cedula_medico = $request->get('cedula_medico');
        $medicos->tlf_medico = $request->get('tlf_medico');

        $medicos->save();

        return  redirect('/medicos');


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
        $medico = Medico::find($id);
        return view('medico.edit')->with('medico', $medico);
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
        $medico =  Medico::find($id);

        $medico->apellidop_medico = $request->get('apellidop_medico');
        $medico->apellidom_medico = $request->get('apellidom_medico');
        $medico->nombre_medico = $request->get('nombre_medico');
        $medico->cedula_medico = $request->get('cedula_medico');
        $medico->tlf_medico = $request->get('tlf_medico');

        $medico->save();

        return  redirect('/medicos'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $medico = Medico::find($id);
        $medico->delete();
        return  redirect('/medicos'); 
    }
}
