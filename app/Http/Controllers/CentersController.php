<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CentersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $centers = Center::orderBy('id_centro', 'ASC')->paginate(10);
        return view('center.index')
                ->with('center', $centers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    

        $ctr = new Center();

        return view('center.create')
                ->with('center', $ctr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ctr = new Center($request->all());
        if($ctr->save()){
            return redirect('admin/center');
        } else {
            return view('center.create')
                ->with('center', $ctr);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_centro)
    {
        $ctr = Center::find($id_centro);
        
        return view('center.view')
                ->with('center', $ctr);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_centro)
    {
        $ctr = Center::find($id_centro);
        return view('center.update')
                ->with('center', $ctr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_centro)
    {

        $center = Center::find($id_centro);
        $center->nombre = $request->nombre;

        if($center->save()){
            return redirect('admin/center');
        } else {
            return view('center.update')
                ->with('center', $ctr);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_centro)
    {
        $ctr = Center::find($id_centro);
        if($ctr->delete()){
            return redirect('admin/center');
        } else {
            throw new Exception("Error al eliminar el registro", 1);
            
        }
    }
}
