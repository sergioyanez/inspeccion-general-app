<?php

namespace App\Http\Controllers;

use App\Models\logs_usuario;
use App\Http\Controllers\Controller;
use App\Http\Requests\Storelogs_usuarioRequest;
use App\Http\Requests\Updatelogs_usuarioRequest;

class LogsUsuarioController extends Controller
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
     * @param  \App\Http\Requests\Storelogs_usuarioRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storelogs_usuarioRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\logs_usuario  $logs_usuario
     * @return \Illuminate\Http\Response
     */
    public function show(logs_usuario $logs_usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\logs_usuario  $logs_usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(logs_usuario $logs_usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatelogs_usuarioRequest  $request
     * @param  \App\Models\logs_usuario  $logs_usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Updatelogs_usuarioRequest $request, logs_usuario $logs_usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\logs_usuario  $logs_usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(logs_usuario $logs_usuario)
    {
        //
    }
}
