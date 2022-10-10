<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enfermero;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Auditoria;
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
        $enfermeros = Enfermero::whereNull('fechaeliminacion')->get();
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

        $auditoria_enfermeros = new Auditoria();
            $auditoria_enfermeros->accion = 1;
            $auditoria_enfermeros->id_dato = $enfermeros->id;
            $auditoria_enfermeros->tabla = 'enfermeros';
            $auditoria_enfermeros->id_usuario = Auth::id();
        $auditoria_enfermeros->save();

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

        $auditoria_enfermeros = new Auditoria();
            $auditoria_enfermeros->accion = 2;
            $auditoria_enfermeros->id_dato = $enfermero->id;
            $auditoria_enfermeros->tabla = 'enfermeros';
            $auditoria_enfermeros->id_usuario = Auth::id();
        $auditoria_enfermeros->save();

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
        $enfermero = Enfermero::find($id);
        $enfermero->fechaeliminacion = date("Y-m-d H:i:s");
        $enfermero->id_usuario_eliminacion = Auth::id();
        $enfermero->save();
       
        $auditoria_enfermeros = new Auditoria();
            $auditoria_enfermeros->accion = 3;
            $auditoria_enfermeros->id_dato = $enfermero->id;
            $auditoria_enfermeros->tabla = 'enfermeros';
            $auditoria_enfermeros->id_usuario = Auth::id();
        $auditoria_enfermeros->save();
        return  redirect('/enfermeros'); 
    }
    public function imprimir() {
        $enfermeros = Enfermero::whereNull('fechaeliminacion')->get();
        $pdf = Pdf::loadView('enfermero.pdf.enfermero', ["datos" => $enfermeros]);
        return $pdf->download('archivo.pdf');
    }

}
