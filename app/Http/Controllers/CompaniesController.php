<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Usuario;
use App\Http\Requests;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $companies = Company::orderBy('id_empresa', 'ASC')->paginate(10);
        return view('company.index')
                ->with('company', $companies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    

        $comp = new Company();

        return view('company.create')
                ->with('company', $comp);
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
            return redirect('admin/company');
        } else {
            return view('company.create')
                ->with('company', $comp);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_empresa)
    {
        $comp = Company::find($id_empresa);
        
        return view('company.view')
                ->with('company', $comp);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_empresa)
    {
        $comp = Company::find($id_empresa);
        return view('company.update')
                ->with('company', $comp);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_empresa)
    {

        $company = Company::find($id_empresa);
        $company->nombre = $request->nombre;

        if($company->save()){
            return redirect('admin/company');
        } else {
            return view('company.update')
                ->with('company', $comp);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_empresa)
    {
        $comp = Company::find($id_empresa);
        if($comp->delete()){
            return redirect('admin/company');
        } else {
            throw new Exception("Error al eliminar el registro", 1);
            
        }
    }
}