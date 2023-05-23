<?php

namespace App\Http\Controllers;

use App\Models\Tipo_habilitacion;
use App\Http\Requests\StoreTipo_habilitacionRequest;
use App\Http\Requests\UpdateTipo_habilitacionRequest;
use App\Http\Controllers\LogsTipoHabilitacionController;

/**
 * Controller de TipoHabilitacion: brinda acceso a los servicios de los tipos de habilitación.
 *
 * @author  Sebastián Esains: sebaesains77@gmail.com
 *          Alexis Galván: alexisleogalvan12@gmail.com
 *          Elva Kheler: mekdy.20@gmail.com
 *          Héctor Liceaga: lice2187@gmail.com
 *          Eugenio Miller: eugeniomiller93@gmail.com
 *          Sergio Yañez: sergiomyanez01@gmail.com
 * @see Tipo_habilitacion
 * @version 1.0
 * @since 11/12/2022
 */
class TipoHabilitacionController extends Controller
{
     /**
     * Muestra todos los tipos de habilitaciones
     */
    public function index() {
        $tiposHabilitaciones = Tipo_habilitacion::all();
        return view('tipoHabilitacion.tiposHabilitaciones', ['tiposHabilitaciones'=>$tiposHabilitaciones]);
    }

    /**
     * Muestra un formulario para crear un tipo de habilitacion
    */
    public function create() {
        return view('tipoHabilitacion.crear');
    }


    /**
     * Crea un nuevo tipo de habilitacion
     * @param  \App\Http\Requests\StoreTipo_habilitacionRequest  $request
     */
    public function store(StoreTipo_habilitacionRequest $request)
    {
        $tipoHabilitacion = new Tipo_habilitacion();
        $tipoHabilitacion->descripcion = $request->descripcion;
        $tipoHabilitacion->plazo_vencimiento = $request->plazo_vencimiento;

        if ($tipoHabilitacion->save()){
            $log = new LogsTipoHabilitacionController();
            $log->store($tipoHabilitacion, 'c');
            return redirect()->route('tiposHabilitaciones');

        }
        return back()->with('fail','No se pudo guardar el tipo de habilitacion');
    }

    /**
     * Retorna un tipo de habilitacions
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipoHabilitacion = Tipo_habilitacion::find($id);
        return view('tipoHabilitacion.mostrar', ['tipoHabilitacion'=>$tipoHabilitacion]);
    }

    /**
     * Método para editar un tipo de habilitacion
     * @param  \App\Http\Requests\UpdateTipo_habilitacionRequest  $request
     */
    public function update(UpdateTipo_habilitacionRequest $request)
    {
        $tipoHabilitacion = Tipo_habilitacion::find($request->id);
        $tipoHabilitacion->descripcion = $request->descripcion;
        $tipoHabilitacion->plazo_vencimiento = $request->plazo_vencimiento;
        if ($tipoHabilitacion->save()){
            $log = new LogsTipoHabilitacionController();
            $log->store($tipoHabilitacion, 'u');
            return redirect()->route('tiposHabilitaciones');

        }
        return back()->with('fail','No se pudo guardar el tipo de habilitacion');
    }





    /**
     * Eliminar un tipo de habilitacion
     * @param int $id
     */
    public function destroy($id)
    {
        $tipoHabilitacion = Tipo_habilitacion::find($id);
        if ($tipoHabilitacion->delete()){
            $log = new LogsTipoHabilitacionController();
            $log->store($tipoHabilitacion, 'd');
            return redirect()->route('tiposHabilitaciones');
        }
        return back()->with('fail','No se pudo eliminar el estado civil');
    }
}
