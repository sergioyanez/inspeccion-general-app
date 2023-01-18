<?php

namespace App\Http\Controllers;

use App\Models\Tipo_permiso;
use App\Http\Requests\StoreTipo_permisoRequest;
use App\Http\Requests\UpdateTipo_permisoRequest;

class TipoPermisoController extends Controller
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
     * @param  \App\Http\Requests\StoreTipo_permisoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTipo_permisoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tipo_permiso  $tipo_permiso
     * @return \Illuminate\Http\Response
     */
    public function show(Tipo_permiso $tipo_permiso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tipo_permiso  $tipo_permiso
     * @return \Illuminate\Http\Response
     */
    public function edit(Tipo_permiso $tipo_permiso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTipo_permisoRequest  $request
     * @param  \App\Models\Tipo_permiso  $tipo_permiso
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTipo_permisoRequest $request, Tipo_permiso $tipo_permiso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tipo_permiso  $tipo_permiso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipo_permiso $tipo_permiso)
    {
        //
    }
}
