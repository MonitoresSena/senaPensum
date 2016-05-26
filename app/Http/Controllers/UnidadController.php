<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Unidad;
use App\Resultado;

class UnidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $Unidades = Unidad::orderBy('id', 'DESC')->paginate(5);
        return view('Unidades.index')
                ->with('Unidades', $Unidades);
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
        $ud = new Unidad();

        return view('Unidades.create')
                ->with('Unid', $ud)
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
        $Unid = new Unidad($request->all());
       // dd($Result);
        if($Unid->save()){
            return redirect('admin/Unidades');
        } else {
            return view('Unidades.create')
                ->with('Unid', $ud)
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
         $ud = Unidad::find($id);
        
        return view('Unidades.view')
                ->with('Unid', $ud);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $ud = Unidad::find($id);
        return view('Unidades.update')
                ->with('Unid', $ud)
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
          $Unid = Unidad::find($id);
        $Unid->id = $request->id;
        $Unid->nombre = $request->nombre;
        $Unid->id_resultado = $request->id_resultado;


        if($Unid->save()){
            return redirect('admin/Unidades');
        } else {
            return view('Unidades.update')
                ->with('Unid', $ud)
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
          $ud = Unidad::find($id);
        if($ud->delete()){
            return redirect('admin/Unidades');
        } else {
            throw new Exception("Error al eliminar el registro", 1);
            
        }
    }
}
