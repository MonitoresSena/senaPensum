<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Instructor;

class InstructoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Instructores = Instructor::orderBy('id', 'DESC')
                ->paginate(5);
        return view('instructores.index')
                ->with('Instructores', $Instructores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Instruct = new Instructor();
        return view('Instructores.create')
                ->with('Instruct', $Instruct);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Instruct = new Instructor($request->all());
        if($Instruct->save()){
            return redirect('admin/Instructores');
        }else{
            return view('Instructores.index')
                ->with('Instructores', $Instructores);
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
        $Instruct = Instructor::find($id);
        return view('Instructores.view')
                ->with('Instruct', $Instruct);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Instruct = Instructor::find($id);
        return view('Instructores.update')
                ->with('Instruct', $Instruct);
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
       $Instruct = Instructor::find($id);
        $Instruct->Nombre = $request->Nombre;
        $Instruct->Apellido = $request->Apellido;
        $Instruct->Identificacion = $request->Identificacion;
        $Instruct->Email = $request->Email;

        if($Instruct->save()){
            return redirect('admin/Instructores');
        }else{
            return view('Instructores.index')
                ->with('Instructores', $Instructores);
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
          $Instruct = Instructor::find($id);
        
        if($Instruct->delete()){
            return redirect('admin/Instructores');
        }else{
            throw new Exception("Error al eliminar el registro", 1);
            
        }
    }
}
