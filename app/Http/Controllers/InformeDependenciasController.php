<?php

namespace App\Http\Controllers;

use App\Models\informe_dependencias;
use App\Http\Controllers\Controller;
use App\Http\Requests\Storeinforme_dependenciasRequest;
use App\Http\Requests\Updateinforme_dependenciasRequest;
use App\Http\Controllers\LogsInformeDependenciaController;
use Illuminate\Http\Response;

class InformeDependenciasController extends Controller {
    
    /**
     * Método que retorna todos los informes de dependencia
     * existentes en  la base de datos
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $informe_dependencias = informe_dependencia::all();
        return view('informeDependencia.informesDependencias', ['informesDependencias', $informe_dependencias]);
    }

    /**
     * Método que me lleva a un formulario para
     * agregar un nuevo informe de dependencia
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('informeDependencia.crear');
    }

    /**
     * Método que crea un nuevo informe de dependencia
     *
     * @param  \App\Http\Requests\Storeinforme_dependenciasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $informe_dependencias = new informe_dependencia();
        $informe_dependencias->tipo_dependencia = $request->tipo_dependencia;
        $informe_dependencias->expediente_id = $request->expediente_id;
        $informe_dependencias->pdf_informe = $request->pdf_informe;
        $informe_dependencias->fecha_informe = $request->fecha_informe;
        $informe_dependencias->observaciones = $request->observaciones;

        if($informe_dependencias.save()){
            $log = new LogsInformeDependenciaController();
            $log->create($informe_dependencias, 'c');
            return redirect()->route('informeDependencia');
        }

        return back()->with('fail','No se pudo crear el usuario');
    }

    /**
     * Método que me muestra un solo informe de dependencia
     *
     * @param  \App\Models\informe_dependencias  $informe_dependencias
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $informe_dependencias = informe_dependencia::find($id);
        return view('informeDependencia.mostrar', ['informeDependencia', $informe_dependencias]);
    }

    /**
     * Método que me edita un informe de dependencia
     *
     * @param  \App\Http\Requests\Updateinforme_dependenciasRequest  $request
     * @param  \App\Models\informe_dependencias  $informe_dependencias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {

        $informe_dependencias = informe_dependencia::find($request->id);

        $informe_dependencias->tipo_dependencia = $request->tipo_dependencia;
        $informe_dependencias->expediente_id = $request->expediente_id;
        $informe_dependencias->pdf_informe = $request->pdf_informe;
        $informe_dependencias->fecha_informe = $request->fecha_informe;
        $informe_dependencias->observaciones = $request->observaciones;

        if($informe_dependencias.save()){
            $log = new LogsInformeDependenciaController();
            $log->create($informe_dependencias, 'u');
            return redirect()->route('informeDependencia');
        }

        return back()->with('fail','No se pudo crear el usuario');
    }

    /**
     * Método que elimina un estado de dependencia determinado
     *
     * @param  \App\Models\informe_dependencias  $informe_dependencias
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $informe_dependencias = informe_dependencia::find($request->id);
        $log = new LogsInformeDependenciaController();

        if($informe_dependencias.delete()){
            $log = new LogsInformeDependenciaController();
            $log->create($informe_dependencias, 'd');
            return redirect()->route('informeDependencia');
        }

        return back()->with('fail','No se pudo crear el usuario');
    }
}
