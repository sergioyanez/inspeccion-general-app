<?php

namespace App\Http\Controllers;

use App\Models\Tipo_baja;
use App\Http\Requests\StoreTipo_bajaRequest;
use App\Http\Requests\UpdateTipo_bajaRequest;

class TipoBajaController extends Controller
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
     * @param  \App\Http\Requests\StoreTipo_bajaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTipo_bajaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tipo_baja  $tipo_baja
     * @return \Illuminate\Http\Response
     */
    public function show(Tipo_baja $tipo_baja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tipo_baja  $tipo_baja
     * @return \Illuminate\Http\Response
     */
    public function edit(Tipo_baja $tipo_baja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTipo_bajaRequest  $request
     * @param  \App\Models\Tipo_baja  $tipo_baja
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTipo_bajaRequest $request, Tipo_baja $tipo_baja)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tipo_baja  $tipo_baja
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipo_baja $tipo_baja)
    {
        //
    }
}
