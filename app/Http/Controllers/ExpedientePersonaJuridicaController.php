<?php

namespace App\Http\Controllers;

use App\Models\expediente_persona_juridica;
use App\Http\Controllers\Controller;
use App\Http\Requests\Storeexpediente_persona_juridicaRequest;
use App\Http\Requests\Updateexpediente_persona_juridicaRequest;
use Illuminate\Http\Request;

class ExpedientePersonaJuridicaController extends Controller
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
        return "create expediente persona juridica";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storeexpediente_persona_juridicaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $expedientePersonaJuridica = new expediente_persona_juridica();
        $expedientePersonaJuridica->persona_juridica_id = $request->pj_id;
        $expedientePersonaJuridica->expediente_id = 5;//$request->idExpSiguiente;

        if($expedientePersonaJuridica->save()) {
            return redirect()->route('expedientes-crear');
        }

        return back()->with('fail','No se pudo crear el expediente-persona juridica'); 
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\expediente_persona_juridica  $expediente_persona_juridica
     * @return \Illuminate\Http\Response
     */
    public function show(expediente_persona_juridica $expediente_persona_juridica)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\expediente_persona_juridica  $expediente_persona_juridica
     * @return \Illuminate\Http\Response
     */
    public function edit(expediente_persona_juridica $expediente_persona_juridica)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateexpediente_persona_juridicaRequest  $request
     * @param  \App\Models\expediente_persona_juridica  $expediente_persona_juridica
     * @return \Illuminate\Http\Response
     */
    public function update(Updateexpediente_persona_juridicaRequest $request, expediente_persona_juridica $expediente_persona_juridica)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\expediente_persona_juridica  $expediente_persona_juridica
     * @return \Illuminate\Http\Response
     */
    public function destroy(expediente_persona_juridica $expediente_persona_juridica)
    {
        //
    }
}
