<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ComInst;
use App\Instructor;
use App\Competencia;

class dllComInstsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $dllComInsts = ComInst::orderBy('id', 'DESC')->paginate(5);
        return view('dllComInsts.index')
                ->with('dllComInsts', $dllComInsts);
    }


    private function getInstructorSelect(){
        $InstModel = Instructor::all();
        $Instructores = ['' => 'Seleccione un Instructor'];
        foreach ($InstModel as $Inst) {
            $Instructores[$Inst->id] = $Inst->id;
        }
        return $Instructores;
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
      $dp = new ComInst();

        return view('dllComInsts.create')
                ->with('ComInstruct', $dp)
                ->with('InstOPC', $this->getInstructorSelect())
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
       $ComInstruct = new ComInst($request->all());
        if($ComInstruct->save()){
            return redirect('admin/dllComInsts');
        } else {
            return view('dllComInsts.create')
                ->with('ComInstruct', $dp)
                ->with('InstOPC', $this->getInstructorSelect())
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
         $dp = ComInst::find($id);
        
        return view('dllComInsts.view')
                ->with('ComInstruct', $dp);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $dp = ComInst::find($id);
        return view('dllComInsts.update')
                ->with('ComInstruct', $dp)
                ->with('InstOPC', $this->getInstructorSelect())
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
        $ComInstruct = ComInst::find($id);
        $ComInstruct->id_instructor = $request->id_instructor;
        $ComInstruct->id_competencia = $request->id_competencia;


        if($ComInstruct->save()){
            return redirect('admin/dllComInsts');
        } else {
            return view('dllComInsts.update')
                ->with('ComInstruct', $dp)
                ->with('InstOPC', $this->getInstructorSelect())
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
     $dp = ComInst::find($id);
        if($dp->delete()){
            return redirect('admin/dllComInsts');
        } else {
            throw new Exception("Error al eliminar el registro", 1);
            
        }
    }
}
