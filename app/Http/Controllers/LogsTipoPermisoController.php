<?php

namespace App\Http\Controllers;

use App\Models\logs_tipo_permiso;
use App\Http\Controllers\Controller;
use App\Http\Requests\Storelogs_tipo_permisoRequest;
use App\Http\Requests\Updatelogs_tipo_permisoRequest;

class LogsTipoPermisoController extends Controller
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
     * @param  \App\Http\Requests\Storelogs_tipo_permisoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storelogs_tipo_permisoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\logs_tipo_permiso  $logs_tipo_permiso
     * @return \Illuminate\Http\Response
     */
    public function show(logs_tipo_permiso $logs_tipo_permiso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\logs_tipo_permiso  $logs_tipo_permiso
     * @return \Illuminate\Http\Response
     */
    public function edit(logs_tipo_permiso $logs_tipo_permiso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatelogs_tipo_permisoRequest  $request
     * @param  \App\Models\logs_tipo_permiso  $logs_tipo_permiso
     * @return \Illuminate\Http\Response
     */
    public function update(Updatelogs_tipo_permisoRequest $request, logs_tipo_permiso $logs_tipo_permiso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\logs_tipo_permiso  $logs_tipo_permiso
     * @return \Illuminate\Http\Response
     */
    public function destroy(logs_tipo_permiso $logs_tipo_permiso)
    {
        //
    }
}
