<?php

namespace App\Http\Controllers;

use App\Models\Catastro;
use App\Http\Requests\StoreCatastroRequest;
use App\Http\Requests\UpdateCatastroRequest;

class CatastroController extends Controller
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
        return "create catastro";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCatastroRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCatastroRequest $request)
    {
        return "store catastro";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Catastro  $catastro
     * @return \Illuminate\Http\Response
     */
    public function show(Catastro $catastro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Catastro  $catastro
     * @return \Illuminate\Http\Response
     */
    public function edit(Catastro $catastro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCatastroRequest  $request
     * @param  \App\Models\Catastro  $catastro
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCatastroRequest $request, Catastro $catastro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Catastro  $catastro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Catastro $catastro)
    {
        //
    }
}
