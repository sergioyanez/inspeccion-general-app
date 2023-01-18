<?php

namespace App\Http\Controllers;

use App\Models\Tipo_habilitacion;
use App\Http\Requests\StoreTipo_habilitacionRequest;
use App\Http\Requests\UpdateTipo_habilitacionRequest;

class TipoHabilitacionController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTipo_habilitacionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTipo_habilitacionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tipo_habilitacion  $tipo_habilitacion
     * @return \Illuminate\Http\Response
     */
    public function show(Tipo_habilitacion $tipo_habilitacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tipo_habilitacion  $tipo_habilitacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Tipo_habilitacion $tipo_habilitacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTipo_habilitacionRequest  $request
     * @param  \App\Models\Tipo_habilitacion  $tipo_habilitacion
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTipo_habilitacionRequest $request, Tipo_habilitacion $tipo_habilitacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tipo_habilitacion  $tipo_habilitacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipo_habilitacion $tipo_habilitacion)
    {
        //
    }
}
