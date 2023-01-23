<?php

namespace App\Http\Controllers;

use App\Models\logs_estado_civil;
use App\Http\Controllers\Controller;
use App\Http\Requests\Storelogs_estado_civilRequest;
use App\Http\Requests\Updatelogs_estado_civilRequest;

class LogsEstadoCivilController extends Controller
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
     * @param  \App\Http\Requests\Storelogs_estado_civilRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storelogs_estado_civilRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\logs_estado_civil  $logs_estado_civil
     * @return \Illuminate\Http\Response
     */
    public function show(logs_estado_civil $logs_estado_civil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\logs_estado_civil  $logs_estado_civil
     * @return \Illuminate\Http\Response
     */
    public function edit(logs_estado_civil $logs_estado_civil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatelogs_estado_civilRequest  $request
     * @param  \App\Models\logs_estado_civil  $logs_estado_civil
     * @return \Illuminate\Http\Response
     */
    public function update(Updatelogs_estado_civilRequest $request, logs_estado_civil $logs_estado_civil)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\logs_estado_civil  $logs_estado_civil
     * @return \Illuminate\Http\Response
     */
    public function destroy(logs_estado_civil $logs_estado_civil)
    {
        //
    }
}
