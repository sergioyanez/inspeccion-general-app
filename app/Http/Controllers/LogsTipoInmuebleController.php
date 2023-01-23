<?php

namespace App\Http\Controllers;

use App\Models\logs_tipo_inmueble;
use App\Http\Controllers\Controller;
use App\Http\Requests\Storelogs_tipo_inmuebleRequest;
use App\Http\Requests\Updatelogs_tipo_inmuebleRequest;

class LogsTipoInmuebleController extends Controller
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
     * @param  \App\Http\Requests\Storelogs_tipo_inmuebleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storelogs_tipo_inmuebleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\logs_tipo_inmueble  $logs_tipo_inmueble
     * @return \Illuminate\Http\Response
     */
    public function show(logs_tipo_inmueble $logs_tipo_inmueble)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\logs_tipo_inmueble  $logs_tipo_inmueble
     * @return \Illuminate\Http\Response
     */
    public function edit(logs_tipo_inmueble $logs_tipo_inmueble)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatelogs_tipo_inmuebleRequest  $request
     * @param  \App\Models\logs_tipo_inmueble  $logs_tipo_inmueble
     * @return \Illuminate\Http\Response
     */
    public function update(Updatelogs_tipo_inmuebleRequest $request, logs_tipo_inmueble $logs_tipo_inmueble)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\logs_tipo_inmueble  $logs_tipo_inmueble
     * @return \Illuminate\Http\Response
     */
    public function destroy(logs_tipo_inmueble $logs_tipo_inmueble)
    {
        //
    }
}
