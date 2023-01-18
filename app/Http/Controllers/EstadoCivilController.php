<?php

namespace App\Http\Controllers;

use App\Models\Estado_civil;
use App\Http\Requests\StoreEstado_civilRequest;
use App\Http\Requests\UpdateEstado_civilRequest;

class EstadoCivilController extends Controller
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
     * @param  \App\Http\Requests\StoreEstado_civilRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEstado_civilRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estado_civil  $estado_civil
     * @return \Illuminate\Http\Response
     */
    public function show(Estado_civil $estado_civil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estado_civil  $estado_civil
     * @return \Illuminate\Http\Response
     */
    public function edit(Estado_civil $estado_civil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEstado_civilRequest  $request
     * @param  \App\Models\Estado_civil  $estado_civil
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEstado_civilRequest $request, Estado_civil $estado_civil)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estado_civil  $estado_civil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estado_civil $estado_civil)
    {
        //
    }
}
