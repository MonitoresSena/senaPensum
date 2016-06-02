<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\dllComProg;
use App\Program;
use App\Competencia;

class dllComProgController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $dllComProgs = dllComProg::orderBy('id', 'DESC')->paginate(5);
        return view('dllComProgs.index')
                ->with('dllComProgs', $dllComProgs);
    }


    private function getProgramSelect(){
        $ProgramModel = Program::all();
        $Programas = ['' => 'Seleccione un Programa'];
        foreach ($ProgramModel as $prog) {
            $Programas[$prog->id] = $prog->id;
        }
        return $Programas;
    }

     private function getCompetenciaSelect(){
        $CompetenciaModel = Competencia::all();
        $Competencias = ['' => 'Seleccione una competencia'];
        foreach ($CompetenciaModel as $Comp) {
            $Competencias[$Comp->id] = $Comp->id;
        }
        return $Competencias;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $dc = new dllComProg();

        return view('dllComProgs.create')
                ->with('ComProg', $dc)
                ->with('ProgOPC', $this->getProgramSelect())
                ->with('CompOPC', $this->getCompetenciaSelect());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ComProg = new dllComProg($request->all());
        if($ComProg->save()){
            return redirect('admin/dllComProgs');
        } else {
            return view('dllComProgs.create')
                ->with('ComProg', $dc)
                ->with('ProgOPC', $this->getProgramSelect())
                ->with('CompOPC', $this->getCompetenciaSelect());
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
          $dc = dllComProg::find($id);
        
        return view('dllComProgs.view')
                ->with('ComProg', $dc);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dc = dllComProg::find($id);
        return view('dllComProgs.update')
                ->with('ComProg', $dc)
                ->with('ProgOPC', $this->getProgramSelect())
                ->with('CompOPC', $this->getCompetenciaSelect());
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
        $ComProg = dllComProg::find($id);
        $ComProg->id_programa = $request->id_programa;
        $ComProg->id_competencia = $request->id_competencia;


        if($ComProg->save()){
            return redirect('admin/dllComProgs');
        } else {
            return view('dllComProgs.update')
                ->with('ComProg', $dc)
                ->with('ProgOPC', $this->getProgramSelect())
                ->with('CompOPC', $this->getCompetenciaSelect());
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
         $dc = dllComProg::find($id);
        if($dc->delete()){
            return redirect('admin/dllComProgs');
        } else {
            throw new Exception("Error al eliminar el registro", 1);
            
        }
    }
}
