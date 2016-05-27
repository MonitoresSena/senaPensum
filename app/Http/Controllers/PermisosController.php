<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Rol;
use App\Ruta;
use App\RolRuta;

class PermisosController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('JPermisos');
    }

    public function index(){
    	$r = $this->cargarRoles();
    	return view('permisos.index')
    			->with('rolesOpc', $r);
    }

    public function cargarRoles(){
    	$roles = Rol::all();
    	$r = [
            '' => 'Seleccione una rol',
        ];
    	foreach($roles AS $rol){
    			$r[$rol->id] = $rol->nombre;
    	}
    	return $r;
    }

    public function ajx(){
        $tipo = $_POST['type'];
        $respuesta = [];

        if($tipo == 1){
    	   $respuesta = $this->getPermisos($_POST['rol']);
        } else if($tipo == 2){
            $rol = $_POST['rol'];
            $ruta = $_POST['ruta_id'];
            $permiso = $_POST['permission_id'];
            $error = false;

            $rolRuta = RolRuta::whereRaw("rol_id = '$rol' AND ruta_id = '$ruta'")->first();

            if($rolRuta !== null){

                # el modelo existe
                $rolRuta->estado = $permiso == "true"? 1 : 0;
                $error = !$rolRuta->save();

            } else if($permiso == "true"){
                # el modelo no existe
                $rolRuta = new RolRuta();
                $rolRuta->rol_id = $rol;
                $rolRuta->ruta_id = $ruta;
                $error = !$rolRuta->save();
            }

            $respuesta = [
                'error' => $error,
            ];
        }

        return response()->json($respuesta);
    }

    private function getPermisos($id){
        $rutas = Ruta::all();
        $permisos = RolRuta::whereRaw("rol_id = " . $id . " AND estado = 1")->get();
        $rutasPermisos = [];

        foreach($rutas AS $r){
            $rcp = [
                'id' => $r->id,
                'ruta' => $r->ruta,
                'permiso' => false,
            ];

            foreach ($permisos as $rr) {                
                if($rr->ruta_id == $r->id){
                    $rcp['permiso'] = true;
                }
            }
            $rutasPermisos[] = $rcp;
        }        

        return $rutasPermisos;
    }
}
