<?php

namespace App\Http\Controllers;

use App\Models\ExpedienteContribuyente;
use App\Models\Expediente;
use App\Models\Contribuyente;
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
        $expedientesContribuyentes = ExpedienteContribuyente::all();
        return view('expedienteContribuyente.expedientesContribuyentes', ['expedientesContribuyentes'=>$expedientesContribuyentes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $expedientes = Expediente::all();
        $contribuyentes = Contribuyente::all();
        $exped = false;
        return view('expedienteContribuyente.crear',['expedientes'=>$expedientes, 'contribuyentes'=>$contribuyentes,'exped'=>$exped]);
    }

    public function createEnExpediente()
    {
        $expedientes = Expediente::all();
        $contribuyentes = Contribuyente::all();
        $exped = true;
        return view('expedienteContribuyente.crear',['expedientes'=>$expedientes, 'contribuyentes'=>$contribuyentes,'exped'=>$exped]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storeexpediente_contribuyenteRequest  $request
     */
    public function store($contribuyente_id, $expediente_id)
    {
        $expedienteContribuyente = new ExpedienteContribuyente();
        $expedienteContribuyente->expediente_id = $expediente_id;
        $expedienteContribuyente->contribuyente_id = $contribuyente_id;

        $expedienteContribuyente->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\expediente_contribuyente  $expediente_contribuyente
     */
    public function show($id)
    {
        $expedienteContribuyente = ExpedienteContribuyente::find($id);
        $expedientes = Expediente::all();
        $contribuyentes = Contribuyente::all();
        return view('expedienteContribuyente.mostrar', ['expedienteContribuyente'=>$expedienteContribuyente,'expedientes'=>$expedientes, 'contribuyentes'=>$contribuyentes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateexpediente_contribuyenteRequest  $request
     */
    public function update(Updateexpediente_contribuyenteRequest $request)
    {
        $expedienteContribuyente = new ExpedienteContribuyente();
        $expedienteContribuyente->expediente_id = $request->expediente_id;
        $expedienteContribuyente->contribuyente_id = $request->contribuyente_id;

        if($expedienteContribuyente->save()){
            return redirect()->route('expedientesContribuyentes');
        }
        return back()->with('fail','No se pudo crear el expedienteContribuyente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\expediente_contribuyente  $expediente_contribuyente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $expedienteContribuyente = ExpedienteContribuyente::find($id);
        if($expedienteContribuyente->delete()){

            return redirect()->route('expedientesContribuyentes');
        }
        return back()->with('fail','No se pudo crear el detalle de habilitación');
    }
}
