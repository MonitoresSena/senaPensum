<?php
/**
 * Este middleware está diseñado para obtener los menú disponibles por rol
 *
 * @author JAKO
 */

namespace App\Http\Middleware;

use Closure;
use Session;
use DB;
use App\Rol;


class JMidMenu {
    public function handle($request, Closure $next, $guard = null){
        $rol = Rol::find(Session::get('rol_id'));
        if($rol->super == 1){
            $opciones = DB::table('menus AS t')
                ->leftJoin('rol_ruta AS t2', 't2.ruta_id', '=', 't.ruta_id')
                ->leftJoin('rutas AS t3', 't3.id', '=', 't.ruta_id')
                ->select('t.opcion', 't3.ruta')->distinct()
                ->orderBy('t.orden', 'ASC')
                ->get();
        } else {
            $opciones = DB::table('menus AS t')
                    ->join('rol_ruta AS t2', 't2.ruta_id', '=', 't.ruta_id')
                    ->join('rutas AS t3', 't3.id', '=', 't2.ruta_id')
                    ->select('t.opcion', 't3.ruta', 't2.rol_id', 't2.estado')
                    ->where('t2.estado', '=', '1')
                    ->where('t2.rol_id', '=', $rol->id)
                    ->orderBy('t.orden', 'ASC')
                    ->get();
        }
        
        $menu = [];
        
        foreach($opciones AS $opc){
            $menu[] = [
                'texto' => $opc->opcion,
                'ruta' => $opc->ruta,
            ];
        }
        
        Session::put("menu", $menu);
        
        return $next($request);
    }
}
