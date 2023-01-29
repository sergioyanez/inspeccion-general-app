<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Tipo_estado;
use App\Http\Controllers\LogsTipoEstadosController;
use App\Http\Requests\StoreTipo_estadoRequest;
use App\Http\Requests\UpdateTipo_estadoRequest;

class TipoEstadoController extends Controller
{

    /**
     * Crea un nuevo Tipo de estado de habilitacion.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $log = new LogsTipoEstadosController();

        $tipo_estado = new Tipo_estado();
        $tipo_estado->descripcion = $request->descripcion;

        $tipo_estado->save();

        $log->create($tipo_estado, 'c');

        return 'El estado de habilitación se creó correctamente';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTipo_estadoRequest  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Muestra los tipos de Estados de habilitacion.
     *
     * @param  \App\Models\Tipo_estado  $tipo_estado
     * @return \Illuminate\Http\Response
     */
    public function show(Tipo_estado $tipo_estado)
    {

        $tipo_estado = Tipo_estado::all();
        return view('home', ['estados'=>$tipo_estado]); // Si lo mostramos en vista, hay que pasarle el array (['tipos'=>$tipo_dni])
    }

    /**
     * Muestra un  tipo  de Estado de habilitacion que pertenece al $id pasado po parámetro
     * @param  \App\Models\Tipo_estado  $tipo_dni
     * @return \Illuminate\Http\Response
     */
    public function showOne($id){

        $tipo_estado = Tipo_estado::find($id);
        return view('editEstadoHabilitacion', ['estado'=>$tipo_estado]); // Si lo mostramos en vista, hay que pasarle el array (['tipos'=>$tipo_dni])
    }

    /**
     * Actualiza un Estado de habilitación.
     * @param  \App\Models\Tipo_estado  $tipo_estado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $log = new LogsTipoEstadosController();

        $tipo_estado = Tipo_estado::find($request->id);

        $tipo_estado->descripcion = $request->descripcion;
        $tipo_estado->save();

        $log->create($tipo_estado, 'u');

        return 'Estado de habilitación actualizado correctamente';
    }

    /**
     * Elimina un Estado de habilitación.
     *
     * @param  \App\Models\Tipo_estado  $tipo_estado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

        $log = new LogsTipoEstadosController();

        $tipo_estado = Tipo_estado::find($id);
        $tipo_estado->delete();

        $log->create($tipo_estado, 'd');

        return 'Estado de habilitación eliminado correctamente';
    }
}
