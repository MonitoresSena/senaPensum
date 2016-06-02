<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Program;

class ProgramsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $programs = Program::OrderBy('id', 'ASC')->paginate(10);
        return view('programs.index')
                ->with('programs', $programs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    

        $prog = new program();
        $areasM = \App\Area::all();
        $areas = [];
        foreach($areasM AS $a){ $areas[$a->id] = $a->nombre; }
        
        return view('programs.create')
                ->with('prog', $prog)
                ->with('areas', $areas);
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
            
            $dll = new \App\Dllareaprog();
            $dll->id_area = $request->area;
            $dll->id_programa = $prog->id;
            $dll->save();
            
            return redirect('admin/programs');
        } else {
            return view('programs.create')
                ->with('prog', $prog);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prog = Program::find($id);
        return view('programs.view')
                ->with('prog', $prog);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prog = Program::find($id);
        return view('programs.update')
                ->with('prog', $prog);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response

     'codigo','fecha_inicio','fecha_fin','dur_lectiva','dur_practica','justificacion','requisitos','descripcion','ocupaciones','resultados_practica','proyecto_fotmativo','url_proyecto_formativo','id_competencias'
     */
    public function update(Request $request, $id)
    {

        $prog = Program::find($id);
        $prog->nombre = $request->nombre;
        $prog->version = $request->version;
        $prog->codigo = $request->codigo;
        $prog->requisitos = $request->requisitos;
        $prog->estado = $request->estado;
        $prog->fecha_inicio = $request->fecha_inicio;
        $prog->fecha_fin = $request->fecha_fin;
        $prog->dur_lectiva = $request->dur_lectiva;
        $prog->dur_productiva = $request->dur_productiva;
        $prog->justificacion = $request->justificacion;
        $prog->descripcion = $request->descripcion;
        $prog->ocupaciones = $request->ocupaciones;
        $prog->resultados_practica = $request->resultados_practica;
        $prog->proyecto_formativo = $request->proyecto_formativo;
        $prog->url_proyecto_formativo = $request->url_proyecto_formativo;


        if($prog->save()){
            return redirect('admin/programs');
        } else {
            return view('programs.update')
                ->with('prog', $prog);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prog = Program::find($id);
        if($prog->delete()){
            return redirect('admin/programs');
        } else {
            throw new Exception("Error al eliminar el registro", 1);
            
        }
    }
}
