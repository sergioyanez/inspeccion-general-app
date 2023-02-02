<?php

namespace App\Http\Controllers;

use App\Models\Tipo_dependencia;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTipo_dependenciaRequest;
use App\Http\Requests\UpdateTipo_dependenciaRequest;
use App\Http\Controllers\LogsTipoDependenciaController;

class TipoDependenciaController extends Controller{


    /**
     * Muestra todos los tipos de dependencia
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $tiposDependencia = Tipo_dependencia::all();
        return view('tipoDependencia.tiposDependencia', ['tiposDependencias'=>$tiposDependencia]);
    }

    /**
     * Muestra un formulario para crear un tipo de dependencia
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('tipoDependencia.crear');
    }

    /**
     * Crea un nuevo tipo de dependencia
     * @param  \App\Http\Requests\UpdateTipo_dependenciaRequest  $request
     * @param  \App\Models\Tipo_dependencia  $tipo_dependencia
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $this->validate($request,[
            'nombre'=>'required|string|max:30',
         ]);

        $tipo_dependencia = new Tipo_dependencia();
        $tipo_dependencia->nombre = $request->nombre;

        if($tipo_dependencia->save()){
            $log = new LogsTipoDependenciaController();
            $log->create($tipo_dependencia, 'c');
            return redirect()->route('tiposDependencias');
        }
        return back()->with('fail','No se pudo cargar el tipo de dependencia');
    }

     /**
     * Muestra un solo tipo de dependencia
     *
     * @param  \App\Models\Tipo_dependencia  $tipo_dependencia
     * @return \Illuminate\Http\Response
     */
    public function show($id){

        $tipoDependencia = Tipo_dependencia::find($id);
        return view('tipoDependencia.mostrar', ['tipoDependencia'=>$tipoDependencia]);
    }


    /**
     * Método para editar un tipo de dependencia
     *
     * @param  \App\Http\Requests\UpdateTipo_dependenciaRequest  $request
     * @param  \App\Models\Tipo_dependencia  $tipo_dependencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {

        $this->validate($request,[
            'nombre'=>'required|string|max:30',
         ]);

        $tipo_dependencia = Tipo_dependencia::find($request->id);
        $tipo_dependencia->nombre = $request->nombre;
        $tipo_dependencia->save();

        if($tipo_dependencia->save()){
            $log = new LogsTipoDependenciaController();
            $log->create($tipo_dependencia, 'c');
            return redirect()->route('tiposDependencias');
        }
        return back()->with('fail','No se pudo cargar el tipo de dependencia');

    }

    /**
     * Eliminar un tipo de dependencia
     *
     * @param  \App\Models\Tipo_dependencia  $tipo_dependencia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {

        $log = new LogsTipoDependenciaController();
        $tipo_dependencia = Tipo_dependencia::find($id);

        $tipo_dependencia->delete();

        $log->create($tipo_dependencia, 'd');

        return redirect()->route('tiposDependencias');
    }
}
