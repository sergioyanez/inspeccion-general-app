<?php

namespace App\Http\Controllers;

use App\Models\Tipo_inmueble;
use App\Http\Requests\StoreTipo_inmuebleRequest;
use App\Http\Requests\UpdateTipo_inmuebleRequest;

class TipoInmuebleController extends Controller
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
     * @param  \App\Http\Requests\StoreTipo_inmuebleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTipo_inmuebleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tipo_inmueble  $tipo_inmueble
     * @return \Illuminate\Http\Response
     */
    public function show(Tipo_inmueble $tipo_inmueble)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tipo_inmueble  $tipo_inmueble
     * @return \Illuminate\Http\Response
     */
    public function edit(Tipo_inmueble $tipo_inmueble)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTipo_inmuebleRequest  $request
     * @param  \App\Models\Tipo_inmueble  $tipo_inmueble
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTipo_inmuebleRequest $request, Tipo_inmueble $tipo_inmueble)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tipo_inmueble  $tipo_inmueble
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipo_inmueble $tipo_inmueble)
    {
        //
    }
}
