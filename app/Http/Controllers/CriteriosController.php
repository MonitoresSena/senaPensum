<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Resultado;
use App\Criterio;
class CriteriosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $Criterios = Criterio::orderBy('id', 'DESC')->paginate(5);
        return view('Criterios.index')
                ->with('Criterios', $Criterios);
    }

  private function getResultadoSelect(){
        $ResultadoModel = Resultado::all();
        $Resultados = ['' => 'Seleccione un Resulado de aprendizaje'];
        foreach ($ResultadoModel as $Result) {
            $Resultados[$Result->id] = $Result->Denominacion;
        }
        return $Resultados;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $ct = new Criterio();

        return view('Criterios.create')
                ->with('Crit', $ct)
                ->with('ResultOPC', $this->getResultadoSelect());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Crit = new Criterio($request->all());
       // dd($Result);
        if($Crit->save()){
            return redirect('admin/Criterios');
        } else {
            return view('Criterios.create')
                ->with('Crit', $ct)
                ->with('ResultOPC', $this->getResultadoSelect());
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
         $ct = Criterio::find($id);
        
        return view('Criterios.view')
                ->with('Crit', $ct);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $ct = Criterio::find($id);
        return view('Criterios.update')
                ->with('Crit', $ct)
                ->with('ResultOPC', $this->getResultadoSelect());
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
         $Crit = Criterio::find($id);
        $Crit->id = $request->id;
        $Crit->nombre = $request->nombre;
        $Crit->id_resultado = $request->id_resultado;
        $Crit->estado = $request->estado;


        if($Unid->save()){
            return redirect('admin/Criterios');
        } else {
            return view('Criterios.update')
                ->with('Crit', $ct)
                ->with('ResultOPC', $this->getResultadoSelect());
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
         $ct = Criterio::find($id);
        if($ct->delete()){
            return redirect('admin/Criterios');
        } else {
            throw new Exception("Error al eliminar el registro", 1);
            
        }
    }
}
