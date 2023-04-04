<?php

namespace App\Http\Controllers;

use App\Models\Estado_civil;
use App\Http\Requests\UpdateEstado_civilRequest;
use App\Http\Requests\StoreEstado_civilRequest;
use App\Http\Controllers\LogsEstadoCivilController;

/**
 * Controller de EstadoCivil: brinda acceso a los servicios de los estados civiles.
 *
 * @author  Sebastián Esains: sebaesains77@gmail.com
 *          Alexis Galván: alexisleogalvan12@gmail.com
 *          Elva Kheler: mekdy.20@gmail.com
 *          Héctor Liceaga: lice2187@gmail.com
 *          Eugenio Miller: eugeniomiller93@gmail.com
 *          Sergio Yañez: sergiomyanez02@gmail.com
 * @see Estado_civil
 * @version 1.0
 * @since 11/12/2022
 */
class EstadoCivilController extends Controller
{
    /**
     * Muestra todos los tipos de estado civil
     */
    public function index() {

        $estadosCiviles = Estado_civil::all();
        return view('estadoCivil.estadosCiviles', ['estadosCiviles'=>$estadosCiviles]);
    }

    /**
     * Muestra un formulario para crear un estado civil
    */
    public function create() {
        return view('estadoCivil.crear');
    }

    /**
     * Crea un nuevo estado civil
     * @param  \App\Http\Requests\StoreEstado_civilRequest  $request
     */
    public function store(StoreEstado_civilRequest $request) {

        $estado_civil = new Estado_civil();
        $estado_civil->descripcion = $request->descripcion;

        if ($estado_civil->save()){
            $log = new LogsEstadoCivilController();
            $log->store($estado_civil, 'c');
            return redirect()->route('estadosCiviles');
        }
        return back()->with('fail','No se pudo cargar el estado civil');
    }

    /**
     * Retorna un estado civil
     * @param  int  $id
     */
    public function show(int $id) {
        $estadoCivil = Estado_civil::find($id);
        return view('estadoCivil.mostrar', ['estadoCivil'=>$estadoCivil]);
    }

    /**
     * Método para editar un estado civil
     * @param  \App\Http\Requests\UpdateEstado_civilRequest  $request
     */
    public function update(UpdateEstado_civilRequest $request) {

        $estadoCivil = Estado_civil::find($request->id);
        $estadoCivil->descripcion = $request->descripcion;

        if($estadoCivil->save()){
            $log = new LogsEstadoCivilController();
            $log->store($estadoCivil, 'u');
            return redirect()->route('estadosCiviles');
        }

        return back()->with('fail','No se pudo editar el estado civil');
    }

    /**
     * Eliminar un estado civil
     * @param  int $id
     */
    public function destroy($id) {

        $estadoCivil = Estado_civil::find($id);
        if ($estadoCivil->delete()){
            $log = new LogsEstadoCivilController();
            $log->store($estadoCivil, 'd');
            return redirect()->route('estadosCiviles');
        }
        return back()->with('fail','No se pudo eliminar el estado civil');
    }

}
