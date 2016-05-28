<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Usuario;
use App\Http\Requests;
use App\Company;
class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $companies = Company::orderBy('id', 'ASC')->paginate(10);
        return view('companies.index')
                ->with('companies', $companies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    

        $comp = new Company();
        return view('companies.create')
                ->with('comp', $comp);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comp = new Company($request->all());
        if($comp->save()){
            return redirect('admin/companies');
        } else {
            return view('companies.create')
                ->with('companies', $companies);

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
        $comp = Company::find($id);
        
        return view('companies.view')
                ->with('comp', $comp);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comp = Company::find($id);
        return view('companies.update')
                ->with('comp', $comp);
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

        $comp = Company::find($id);
        $comp->nombre = $request->nombre;
        $comp->descripcion = $request->descripcion;
        if($comp->save()){
            return redirect('admin/companies');
        } else {
            return view('companies.update')
                ->with('companies', $companies);
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
        $comp = Company::find($id);
        if($comp->delete()){
            return redirect('admin/companies');
        } else {
            throw new Exception("Error al eliminar el registro", 1);
            
        }
    }
}