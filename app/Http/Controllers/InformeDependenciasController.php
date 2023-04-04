<?php

namespace App\Http\Controllers;

use App\Models\Expediente;
use App\Models\Informe_dependencias;
use App\Models\Tipo_dependencia;
use App\Http\Requests\Storeinforme_dependenciasRequest;
use App\Http\Requests\Updateinforme_dependenciasRequest;
use App\Http\Controllers\LogsInformeDependenciaController;

/**
 * Controller de InformeDependencias: brinda acceso a los servicios de informes de las dependencias.
 *
 * @author  Sebastián Esains: sebaesains77@gmail.com
 *          Alexis Galván: alexisleogalvan12@gmail.com
 *          Elva Kheler: mekdy.20@gmail.com
 *          Héctor Liceaga: lice2187@gmail.com
 *          Eugenio Miller: eugeniomiller93@gmail.com
 *          Sergio Yañez: sergiomyanez02@gmail.com
 * @see Informe_dependencias
 * @see Tipo_dependencia
 * @version 1.0
 * @since 11/12/2022
 */
class InformeDependenciasController extends Controller {

    /**
     * Método que retorna todos los informes de dependencia
     * existentes en  la base de datos
     */
    public function index() {
        $informesDependencias = Informe_dependencias::all();
        return view('informeDependencia.informesDependencias', ['informesDependencias'=> $informesDependencias]);
    }

    /**
     * Método que me lleva a un formulario para
     * agregar un nuevo informe de dependencia
     */
    public function create() {
        $expedientes = Expediente::all();
        $tiposDependencias = Tipo_dependencia::all();
        return view('informeDependencia.crear',['expedientes'=>$expedientes, 'tiposDependencias'=>$tiposDependencias]);
    }

    /**
     * Método que crea un nuevo informe de dependencia
     * @param  \App\Http\Requests\Storeinforme_dependenciasRequest  $request
     */
    public function store(Storeinforme_dependenciasRequest $request) {

        $informeDependencia = new Informe_dependencias();
        $informeDependencia->tipo_dependencia_id = $request->tipo_dependencia_id;
        $informeDependencia->expediente_id = $request->expediente_id;
        $informeDependencia->pdf_informe = $request->pdf_informe;
        $informeDependencia->fecha_informe = $request->fecha_informe;
        $informeDependencia->observaciones = $request->observaciones;

        if($informeDependencia->save()){
            $log = new LogsInformeDependenciaController();
            $log->store($informeDependencia, 'c');
            return redirect()->route('informesDependencias');
        }

        return back()->with('fail','No se pudo crear el usuario');
    }

    /**
     * Método que me muestra un solo informe de dependencia
     *
     * @param  int $id
     */
    public function show($id) {
        $informeDependencia = Informe_dependencias::find($id);
        $expedientes = Expediente::all();
        $tiposDependencias = Tipo_dependencia::all();
        return view('informeDependencia.mostrar', ['informeDependencia'=> $informeDependencia,'expedientes'=>$expedientes, 'tiposDependencias'=>$tiposDependencias]);
    }

    /**
     * Método que me edita un informe de dependencia
     * @param  \App\Http\Requests\Updateinforme_dependenciasRequest  $request
     */
    public function update(Updateinforme_dependenciasRequest $request) {

        $informeDependencia = Informe_dependencias::find($request->id);

        $informeDependencia->tipo_dependencia_id = $request->tipo_dependencia_id;
        $informeDependencia->expediente_id = $request->expediente_id;
        $informeDependencia->pdf_informe = $request->pdf_informe;
        $informeDependencia->fecha_informe = $request->fecha_informe;
        $informeDependencia->observaciones = $request->observaciones;

        if($informeDependencia->save()){
            $log = new LogsInformeDependenciaController();
            $log->store($informeDependencia, 'u');
            return redirect()->route('informesDependencias');
        }

        return back()->with('fail','No se pudo actualizar el informe de dependencia');
    }

    /**
     * Método que elimina un estado de dependencia determinado
     * @param  int $id
     */
    public function destroy($id) {
        $informeDependencia = Informe_dependencias::find($id);

        if($informeDependencia->delete()){
            $log = new LogsInformeDependenciaController();
            $log->store($informeDependencia, 'd');
            return redirect()->route('informesDependencias');
        }

        return back()->with('fail','No se pudo eliminar el informe de dependencia');
    }
}
