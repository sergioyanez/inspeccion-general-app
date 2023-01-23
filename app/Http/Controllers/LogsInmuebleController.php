<?php

namespace App\Http\Controllers;

use App\Models\logs_inmueble;
use App\Http\Controllers\Controller;
use App\Http\Requests\Storelogs_inmuebleRequest;
use App\Http\Requests\Updatelogs_inmuebleRequest;

class LogsInmuebleController extends Controller
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
     * @param  \App\Http\Requests\Storelogs_inmuebleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storelogs_inmuebleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\logs_inmueble  $logs_inmueble
     * @return \Illuminate\Http\Response
     */
    public function show(logs_inmueble $logs_inmueble)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\logs_inmueble  $logs_inmueble
     * @return \Illuminate\Http\Response
     */
    public function edit(logs_inmueble $logs_inmueble)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatelogs_inmuebleRequest  $request
     * @param  \App\Models\logs_inmueble  $logs_inmueble
     * @return \Illuminate\Http\Response
     */
    public function update(Updatelogs_inmuebleRequest $request, logs_inmueble $logs_inmueble)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\logs_inmueble  $logs_inmueble
     * @return \Illuminate\Http\Response
     */
    public function destroy(logs_inmueble $logs_inmueble)
    {
        //
    }
}
