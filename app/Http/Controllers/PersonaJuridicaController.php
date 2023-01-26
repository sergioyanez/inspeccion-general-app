<?php

namespace App\Http\Controllers;

use App\Models\Persona_juridica;
use App\Http\Requests\StorePersona_juridicaRequest;
use App\Http\Requests\UpdatePersona_juridicaRequest;

class PersonaJuridicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "index persona juridica";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return "create persona juridica";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePersona_juridicaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePersona_juridicaRequest $request)
    {
        return "store persona juridica";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Persona_juridica  $persona_juridica
     * @return \Illuminate\Http\Response
     */
    public function show(Persona_juridica $persona_juridica)
    {
        return "show persona juridica";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Persona_juridica  $persona_juridica
     * @return \Illuminate\Http\Response
     */
    public function edit(Persona_juridica $persona_juridica)
    {
        return "edit persona juridica";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePersona_juridicaRequest  $request
     * @param  \App\Models\Persona_juridica  $persona_juridica
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePersona_juridicaRequest $request, Persona_juridica $persona_juridica)
    {
        return "update persona juridica";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Persona_juridica  $persona_juridica
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persona_juridica $persona_juridica)
    {
        return "destroy persona juridica";
    }
}
