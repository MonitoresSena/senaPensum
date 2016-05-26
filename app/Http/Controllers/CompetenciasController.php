<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Competencia;

class CompetenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $Competencias = Competencia::orderBy('id', 'DESC')
                ->paginate(5);
        return view('Competencias.index')
                ->with('Competencias', $Competencias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    $Compet = new Competencia();
        return view('Competencias.create')
                ->with('Compet', $Compet);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $Compet = new Competencia($request->all());
        if($Compet->save()){
            return redirect('admin/Competencias');
        }else{
            return view('Competencias.index')
                ->with('Competencias', $Competencias);
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
             $Compet = Competencia::find($id);
        return view('Competencias.view')
                ->with('Compet', $Compet);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Compet = Competencia::find($id);
        return view('Competencias.update')
                ->with('Compet', $Compet);
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
          $Compet = Competencia::find($id);
        $Compet->Codigo = $request->Codigo;	
        $Compet->Denominacion = $request->Denominacion;
        $Compet->Duracion = $request->Duracion;
        $Compet->Estado = $request->Estado;

        if($Compet->save()){
            return redirect('admin/Competencias');
        }else{
            return view('Competencias.index')
                ->with('Competencias', $Competencias);
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
        
          $Compet = Competencia::find($id);
        
        if($Compet->delete()){
            return redirect('admin/Competencias');
        }else{
            throw new Exception("Error al eliminar el registro", 1);
            
        }
    }
}
