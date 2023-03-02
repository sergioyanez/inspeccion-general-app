<?php

namespace App\Http\Controllers;

use App\Models\ExpedientePersonaJuridica;
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
        $expedientePersonaJuridica = new ExpedientePersonaJuridica();
        $expedientePersonaJuridica->persona_juridica_id = $request->persona_juridica_id;
        $expedientePersonaJuridica->expediente_id = $request->idExpSiguiente;

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
    public function show(ExpedientePersonaJuridica $expediente_persona_juridica)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\expediente_persona_juridica  $expediente_persona_juridica
     * @return \Illuminate\Http\Response
     */
    public function edit(ExpedientePersonaJuridica $expediente_persona_juridica)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateexpediente_persona_juridicaRequest  $request
     */
    public function update(Updateexpediente_persona_juridicaRequest $request)
    {
        $expedientePersonaJuridica = new ExpedientePersonaJuridica();
        $expedientePersonaJuridica->expediente_id = $request->expediente_id;
        $expedientePersonaJuridica->contribuyente_id = $request->persona_juridica_id;

        if($expedientePersonaJuridica->save()){
            return redirect()->route('expedientesPersonasJuridicas');
        }
        return back()->with('fail','No se pudo actualizar el expedientePersonaJuridica');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     */
    public function destroy($id)
    {
        $expedientePersonaJuridica = ExpedientePersonaJuridica::find($id);
        if($expedientePersonaJuridica->delete()){
            return redirect()->route('expedientes-crear');
        }
        return back()->with('fail','No se pudo crear el detalle de habilitación');
    }
}
