<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enfermero;

class EnfermeroController extends Controller
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
        $enfermeros = Enfermero::all();
        return view('Enfermero.index')->with('enfermeros',$enfermeros);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('enfermero.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $enfermeros = new Enfermero();

        $enfermeros->apellidop_enfermera = $request->get('apellidop_enfermera');
        $enfermeros->apellidom_enfermera = $request->get('apellidom_enfermera');
        $enfermeros->nombre_enfermera = $request->get('nombre_enfermera');
        $enfermeros->cedula_enfermera = $request->get('cedula_enfermera');
        $enfermeros->tlf_enfermera = $request->get('tlf_enfermera');

        $enfermeros->save();

        return  redirect('/enfermeros');
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
        $enfermero = Enfermero::find($id);
        return view('enfermero.edit')->with('enfermero', $enfermero);
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
        $enfermero =  Enfermero::find($id);

        $enfermero->apellidop_enfermera = $request->get('apellidop_enfermera');
        $enfermero->apellidom_enfermera = $request->get('apellidom_enfermera');
        $enfermero->nombre_enfermera = $request->get('nombre_enfermera');
        $enfermero->cedula_enfermera = $request->get('cedula_enfermera');
        $enfermero->tlf_enfermera = $request->get('tlf_enfermera');

        $enfermero->save();

        return  redirect('/enfermeros'); 
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
