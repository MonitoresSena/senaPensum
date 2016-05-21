<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Rol;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $usuarios = User::orderBy('id', 'ASC')->paginate(5);
        return view('usuarios.index')
                ->with('usuarios', $usuarios);
    }

    private function getRolesSelect(){
        $rolesModel = Rol::all();
        $roles = ['' => 'Seleccione un rol'];
        foreach ($rolesModel as $rol) {
            $roles[$rol->id] = $rol->nombre;
        }
        return $roles;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    

        $usr = new User();

        return view('usuarios.create')
                ->with('usuario', $usr)
                ->with('rolesOpc', $this->getRolesSelect());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuario = new User($request->all());
        if($usuario->save()){
            return redirect('admin/usuarios');
        } else {
            return view('usuarios.create')
                ->with('usuario', $usr)
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
        $usr = User::find($id);
        
        return view('usuarios.view')
                ->with('usuario', $usr);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usr = User::find($id);
        return view('usuarios.update')
                ->with('usuario', $usr)
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

        $usuario = User::find($id);
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->role_id = $request->role_id;

        if($usuario->save()){
            return redirect('admin/usuarios');
        } else {
            return view('usuarios.update')
                ->with('usuario', $usr)
                ->with('rolesOpc', $this->getRolesSelect());
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
        $usr = User::find($id);
        if($usr->delete()){
            return redirect('admin/usuarios');
        } else {
            throw new Exception("Error al eliminar el registro", 1);
            
        }
    }
}
