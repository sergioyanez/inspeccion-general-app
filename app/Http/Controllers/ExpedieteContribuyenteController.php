<?php

namespace App\Http\Controllers;

use App\Models\expediente_contribuyente;
use App\Http\Controllers\Controller;
use App\Http\Requests\Storeexpediete_contribuyenteRequest;
use App\Http\Requests\Updateexpediete_contribuyenteRequest;

class ExpedieteContribuyenteController extends Controller
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
        return "create expediente contribuyente";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storeexpediete_contribuyenteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storeexpediete_contribuyenteRequest $request)
    {
        return "store expediente contribuyente";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\expediete_contribuyente  $expediete_contribuyente
     * @return \Illuminate\Http\Response
     */
    public function show(expediente_contribuyente $expediete_contribuyente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\expediete_contribuyente  $expediete_contribuyente
     * @return \Illuminate\Http\Response
     */
    public function edit(expediente_contribuyente $expediete_contribuyente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateexpediete_contribuyenteRequest  $request
     * @param  \App\Models\expediete_contribuyente  $expediete_contribuyente
     * @return \Illuminate\Http\Response
     */
    public function update(Updateexpediete_contribuyenteRequest $request, expediente_contribuyente $expediete_contribuyente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\expediete_contribuyente  $expediete_contribuyente
     * @return \Illuminate\Http\Response
     */
    public function destroy(expediente_contribuyente $expediete_contribuyente)
    {
        //
    }
}