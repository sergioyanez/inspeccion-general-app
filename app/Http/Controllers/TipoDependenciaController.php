<?php

namespace App\Http\Controllers;

use App\Models\Tipo_dependencia;
use App\Http\Requests\StoreTipo_dependenciaRequest;
use App\Http\Requests\UpdateTipo_dependenciaRequest;

class TipoDependenciaController extends Controller
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
     * @param  \App\Http\Requests\StoreTipo_dependenciaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTipo_dependenciaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tipo_dependencia  $tipo_dependencia
     * @return \Illuminate\Http\Response
     */
    public function show(Tipo_dependencia $tipo_dependencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tipo_dependencia  $tipo_dependencia
     * @return \Illuminate\Http\Response
     */
    public function edit(Tipo_dependencia $tipo_dependencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTipo_dependenciaRequest  $request
     * @param  \App\Models\Tipo_dependencia  $tipo_dependencia
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTipo_dependenciaRequest $request, Tipo_dependencia $tipo_dependencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tipo_dependencia  $tipo_dependencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipo_dependencia $tipo_dependencia)
    {
        //
    }
}
