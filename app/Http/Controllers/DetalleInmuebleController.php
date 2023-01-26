<?php

namespace App\Http\Controllers;

use App\Models\Detalle_inmueble;
use App\Http\Requests\StoreDetalle_inmuebleRequest;
use App\Http\Requests\UpdateDetalle_inmuebleRequest;

class DetalleInmuebleController extends Controller
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
        return "create detalle inmueble";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDetalle_inmuebleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDetalle_inmuebleRequest $request)
    {
        return "show detalle inmueble";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Detalle_inmueble  $detalle_inmueble
     * @return \Illuminate\Http\Response
     */
    public function show(Detalle_inmueble $detalle_inmueble)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Detalle_inmueble  $detalle_inmueble
     * @return \Illuminate\Http\Response
     */
    public function edit(Detalle_inmueble $detalle_inmueble)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDetalle_inmuebleRequest  $request
     * @param  \App\Models\Detalle_inmueble  $detalle_inmueble
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDetalle_inmuebleRequest $request, Detalle_inmueble $detalle_inmueble)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Detalle_inmueble  $detalle_inmueble
     * @return \Illuminate\Http\Response
     */
    public function destroy(Detalle_inmueble $detalle_inmueble)
    {
        //
    }
}
