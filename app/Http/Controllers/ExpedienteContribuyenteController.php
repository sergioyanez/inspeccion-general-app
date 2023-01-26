<?php

namespace App\Http\Controllers;

use App\Models\expediente_contribuyente;
use App\Http\Controllers\Controller;
use App\Http\Requests\Storeexpediente_contribuyenteRequest;
use App\Http\Requests\Updateexpediente_contribuyenteRequest;

class ExpedienteContribuyenteController extends Controller
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
     * @param  \App\Http\Requests\Storeexpediente_contribuyenteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storeexpediente_contribuyenteRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\expediente_contribuyente  $expediente_contribuyente
     * @return \Illuminate\Http\Response
     */
    public function show(expediente_contribuyente $expediente_contribuyente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\expediente_contribuyente  $expediente_contribuyente
     * @return \Illuminate\Http\Response
     */
    public function edit(expediente_contribuyente $expediente_contribuyente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateexpediente_contribuyenteRequest  $request
     * @param  \App\Models\expediente_contribuyente  $expediente_contribuyente
     * @return \Illuminate\Http\Response
     */
    public function update(Updateexpediente_contribuyenteRequest $request, expediente_contribuyente $expediente_contribuyente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\expediente_contribuyente  $expediente_contribuyente
     * @return \Illuminate\Http\Response
     */
    public function destroy(expediente_contribuyente $expediente_contribuyente)
    {
        //
    }
}
