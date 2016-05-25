<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class SectorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $sectors = User::orderBy('id', 'ASC')->paginate(5);
        return view('sector.index')
                ->with('sectors', $sectores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    

        $sec = new User();

        return view('sector.create')
                ->with('sector', $sec)
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sector = new User($request->all());
        if($sector->save()){
            return redirect('admin/sectors');
        } else {
            return view('sectors.create')
                ->with('sector', $sec)
                ->with('rolesOpc', $this->getRolesSelect());
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
        $sec = User::find($id);
        
        return view('sectors.view')
                ->with('sector', $sec);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sec = User::find($id);
        return view('sectors.update')
                ->with('sector', $sec)
                ->with('rolesOpc', $this->getRolesSelect());
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

        $sector = User::find($id);
        $sector->nombre = $request->nombre;

        if($sector->save()){
            return redirect('admin/sectors');
        } else {
            return view('sectors.update')
                ->with('sector', $sec)
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
        $sec = User::find($id);
        if($sec->delete()){
            return redirect('admin/sectors');
        } else {
            throw new Exception("Error al eliminar el registro", 1);
            
        }
    }
}
