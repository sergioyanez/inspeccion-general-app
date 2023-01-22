<?php

namespace App\Http\Controllers;

use App\Models\informe_dependencias;
use App\Http\Controllers\Controller;
use App\Http\Requests\Storeinforme_dependenciasRequest;
use App\Http\Requests\Updateinforme_dependenciasRequest;

class InformeDependenciasController extends Controller
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
     * @param  \App\Http\Requests\Storeinforme_dependenciasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storeinforme_dependenciasRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\informe_dependencias  $informe_dependencias
     * @return \Illuminate\Http\Response
     */
    public function show(informe_dependencias $informe_dependencias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\informe_dependencias  $informe_dependencias
     * @return \Illuminate\Http\Response
     */
    public function edit(informe_dependencias $informe_dependencias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateinforme_dependenciasRequest  $request
     * @param  \App\Models\informe_dependencias  $informe_dependencias
     * @return \Illuminate\Http\Response
     */
    public function update(Updateinforme_dependenciasRequest $request, informe_dependencias $informe_dependencias)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\informe_dependencias  $informe_dependencias
     * @return \Illuminate\Http\Response
     */
    public function destroy(informe_dependencias $informe_dependencias)
    {
        //
    }
}
