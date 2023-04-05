<?php

namespace App\Http\Controllers;

use App\Models\Tipo_dni;
use App\Http\Requests\StoreTipo_dniRequest;
use App\Http\Requests\UpdateTipo_dniRequest;
use App\Http\Controllers\LogsTipoDniController;

/**
 * Controller de TipoDni: brinda acceso a los servicios de los tipos de DNI.
 *
 * @author  Sebastián Esains: sebaesains77@gmail.com
 *          Alexis Galván: alexisleogalvan12@gmail.com
 *          Elva Kheler: mekdy.20@gmail.com
 *          Héctor Liceaga: lice2187@gmail.com
 *          Eugenio Miller: eugeniomiller93@gmail.com
 *          Sergio Yañez: sergiomyanez01@gmail.com
 * @see Tipo_dni
 * @version 1.0
 * @since 11/12/2022
 */
class TipoDniController extends Controller{

    /**
     * Muestra los tipos de DNI
     */
    public function index(){

        $tiposDni = Tipo_dni::all();
        return view('dni.tiposDni', ['tiposDni'=>$tiposDni]);

    }

    /**
     * Muestra un formulario para crear un nuevo tipo DNI
     */
    public function create() {

        return view('dni.crear');

    }

    /**
     * Crea un nuevo tipo DNI
     * @param  \App\Http\Requests\StoreTipo_dniRequest  $request
     */
    public function store(StoreTipo_dniRequest $request){

        $tipoDni = new Tipo_dni();
        $tipoDni->descripcion = $request->descripcion;

        if($tipoDni->save()){
            $log = new LogsTipoDniController();
            $log->store($tipoDni, 'c');
            return redirect()->route('dnis');
        }

        return back()->with('fail','No se pudo crear el dni');
    }

    /**
     * Muestra un solo tipo de DNI
     *
     * @param  int $id
     */
    public function show($id){

        $tipoDni = Tipo_dni::find($id);
        return view('dni.mostrar', ['dni'=>$tipoDni]);

    }

    /**
     * Eición de un tipo de DNI
     * @param  \App\Http\Requests\UpdateTipo_dniRequest  $request
     */
    public function update(UpdateTipo_dniRequest $request){

        $tipoDni = Tipo_dni::find($request->id);
        $tipoDni->descripcion = $request->descripcion;

        if($tipoDni->save()){
            $log = new LogsTipoDniController();
            $log->store($tipoDni, 'u');
            return redirect()->route('dnis');
        }

        return back()->with('fail','No se pudo editar el dni');
    }

    /**
     * Elimina un tipo de DNI
     * @param  int $id
     */
    public function destroy($id){
        $tipoDni = Tipo_dni::find($id);
        if($tipoDni->delete()){
            $log = new LogsTipoDniController();
            $log->store($tipoDni, 'd');
            return redirect()->route('dnis');
        }
        return back()->with('fail','No se pudo eliminar el dni');
    }
}