<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Ruta;

class RutasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rutas = Ruta::orderBy('id', 'ASC')->paginate(5);
        // var_dump($rutas);
        return view('rutas.index')
                ->with('rutas', $rutas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $ruta = new Ruta();
        return view('rutas.create')
                ->with('ruta', $ruta);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ruta = new Ruta($request->all());

        if($ruta->save()){
            return redirect('admin/rutas');
        } else {
            return view('rutas.create')
                ->with('usuario', $ruta);
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
        // $ruta = Ruta::find($id);
        // return view('rutas.index')
        //         ->with('ruta', $ruta);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ruta = Ruta::find($id);
        return view('rutas.update')
                ->with('ruta', $ruta);
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
        $ruta = Ruta::find($id);
        $ruta->ruta = $request->ruta;

        if($ruta->save()){
            return redirect('admin/rutas');
        } else {
            return view('rutas.update')
                ->with('usuario', $ruta);
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
        $ruta = Ruta::find($id);
        if($ruta->delete()){
            return redirect('admin/rutas');
        } else {
            throw new Exception("Error al eliminar el registro", 1);
            
        }
    }
}
