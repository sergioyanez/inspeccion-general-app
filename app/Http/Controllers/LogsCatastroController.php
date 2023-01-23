<?php

namespace App\Http\Controllers;

use App\Models\logs_catastro;
use App\Http\Controllers\Controller;
use App\Http\Requests\Storelogs_catastroRequest;
use App\Http\Requests\Updatelogs_catastroRequest;

class LogsCatastroController extends Controller
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
     * @param  \App\Http\Requests\Storelogs_catastroRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storelogs_catastroRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\logs_catastro  $logs_catastro
     * @return \Illuminate\Http\Response
     */
    public function show(logs_catastro $logs_catastro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\logs_catastro  $logs_catastro
     * @return \Illuminate\Http\Response
     */
    public function edit(logs_catastro $logs_catastro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatelogs_catastroRequest  $request
     * @param  \App\Models\logs_catastro  $logs_catastro
     * @return \Illuminate\Http\Response
     */
    public function update(Updatelogs_catastroRequest $request, logs_catastro $logs_catastro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\logs_catastro  $logs_catastro
     * @return \Illuminate\Http\Response
     */
    public function destroy(logs_catastro $logs_catastro)
    {
        //
    }
}
