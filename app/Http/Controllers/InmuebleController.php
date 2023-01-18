<?php

namespace App\Http\Controllers;

use App\Models\Inmueble;
use App\Http\Requests\StoreInmuebleRequest;
use App\Http\Requests\UpdateInmuebleRequest;

class InmuebleController extends Controller
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
     * @param  \App\Http\Requests\StoreInmuebleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInmuebleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inmueble  $inmueble
     * @return \Illuminate\Http\Response
     */
    public function show(Inmueble $inmueble)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inmueble  $inmueble
     * @return \Illuminate\Http\Response
     */
    public function edit(Inmueble $inmueble)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInmuebleRequest  $request
     * @param  \App\Models\Inmueble  $inmueble
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInmuebleRequest $request, Inmueble $inmueble)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inmueble  $inmueble
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inmueble $inmueble)
    {
        //
    }
}
