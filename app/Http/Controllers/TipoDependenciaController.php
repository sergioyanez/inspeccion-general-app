<?php

namespace App\Http\Controllers;

use App\Models\Tipo_dependencia;
use App\Http\Requests\StoreTipo_dependenciaRequest;
use App\Http\Requests\UpdateTipo_dependenciaRequest;
use App\Http\Controllers\LogsTipoDependenciaController;

/**
 * Controller de TipoDependencia: brinda acceso a los servicios de los tipos de dependencia.
 *
 * @author  Sebastián Esains: sebaesains77@gmail.com
 *          Alexis Galván: alexisleogalvan12@gmail.com
 *          Elva Kheler: mekdy.20@gmail.com
 *          Héctor Liceaga: lice2187@gmail.com
 *          Eugenio Miller: eugeniomiller93@gmail.com
 *          Sergio Yañez: sergiomyanez01@gmail.com
 * @see Tipo_dependencia
 * @version 1.0
 * @since 11/12/2022
 */
class TipoDependenciaController extends Controller{

    /**
     * Muestra todos los tipos de dependencia
     */
    public function index() {

        $tiposDependencias = Tipo_dependencia::all();
        return view('tipoDependencia.tiposDependencias', ['tiposDependencias'=>$tiposDependencias]);
    }

    /**
     * Muestra un formulario para crear un tipo de dependencia
     */
    public function create() {
        return view('tipoDependencia.crear');
    }

    /**
     * Crea un nuevo tipo de dependencia
     * @param  \App\Http\Requests\StoreTipo_dependenciaRequest  $request
     */
    public function store(StoreTipo_dependenciaRequest $request) {

        $tipoDependencia = new Tipo_dependencia();
        $tipoDependencia->nombre = $request->nombre;

        if($tipoDependencia->save()){
            $log = new LogsTipoDependenciaController();
            $log->store($tipoDependencia, 'c');
            return redirect()->route('tiposDependencias');
        }
        return back()->with('fail','No se pudo cargar el tipo de dependencia');
    }

     /**
     * Muestra un solo tipo de dependencia
     * @param  \App\Models\int  $tipo_dependencia->$id
     */
    public function show($id){

        $tipoDependencia = Tipo_dependencia::find($id);
        return view('tipoDependencia.mostrar', ['tipoDependencia'=>$tipoDependencia]);
    }


    /**
     * Método para editar un tipo de dependencia
     * @param  \App\Http\Requests\UpdateTipo_dependenciaRequest  $request
     */
    public function update(UpdateTipo_dependenciaRequest $request) {

        $tipoDependencia = Tipo_dependencia::find($request->id);
        $tipoDependencia->nombre = $request->nombre;

        if($tipoDependencia->save()){
            $log = new LogsTipoDependenciaController();
            $log->store($tipoDependencia, 'u');
            return redirect()->route('tiposDependencias');
        }
        return back()->with('fail','No se pudo actualizar el tipo de dependencia');

    }

    /**
     * Eliminar un tipo de dependencia
     * @param  \App\Models\int  $tipo_dependencia->$id
     */
    public function destroy($id) {

        $tipoDependencia = Tipo_dependencia::find($id);

        if($tipoDependencia->delete()){
            $log = new LogsTipoDependenciaController();
            $log->store($tipoDependencia, 'd');
            return redirect()->route('tiposDependencias');
        }
        return back()->with('fail','No se pudo eliminar el tipo de dependencia');
    }
}