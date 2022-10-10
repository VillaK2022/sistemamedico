<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medico;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Auditoria;

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
        $medicos = Medico::whereNull('fechaeliminacion')->get();
        if (Auth::user()->rol == 1) {
            return view('medico.index')->with('medicos',$medicos)->with('user_rol', Auth::user()->rol);
        } else {
            return redirect('/');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios = User::where('rol', 2)->get();
        return view('medico.create')->with('usuarios', $usuarios);
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
        $medicos->id_usuario = $request->get('id_usuario');

        $medicos->save();

        $auditoria_medicos = new Auditoria();
            $auditoria_medicos->accion = 1;
            $auditoria_medicos->id_dato = $medicos->id;
            $auditoria_medicos->tabla = 'medicos';
            $auditoria_medicos->id_usuario = Auth::id();
        $auditoria_medicos->save();

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
        $usuarios = User::where('rol', 2)->get();
        return view('medico.edit')->with('medico', $medico)->with('usuarios', $usuarios);
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
        $medico->id_usuario = $request->get('id_usuario');

        $medico->save();
        $auditoria_medicos = new Auditoria();
            $auditoria_medicos->accion = 2;
            $auditoria_medicos->id_dato = $medico->id;
            $auditoria_medicos->tabla = 'medicos';
            $auditoria_medicos->id_usuario = Auth::id();
        $auditoria_medicos->save();

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
        $medico->fechaeliminacion = date("Y-m-d H:i:s");
        $medico->id_usuario_eliminacion = Auth::id();
        $medico->save();
       
        $auditoria_medicos = new Auditoria();
            $auditoria_medicos->accion = 3;
            $auditoria_medicos->id_dato = $medico->id;
            $auditoria_medicos->tabla = 'medicos';
            $auditoria_medicos->id_usuario = Auth::id();
        $auditoria_medicos->save();
        return  redirect('/medicos'); 
    }

    public function imprimir() {
        $medicos = Medico::whereNull('fechaeliminacion')->get();
        $pdf = Pdf::loadView('medico.pdf.medico', ["datos" => $medicos]);
        return $pdf->download('archivo.pdf');
    }
}
