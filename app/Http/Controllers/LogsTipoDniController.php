<?php

namespace App\Http\Controllers;

use App\Models\logs_tipo_dni;
use App\Http\Controllers\Controller;
use App\Http\Requests\Storelogs_tipo_dniRequest;
use App\Http\Requests\Updatelogs_tipo_dniRequest;


class LogsTipoDniController extends Controller {

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
    public function create($tipo_dni, $char) {

        $logs_tipo_dni = new logs_tipo_dni();
        $user = auth()->user();

        $logs_tipo_dni->tipo_dni_id = $tipo_dni->id;
        $logs_tipo_dni->descripcion = $tipo_dni->descripcion;
        $logs_tipo_dni->accion = $char;
        //$logs_tipo_dni->usuario_id = $user->id;
        //$logs_tipo_dni->usuario_nombre = $user->usuario;

        $logs_tipo_dni->save();


        return 'guardado';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storelogs_tipo_dniRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storelogs_tipo_dniRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\logs_tipo_dni  $logs_tipo_dni
     * @return \Illuminate\Http\Response
     */
    public function show(logs_tipo_dni $logs_tipo_dni)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\logs_tipo_dni  $logs_tipo_dni
     * @return \Illuminate\Http\Response
     */
    public function edit(logs_tipo_dni $logs_tipo_dni)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatelogs_tipo_dniRequest  $request
     * @param  \App\Models\logs_tipo_dni  $logs_tipo_dni
     * @return \Illuminate\Http\Response
     */
    public function update(Updatelogs_tipo_dniRequest $request, logs_tipo_dni $logs_tipo_dni)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\logs_tipo_dni  $logs_tipo_dni
     * @return \Illuminate\Http\Response
     */
    public function destroy(logs_tipo_dni $logs_tipo_dni)
    {
        //
    }
}
