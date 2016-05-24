<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class areasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $areas = User::orderBy('id', 'ASC')->paginate(5);
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

        $ara = new User();

        return view('areas.create')
                ->with('area', $ara);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $area = new User($request->all());
        if($area->save()){
            return redirect('admin/areas');
        } else {
            return view('areas.create')
                ->with('area', $ara);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id_area
     * @return \Illuminate\Http\Response
     */
    public function show($id_area)
    {
        $ara = User::find($id_area);
        
        return view('areas.view')
                ->with('area', $ara);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id_area
     * @return \Illuminate\Http\Response
     */
    public function edit($id_area)
    {
        $ara = User::find($id_area);
        return view('areas.update')
                ->with('area', $ara);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id_area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_area)
    {

        $area = User::find($id_area);
        $area->nombre = $request->nombre;

        if($area->save()){
            return redirect('admin/areas');
        } else {
            return view('areas.update')
                ->with('area', $ara);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id_area
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_area)
    {
        $ara = User::find($id_area);
        if($ara->delete()){
            return redirect('admin/areas');
        } else {
            throw new Exception("Error al eliminar el registro", 1);
            
        }
    }
}
