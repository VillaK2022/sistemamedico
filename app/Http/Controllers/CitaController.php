<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Cita;
use App\Models\Paciente;
use App\Models\Medico;
use App\Models\Auditoria;
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
        if (Auth::user()->rol == 3 or Auth::user()->rol == 1) {
            $sql = "SELECT c.id, c.fecha_cita, c.razon_cita, c.created_at, m.nombre_medico, m.apellidom_medico, p.nombre_paciente, p.apellidom_paciente, c.estado
            FROM citas c
            INNER JOIN medicos m ON m.id = c.id_medico
            INNER JOIN pacientes p ON p.id = c.id_paciente
            WHERE c.fechaeliminacion is null and m.fechaeliminacion is null
            and p.fechaeliminacion is null";
            $citas = DB::select($sql);
            return view('cita.index')->with('citas',$citas)->with('user_rol', Auth::user()->rol);
        }else if (Auth::user()->rol == 2 ){
            $sql = "SELECT c.id, c.fecha_cita, c.razon_cita, c.created_at, m.nombre_medico, m.apellidom_medico, p.nombre_paciente, p.apellidom_paciente, c.estado
            FROM citas c
            INNER JOIN medicos m ON m.id = c.id_medico
            INNER JOIN pacientes p ON p.id = c.id_paciente
            WHERE c.fechaeliminacion is null and m.fechaeliminacion is null
             and p.fechaeliminacion is null and m.id_usuario = " . Auth::id() ;
            $citas = DB::select($sql);
            return view('cita.index')->with('citas',$citas)->with('user_rol', Auth::user()->rol);
        }
        else{
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

        $auditoria_citas = new Auditoria();
            $auditoria_citas->accion = 1;
            $auditoria_citas->id_dato = $citas->id;
            $auditoria_citas->tabla = 'citas';
            $auditoria_citas->id_usuario = Auth::id();
        $auditoria_citas->save();

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
        $pacientes = Paciente::all();
        $medicos = Medico::all();
        return view('cita.edit')->with('cita', $cita)->with('user_rol', Auth::user()->rol)->with('pacientes',$pacientes)->with('medicos',$medicos);
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
        $auditoria_citas = new Auditoria();
            $auditoria_citas->accion = 2;
            $auditoria_citas->id_dato = $cita->id;
            $auditoria_citas->tabla = 'citas';
            $auditoria_citas->id_usuario = Auth::id();
        $auditoria_citas->save();
        

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
        $cita = Cita::find($id);
        $cita->fechaeliminacion = date("Y-m-d H:i:s");
        $cita->id_usuario_eliminacion = Auth::id();
        $cita->save();
       
        $auditoria_citas = new Auditoria();
            $auditoria_citas->accion = 3;
            $auditoria_citas->id_dato = $cita->id;
            $auditoria_citas->tabla = 'citas';
            $auditoria_citas->id_usuario = Auth::id();
        $auditoria_citas->save();
        return  redirect('/citas'); 
        
    }
    public function imprimir() {
        $citas = Cita::whereNull('fechaeliminacion')->get();
        $pdf = Pdf::loadView('cita.pdf.cita', ["datos" => $citas]);
        return $pdf->download('archivo.pdf');
    }
}
