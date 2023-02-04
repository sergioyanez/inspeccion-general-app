<?php

namespace App\Http\Controllers;
use App\Models\Tipo_estado;
use App\Http\Controllers\LogsTipoEstadosController;
use App\Http\Requests\StoreTipo_estadoRequest;
use App\Http\Requests\UpdateTipo_estadoRequest;

class TipoEstadoController extends Controller
{
    /**
     * Muestra todos los tipos de estado de habilitacion
     */
    public function index()
    {
        $tiposEstadosHabilitacion = Tipo_estado::all();
        return view('tipoEstadoHabilitacion.estadosHabilitacion', ['estadosHabilitacion' => $tiposEstadosHabilitacion]);
    }
    /**
     * Crea un nuevo Tipo de estado de habilitacion.
     */
    public function create()
    {
        return view('tipoEstadoHabilitacion.crear');
    }

    /**
     * Guarda el tipo de estado de habilitacion creado en la base de datos
     * @param  \App\Http\Requests\StoreTipo_estadoRequest  $request
     */
    public function store(StoreTipo_estadoRequest $request)
    {
        $tipoEstado = new Tipo_estado();
        $tipoEstado->descripcion = $request->descripcion;

        if($tipoEstado->save()){
            $log = new LogsTipoEstadosController();
            $log->store($tipoEstado, 'c');
            return redirect()->route('tiposEstadosHabilitacion');
        }
        return back()->with('fail','No se pudo crear el tipo de estado');
    }

   /**
     * Muestra un tipo de estado de habilitacion en un formulario con todos los campos cargados
     * @param  int $id
     */
    public function show($id)
    {
        $estadoHabilitacion = Tipo_estado::find($id);
        return view('tipoEstadoHabilitacion.mostrar', ['estadoHabilitacion' => $estadoHabilitacion]);
    }

     /**
     * Guarda los datos actualizados del contribuyente
     * @param  \App\Http\Requests\UpdateTipo_estadoRequest  $request
     */
    public function update(UpdateTipo_estadoRequest $request)
    {
        $tipoEstado = Tipo_estado::find($request->id);
        $tipoEstado->descripcion = $request->descripcion;

        if($tipoEstado->save()){
            $log = new LogsTipoEstadosController();
            $log->store($tipoEstado, 'u');
            return redirect()->route('tiposEstadosHabilitacion');
        }
        return back()->with('fail','No se pudo actualizar el tipo de estado');
    }

    /**
     * Elimina un Estado de habilitación.
     * @param  int $id
     */
    public function destroy($id){

        $tipoEstado = Tipo_estado::find($id);
        if($tipoEstado->delete()){
            $log = new LogsTipoEstadosController();
            $log->store($tipoEstado, 'd');
            return redirect()->route('tiposEstadosHabilitacion');
        }
        return back()->with('fail','No se pudo eliminar el tipo de estado');
    }
}
