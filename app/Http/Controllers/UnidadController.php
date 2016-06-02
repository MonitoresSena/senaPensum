<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Unidad;
use App\Resultado;
use App\Documento;
use \App\TipoDocumento;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class UnidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $Unidades = Unidad::orderBy('id', 'DESC')->paginate(5);
        return view('Unidades.index')
                ->with('Unidades', $Unidades);
    }

  private function getResultadoSelect(){
        $ResultadoModel = Resultado::all();
        $Resultados = ['' => 'Seleccione un Resulado de aprendizaje'];
        foreach ($ResultadoModel as $Result) {
            $Resultados[$Result->id] = $Result->Denominacion;
        }
        return $Resultados;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ud = new Unidad();

        return view('Unidades.create')
                ->with('Unid', $ud)
                ->with('ResultOPC', $this->getResultadoSelect());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Unid = new Unidad($request->all());
        if($Unid->save()){
            $this->guardarArchivos($Unid->id, $Unid->nombre, $Unid->Resultado->Competencia->id);
            return redirect('admin/Unidades');
        } else {
            return view('Unidades.create')
                ->with('Unid', $ud)
                ->with('ResultOPC', $this->getResultadoSelect());
        }
    }
    
    private function guardarArchivos($id, $titulo, $competencia){        
        $d = DIRECTORY_SEPARATOR;
        $destino = public_path . $d . 'documentos' . $d . 'competencia_' . $competencia;
        if(!file_exists($destino) && !is_dir($destino)){
            mkdir($destino);
        }        
        $this->guia($id, $titulo, $destino, 'competencia_' . $competencia);
        $this->ep($id, $titulo, $destino, 'competencia_' . $competencia);
        $this->ec($id, $titulo, $destino, 'competencia_' . $competencia);
    }
    
    private function guia($id, $titulo, $destino, $carpeta){
        $archivo = ['guia' => Input::file('guia')];
        $reglas = ['guia' => 'required'];
        $validador = Validator::make($archivo, $reglas);
        
        if($validador->fails() || !Input::file('guia')->isValid()){
            return false;
        }
        
        $t = time();
        $extension = Input::file('guia')->getClientOriginalExtension();
        $nombre = "guia-$id-$titulo-$t." . $extension;
        Input::file('guia')->move($destino, $nombre);
        
        $doc = new Documento();
        $doc->titulo = $titulo;
        $doc->tipo_id = 1;
        $doc->unidad_id = $id;
        $doc->estado = 0;
        $doc->propuesto_por = \Illuminate\Support\Facades\Session::get('usr_id');
        $doc->url = $carpeta . '/' . $nombre;
        return $doc->save();
    }
    
    private function ep($id, $titulo, $destino, $carpeta){
        $archivo = ['evaluacion-procesos' => Input::file('evaluacion-procesos')];
        $reglas = ['evaluacion-procesos' => 'required'];
        $validador = Validator::make($archivo, $reglas);
        
        if($validador->fails() || !Input::file('evaluacion-procesos')->isValid()){
            return false;
        }
        
        $t = time();
        $extension = Input::file('evaluacion-procesos')->getClientOriginalExtension();
        $nombre = "ep-$id-$titulo-$t." . $extension;
        Input::file('evaluacion-procesos')->move($destino, $nombre);
        
        $doc = new Documento();
        $doc->titulo = $titulo;
        $doc->tipo_id = 3;
        $doc->unidad_id = $id;
        $doc->estado = 0;
        $doc->propuesto_por = \Illuminate\Support\Facades\Session::get('usr_id');
        $doc->url = $carpeta . '/' . $nombre;
        
        return $doc->save();
    }
    
    private function ec($id, $titulo, $destino, $carpeta){
        $archivo = ['evaluacion-concpeto' => Input::file('evaluacion-concpeto')];
        $reglas = ['evaluacion-concpeto' => 'required'];
        $validador = Validator::make($archivo, $reglas);
        
        if($validador->fails() || !Input::file('evaluacion-concpeto')->isValid()){
            return false;
        }
        
        $t = time();
        $extension = Input::file('evaluacion-concpeto')->getClientOriginalExtension();
        $nombre = "ec-$id-$titulo-$t." . $extension;
        Input::file('evaluacion-concpeto')->move($destino, $nombre);
        
        $doc = new Documento();
        $doc->titulo = $titulo;
        $doc->tipo_id = 2;
        $doc->unidad_id = $id;
        $doc->estado = 0;
        $doc->propuesto_por = \Illuminate\Support\Facades\Session::get('usr_id');
        $doc->url = $carpeta . '/' . $nombre;
        
        return $doc->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $ud = Unidad::find($id);
        
        return view('Unidades.view')
                ->with('Unid', $ud);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $ud = Unidad::find($id);
        return view('Unidades.update')
                ->with('Unid', $ud)
                ->with('ResultOPC', $this->getResultadoSelect());
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
          $Unid = Unidad::find($id);
        $Unid->id = $request->id;
        $Unid->nombre = $request->nombre;
        $Unid->id_resultado = $request->id_resultado;


        if($Unid->save()){
            return redirect('admin/Unidades');
        } else {
            return view('Unidades.update')
                ->with('Unid', $ud)
                ->with('ResultOPC', $this->getResultadoSelect());
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
          $ud = Unidad::find($id);
        if($ud->delete()){
            return redirect('admin/Unidades');
        } else {
            throw new Exception("Error al eliminar el registro", 1);
            
        }
    }
    
    public function proponerDocumento($id){
        $unidad = Unidad::find($id);
        $tipoDocs = TipoDocumento::all();
        $tipos = [];        
        foreach($tipoDocs AS $t){
            $tipos[$t->id] = $t->tipo;
        }
        return view('unidades.proponer')
                ->with('unidad', $unidad)
                ->with('tipos', $tipos);
    }
    
    public function guardarPropuesta($id){
        $archivo = ['documento' => Input::file('documento')];
        $reglas = ['documento' => 'required'];
        $validador = Validator::make($archivo, $reglas);
        
        if($validador->fails() || !Input::file('documento')->isValid()){
            return redirect('admin/unidades/' . $id . '/documentos/listar');
        }
        
        $unidad = Unidad::find($id);
        $d = DIRECTORY_SEPARATOR;
        $competencia = $unidad->Resultado->Competencia->id;
        $destino = public_path() . $d . 'documentos' . $d . 'competencia_' . $competencia;
        $carpeta = "competencia_" . $competencia;
        $titulo = $_POST['titulo'];
        $tipo = $_POST['tipo-doc'];
        
        $t = time();
        $extension = Input::file('documento')->getClientOriginalExtension();
        $nombre = "ec-$id-$titulo-$t." . $extension;
        Input::file('documento')->move($destino, $nombre);
        
        $doc = new Documento();
        $doc->titulo = $titulo;
        $doc->tipo_id = $tipo;
        $doc->unidad_id = $id;
        $doc->estado = 0;
        $doc->propuesto_por = \Illuminate\Support\Facades\Session::get('usr_id');
        $doc->url = $carpeta . '/' . $nombre;
        $doc->save();
        
        return redirect('admin/unidades/' . $id . '/documentos/listar');
    }
    
//    private function guardarDocPropuesto($id, $titulo, $destino, $carpeta){
//        $archivo = ['evaluacion-concpeto' => Input::file('evaluacion-concpeto')];
//        $reglas = ['evaluacion-concpeto' => 'required'];
//        $validador = Validator::make($archivo, $reglas);
//        
//        if($validador->fails() || !Input::file('evaluacion-concpeto')->isValid()){
//            return false;
//        }
//        
//        $t = time();
//        $extension = Input::file('evaluacion-concpeto')->getClientOriginalExtension();
//        $nombre = "ec-$id-$titulo-$t." . $extension;
//        Input::file('evaluacion-concpeto')->move($destino, $nombre);
//        
//        $doc = new Documento();
//        $doc->titulo = $titulo;
//        $doc->tipo_id = 2;
//        $doc->unidad_id = $id;
//        $doc->estado = 0;
//        $doc->propuesto_por = \Illuminate\Support\Facades\Session::get('usr_id');
//        $doc->url = $carpeta . '/' . $nombre;
//        
//        return $doc->save();
//    }
    
    public function listarDocumentos($id){
        $unidad = Unidad::find($id);
        $documentos = Documento::where('unidad_id', '=', $id)
                        ->orderBy('estado', '=', '1', 'ASC')
                        ->orderBy('tipo_id', 'ASC')
                        ->paginate(10);
        
        return view('Unidades.listarDocumentos')
            ->with('unidad', $unidad)
            ->with('documentos', $documentos);
    }
    
    public function aprobar($uni, $id){
        $doc = Documento::find($id);
        $doc->estado = 1;
        if($doc->save()){
            // mensaje de guardado
        }
        return redirect('admin/unidades/' . $uni . '/documentos/listar');
    }
}
