<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Proceso;
class ProcesosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Procesos = Proceso::orderBy('id', 'DESC')
                ->paginate(5);
        return view('Procesos.index')
                ->with('Procesos', $Procesos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Proc = new Proceso();
        return view('Procesos.create')
                ->with('Proc', $Proc);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $Proc = new Proceso($request->all());
        if($Proc->save()){
            return redirect('admin/Procesos');
        }else{
            return view('Procesos.index')
                ->with('Procesos', $Procesos);
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
         $Proc = Proceso::find($id);
        return view('Procesos.view')
                ->with('Proc', $Proc);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $Proc = Proceso::find($id);
        return view('Procesos.update')
                ->with('Proc', $Proc);
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
        $Proc = Proceso::find($id);
        $Proc->nombre = $request->nombre;
        $Proc->id_resultado = $request->id_resultado;
        $Proc->estado = $request->estado;

        if($Proc->save()){
            return redirect('admin/Procesos');
        }else{
            return view('Procesis.index')
                ->with('Procesos', $Procesos);
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
         $Proc = Proceso::find($id);
        
        if($Proc->delete()){
            return redirect('admin/Procesos');
        }else{
            throw new Exception("Error al eliminar el registro", 1);
            
        }
    }
}
