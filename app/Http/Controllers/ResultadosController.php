<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Resultado;
use App\Competencia;

class ResultadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $Resultados = Resultado::orderBy('id', 'DESC')->paginate(5);
        return view('Resultados.index')
                ->with('Resultados', $Resultados);
    }

  private function getCompetenciasSelect(){
        $CompetenciasModel = Competencia::all();
        $Competencias = ['' => 'Seleccione una competencia'];
        foreach ($CompetenciasModel as $Compet) {
            $Competencias[$Compet->id] = $Compet->Denominacion;
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
        $rl = new Resultado();

        return view('Resultados.create')
                ->with('Result', $rl)
                ->with('CompetOPC', $this->getCompetenciasSelect());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $Result = new Resultado($request->all());
       // dd($Result);
        if($Result->save()){
            return redirect('admin/Resultados');
        } else {
            return view('Resultados.create')
                ->with('Result', $rl)
                ->with('CompetOPC', $this->getCompetenciasSelect());
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
            $rl = Resultado::find($id);
        
        return view('Resultados.view')
                ->with('Result', $rl);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $rl = resultado::find($id);
        return view('Resultados.update')
                ->with('Result', $rl)
                ->with('CompetOPC', $this->getCompetenciasSelect());
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
        $Result = Resultado::find($id);
        $Result->Denominacion = $request->Denominacion;
        $Result->Id_competencia = $request->Id_competencia;
        $Result->Estado = $request->Estado;


        if($Result->save()){
            return redirect('admin/Resultados');
        } else {
            return view('Resultados.update')
                ->with('Result', $rl)
                ->with('CompetOPC', $this->getCompetenciasSelect());
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
         $rl = resultado::find($id);
        if($rl->delete()){
            return redirect('admin/Resultados');
        } else {
            throw new Exception("Error al eliminar el registro", 1);
            
        }
    }
}
