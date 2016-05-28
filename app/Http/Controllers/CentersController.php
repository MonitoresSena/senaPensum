<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Center;
class CentersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $centers = Center::orderBy('id', 'ASC')->paginate(10);
        return view('centers.index')
                ->with('centers', $centers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    

        $cent = new Center();

        return view('centers.create')
                ->with('cent', $cent);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cent = new Center($request->all());
        if($cent->save()){
            return redirect('admin/centers');
        } else {
            return view('centers.create')
                ->with('centers', $centers);

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
        $cent = Center::find($id);
        
        return view('centers.view')
                ->with('cent', $cent);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cent = Center::find($id);
        return view('centers.update')
                ->with('cent', $cent);
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

        $cent = Center::find($id);
        $cent->nombre = $request->nombre;
        $cent->descripcion = $request->descripcion;
        $cent->id_municipio = $request->id_municipio;

        if($cent->save()){
            return redirect('admin/centers');
        } else {
            return view('centers.update')
                ->with('centers', $centers);

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
        $cent = Center::find($id);
        if($cent->delete()){
            return redirect('admin/centers');
        } else {
            throw new Exception("Error al eliminar el registro", 1);
            
        }
    }
}
