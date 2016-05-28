<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Area;

class areasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $areas = Area::orderBy('id', 'ASC')->paginate(5);
        return view('areas.index')
                ->with('areas', $areas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    

        $are = new Area();

        return view('areas.create')
                ->with('are', $are);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $are = new Area($request->all());
        if($are->save()){
            return redirect('admin/areas');
        } else {
            return view('areas.create')
                ->with('areas', $areas);
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
        $are = Area::find($id);
        
        return view('areas.view')
                ->with('are', $are);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $are = Area::find($id);
        return view('areas.update')
                ->with('are', $are);
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

        $are = Area::find($id);
        $are->nombre = $request->nombre;

        if($are->save()){
            return redirect('admin/areas');
        } else {
            return view('areas.update')
                ->with('areas', $areas);
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
        $are = Area::find($id);
        if($are->delete()){
            return redirect('admin/areas');
        } else {
            throw new Exception("Error al eliminar el registro", 1);
            
        }
    }
}
