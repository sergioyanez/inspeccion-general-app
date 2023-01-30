<?php

namespace App\Http\Controllers;

use App\Models\logs_tipo_estados;
use App\Http\Controllers\Controller;
use App\Http\Requests\Storelogs_tipo_estadosRequest;
use App\Http\Requests\Updatelogs_tipo_estadosRequest;

class LogsTipoEstadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($tipo_estado, $char) {

        $logs_tipo_estado = new logs_tipo_estados();
        //$user = auth()->user();

        $logs_tipo_estado->tipo_estado_id = $tipo_estado->id;
        $logs_tipo_estado->descripcion = $tipo_estado->descripcion;
        $logs_tipo_estado->accion = $char;
        //$logs_tipo_dni->fecha_creacion = date();  -> NO VA
        //$logs_tipo_dni->fecha_modificacion = date(); -> NO VA
        //$logs_tipo_dni->usuario_id = $user->id; -> PROBAR CON USUARIO
        //$logs_tipo_dni->usuario_nombre = $user->usuario; -> IDEM ANTERIOR

        $logs_tipo_estado->save();


        return 'log estado guardado';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storelogs_tipo_estadosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storelogs_tipo_estadosRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\logs_tipo_estados  $logs_tipo_estados
     * @return \Illuminate\Http\Response
     */
    public function show(logs_tipo_estados $logs_tipo_estados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\logs_tipo_estados  $logs_tipo_estados
     * @return \Illuminate\Http\Response
     */
    public function edit(logs_tipo_estados $logs_tipo_estados)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatelogs_tipo_estadosRequest  $request
     * @param  \App\Models\logs_tipo_estados  $logs_tipo_estados
     * @return \Illuminate\Http\Response
     */
    public function update(Updatelogs_tipo_estadosRequest $request, logs_tipo_estados $logs_tipo_estados)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\logs_tipo_estados  $logs_tipo_estados
     * @return \Illuminate\Http\Response
     */
    public function destroy(logs_tipo_estados $logs_tipo_estados)
    {
        //
    }
}
