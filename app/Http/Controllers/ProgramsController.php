<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ProgramsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $programs = PorderBy('id_programa', 'ASC')->paginate(10);
        return view('program.index')
                ->with('program', $programs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    

        $prog = new program();

        return view('program.create')
                ->with('program', $prog);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prog = new program($request->all());
        if($prog->save()){
            return redirect('admin/program');
        } else {
            return view('program.create')
                ->with('program', $prog);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_programa)
    {
        $prog = Program::find($id_programa);
        
        return view('program.view')
                ->with('program', $prog);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_programa)
    {
        $prog = Program::find($id_programa);
        return view('program.update')
                ->with('program', $prog);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response

     'codigo','fecha_inicio','fecha_fin','dur_lectiva','dur_practica','justificacion','requisitos','descripcion','ocupaciones','resultados_practica','proyecto_fotmativo','url_proyecto_formativo','id_competencias'
     */
    public function update(Request $request, $id_programa)
    {

        $program = Program::find($id_programa);
        $program->nombre = $request->nombre;
        $program->version = $request->version;
        $program->codigo = $request->codigo;
        $program->requisitos = $request->requisitos;
        $program->estado = $request->estado;
        $program->fecha_inicio = $request->fecha_inicio;
        $program->fecha_fin = $request->fecha_fin;
        $program->dur_lectiva = $request->dur_lectiva;
        $program->dur_practica = $request->dur_practica;
        $program->justificacion = $request->justificacion;
        $program->descripcion = $request->descripcion;
        $program->ocupaciones = $request->ocupaciones;
        $program->resultados_practica = $request->resultados_practica;
        $program->proyecto_formativo = $request->proyecto_formativo;
        $program->url_proyecto_formativo = $request->url_proyecto_formativo;


        if($program->save()){
            return redirect('admin/program');
        } else {
            return view('program.update')
                ->with('program', $prog);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_programa)
    {
        $prog = Program::find($id_programa);
        if($prog->delete()){
            return redirect('admin/program');
        } else {
            throw new Exception("Error al eliminar el registro", 1);
            
        }
    }
}
