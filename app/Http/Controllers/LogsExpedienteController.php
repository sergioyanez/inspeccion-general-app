<?php

namespace App\Http\Controllers;

use App\Models\logs_expediente;
use App\Http\Controllers\Controller;
use App\Http\Requests\Storelogs_expedienteRequest;
use App\Http\Requests\Updatelogs_expedienteRequest;

class LogsExpedienteController extends Controller
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
     * @param  \App\Http\Requests\Storelogs_expedienteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storelogs_expedienteRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\logs_expediente  $logs_expediente
     * @return \Illuminate\Http\Response
     */
    public function show(logs_expediente $logs_expediente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\logs_expediente  $logs_expediente
     * @return \Illuminate\Http\Response
     */
    public function edit(logs_expediente $logs_expediente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatelogs_expedienteRequest  $request
     * @param  \App\Models\logs_expediente  $logs_expediente
     * @return \Illuminate\Http\Response
     */
    public function update(Updatelogs_expedienteRequest $request, logs_expediente $logs_expediente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\logs_expediente  $logs_expediente
     * @return \Illuminate\Http\Response
     */
    public function destroy(logs_expediente $logs_expediente)
    {
        //
    }
}
