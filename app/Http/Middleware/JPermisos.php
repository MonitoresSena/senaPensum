<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use App\RolRuta;
use App\Ruta;
use Session;
use DB;

class JPermisos
{
    
    public function handle($request, Closure $next, $guard = null)
    {               
    	        // return $next($request);
     	
     	$usuario = User::find(Session::get('usr_id'));     	
     	$rol = $usuario->Rol;

     	if($rol->super == 1){
     		return $next($request);
     	}     	
     	
     	$nRuta = \Request::route()->getName();

     	$ruta = DB::table('rol_ruta as t')
     				->join('rutas as t2', 't2.id', '=', 't.ruta_id')
     				->select('t.rol_id', 't.ruta_id', 't2.ruta', 't.estado')
     				->where("t.rol_id", "=", $usuario->rol_id)
     				->where("t2.ruta", "=", $nRuta)
     				->where("t.estado", "=", "1")
     				->get();

		if(count($ruta) > 0){
			return $next($request);
		}else{
			return response('Unauthorized.', 401);
		}

    }
}
