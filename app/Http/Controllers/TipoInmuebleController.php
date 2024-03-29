<?php

namespace App\Http\Controllers;

use App\Models\Tipo_inmueble;
use App\Http\Requests\StoreTipo_inmuebleRequest;
use App\Http\Requests\UpdateTipo_inmuebleRequest;
use App\Http\Controllers\LogsTipoInmuebleController;

/**
 * Controller de TipoInmueble: brinda acceso a los servicios de los tipos de inmuebles.
 *
 * @author  Sebastián Esains: sebaesains77@gmail.com
 *          Alexis Galván: alexisleogalvan12@gmail.com
 *          Elva Kheler: mekdy.20@gmail.com
 *          Héctor Liceaga: lice2187@gmail.com
 *          Eugenio Miller: eugeniomiller93@gmail.com
 *          Sergio Yañez: sergiomyanez01@gmail.com
 * @see Tipo_inmueble
 * @version 1.0
 * @since 11/12/2022
 */
class TipoInmuebleController extends Controller {

    /**
     * Métodos que muestra todos los tipos de inmueble existentes
     */
    public function index() {

        $tiposInmuebles = Tipo_inmueble::all();
        return view('tipoInmueble.tiposInmuebles', ['tiposInmuebles'=>$tiposInmuebles]);
    }

    /**
     * Muestra un formulario para crear un tipo de inmueble
     */
    public function create() {
        return view('tipoInmueble.crear');
    }

    /**
     * Método que crea un nuevo tipo de inmueble
     * @param  \App\Http\Requests\StoreTipo_inmuebleRequest  $request
     */
    public function store(StoreTipo_inmuebleRequest $request) {

        $tipoInmueble = new Tipo_inmueble();
        $tipoInmueble->descripcion = $request->descripcion;

        if($tipoInmueble->save()){
            $log = new LogsTipoInmuebleController();
            $log->store($tipoInmueble, 'c');
            return redirect()->route('tiposInmuebles');
        }

        return back()->with('fail','No se pudo cargar el tipo de inmueble');
    }

    /**
     * Métodos que muestra un solo tipo de inmueble
     *@param  int $id
     */
    public function show($id) {

        $tipoInmueble = Tipo_inmueble::find($id);
        return view('tipoInmueble.mostrar', ['tipoInmueble'=>$tipoInmueble]);
    }

    /**
     * Método que edita un tipo de inmueble determinado
     * @param  \App\Http\Requests\UpdateTipo_inmuebleRequest  $request
     */
    public function update(UpdateTipo_inmuebleRequest $request) {

        $tipoInmueble = Tipo_inmueble::find($request->id);
        $tipoInmueble->descripcion = $request->descripcion;

        if($tipoInmueble->save()){
            $log = new LogsTipoInmuebleController();
            $log->store($tipoInmueble, 'u');
            return redirect()->route('tiposInmuebles');
        }
        return back()->with('fail','No se pudo actualizar el tipo de inmueble');
    }

    /**
     * Método que elimina un tipo de inmueble determinado
     * @param  int $id
     */
    public function destroy($id) {

        $tipoInmueble = Tipo_inmueble::find($id);
        if($tipoInmueble->delete()){
            $log = new LogsTipoInmuebleController();
            $log->store($tipoInmueble, 'd');
            return redirect()->route('tiposInmuebles');
        }
        return back()->with('fail','No se pudo eliminar el tipo de inmueble');
    }
}