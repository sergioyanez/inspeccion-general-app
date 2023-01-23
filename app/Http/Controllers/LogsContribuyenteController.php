<?php

namespace App\Http\Controllers;

use App\Models\logs_contribuyente;
use App\Http\Controllers\Controller;
use App\Http\Requests\Storelogs_contribuyenteRequest;
use App\Http\Requests\Updatelogs_contribuyenteRequest;

class LogsContribuyenteController extends Controller
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
     * @param  \App\Http\Requests\Storelogs_contribuyenteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storelogs_contribuyenteRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\logs_contribuyente  $logs_contribuyente
     * @return \Illuminate\Http\Response
     */
    public function show(logs_contribuyente $logs_contribuyente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\logs_contribuyente  $logs_contribuyente
     * @return \Illuminate\Http\Response
     */
    public function edit(logs_contribuyente $logs_contribuyente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatelogs_contribuyenteRequest  $request
     * @param  \App\Models\logs_contribuyente  $logs_contribuyente
     * @return \Illuminate\Http\Response
     */
    public function update(Updatelogs_contribuyenteRequest $request, logs_contribuyente $logs_contribuyente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\logs_contribuyente  $logs_contribuyente
     * @return \Illuminate\Http\Response
     */
    public function destroy(logs_contribuyente $logs_contribuyente)
    {
        //
    }
}
