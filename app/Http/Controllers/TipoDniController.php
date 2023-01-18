<?php

namespace App\Http\Controllers;

use App\Models\Tipo_dni;
use App\Http\Requests\StoreTipo_dniRequest;
use App\Http\Requests\UpdateTipo_dniRequest;

class TipoDniController extends Controller
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
     * @param  \App\Http\Requests\StoreTipo_dniRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTipo_dniRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tipo_dni  $tipo_dni
     * @return \Illuminate\Http\Response
     */
    public function show(Tipo_dni $tipo_dni)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tipo_dni  $tipo_dni
     * @return \Illuminate\Http\Response
     */
    public function edit(Tipo_dni $tipo_dni)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTipo_dniRequest  $request
     * @param  \App\Models\Tipo_dni  $tipo_dni
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTipo_dniRequest $request, Tipo_dni $tipo_dni)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tipo_dni  $tipo_dni
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipo_dni $tipo_dni)
    {
        //
    }
}
