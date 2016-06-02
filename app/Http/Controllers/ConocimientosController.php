<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Conocimiento;
use App\Unidad;
use App\Proceso;

class ConocimientosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $Conocimientos = Conocimiento::orderBy('id', 'DESC')
                ->paginate(5);
        return view('Conocimientos.index')
                ->with('Conocimientos', $Conocimientos);
    }

    private function getProcesoSelect(){
        $ProcesoModel = Proceso::all();
        $Procesos = ['' => 'Seleccione un Proceso'];
        foreach ($ProcesoModel as $Proc) {
            $Procesos[$Proc->id] = $Proc->nombre;
        }
        return $Procesos;
    }


    private function getUnidadSelect(){
        $UnidadesModel = Unidad::all();
        $Unidades = ['' => 'Seleccione una unidad'];
        foreach ($UnidadesModel as $Unid) {
            $Unidades[$Unid->id] = $Unid->nombre;
        }
        return $Unidades;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cn = new Conocimiento();

        return view('Conocimientos.create')
                ->with('Conoc', $cn)
                ->with('ProcOPC', $this->getProcesoSelect())
                ->with('UnidOPC', $this->getUnidadSelect());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Conoc = new Conocimiento($request->all());
       // dd($Result);
        if($Conoc->save()){
            return redirect('admin/Conocimientos');
        } else {
            return view('Conocimientos.create')
                ->with('Unid', $cn)
                ->with('ProcOPC', $this->getProcesoSelect())
                ->with('UnidOPC', $this->getUnidadSelect());
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
         $cn = Conocimiento::find($id);
        
        return view('Conocimientos.view')
                ->with('Conoc', $cn);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $cn = Conocimiento::find($id);
        return view('Conocimientos.update')
                ->with('Conoc', $cn)
                ->with('ProcOPC', $this->getProcesoSelect())
                ->with('UnidOPC', $this->getUnidadSelect());
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
        $Conoc = Conocimiento::find($id);
        $Conoc->id = $request->id;
        $Conoc->nombre = $request->nombre;
        $Conoc->descripcion = $request->descripcion;
        $Conoc->id_proceso = $request->id_proceso;
        $Conoc->id_unidad = $request->id_unidad;
        $Conoc->estado = $request->estado;



        if($Conoc->save()){
            return redirect('admin/Conocimientos');
        } else {
            return view('Conocimientos.update')
                ->with('Conoc', $cn)
                ->with('ProcOPC', $this->getProcesoSelect())
                ->with('UnidOPC', $this->getUnidadSelect());
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
      $cn = Conocimiento::find($id);
        if($cn->delete()){
            return redirect('admin/Conocimientos');
        } else {
            throw new Exception("Error al eliminar el registro", 1);
            
        }    }
}
