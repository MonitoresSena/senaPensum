<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Sector;

class SectorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $sectors = Sector::orderBy('id', 'ASC')->paginate(5);
        return view('sectors.index')
                ->with('sectors', $sectors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    

        $sec = new Sector();

        return view('sectors.create')
                ->with('sec', $sec);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sec = new Sector($request->all());
        if($sec->save()){
            return redirect('admin/sectors');
        } else {
            return view('sectors.create')
                ->with('sec', $sec);
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
        $sec = Sector::find($id);
        
        return view('sectors.view')
                ->with('sec', $sec);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sec = Sector::find($id);
        return view('sectors.update')
                ->with('sec', $sec);
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

        $sec = Sector::find($id);
        $sec->nombre = $request->nombre;

        if($sec->save()){
            return redirect('admin/sectors');
        } else {
            return view('sectors.update')
                ->with('sec', $sec);
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
        $sec = Sector::find($id);
        if($sec->delete()){
            return redirect('admin/sectors');
        } else {
            throw new Exception("Error al eliminar el registro", 1);
            
        }
    }
}
