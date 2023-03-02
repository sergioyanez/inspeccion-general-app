<?php

namespace App\Http\Controllers;

use App\Models\expediente;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreexpedienteRequest;
use App\Http\Requests\UpdateexpedienteRequest;

class ExpedienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "index expediente";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return "create expediente";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreexpedienteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreexpedienteRequest $request)
    {
        return "store expediente";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\expediente  $expediente
     * @return \Illuminate\Http\Response
     */
    public function show(expediente $expediente)
    {
        return "show expediente";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\expediente  $expediente
     * @return \Illuminate\Http\Response
     */
    public function edit(expediente $expediente)
    {
        return "edit expediente";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateexpedienteRequest  $request
     * @param  \App\Models\expediente  $expediente
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateexpedienteRequest $request, expediente $expediente)
    {
        return "update expediente";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\expediente  $expediente
     * @return \Illuminate\Http\Response
     */
    public function destroy(expediente $expediente)
    {
        return "destroy expediente";
    }
}
