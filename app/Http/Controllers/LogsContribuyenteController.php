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
    public function store($contribuyente, $char)
    {
        $logs_contribuyente = new logs_contribuyente();
        $user = auth()->user();

        $logs_contribuyente->contribuyente_id = $contribuyente->id;
        $logs_contribuyente->tipo_dni_id = $contribuyente->tipo_dni_id;
        $logs_contribuyente->estado_civil_id = $contribuyente->estado_civil_id;
        $logs_contribuyente->cuit = $contribuyente->cuit;
        $logs_contribuyente->ingresos_brutos = $contribuyente->ingresos_brutos;
        $logs_contribuyente->nombre = $contribuyente->nombre;
        $logs_contribuyente->apellido = $contribuyente->apellido;
        $logs_contribuyente->dni = $contribuyente->dni;
        $logs_contribuyente->fecha_nacimiento = $contribuyente->fecha_nacimiento;
        $logs_contribuyente->telefono = $contribuyente->telefono;
        $logs_contribuyente->nombre_conyuge = $contribuyente->nombre_conyuge;
        $logs_contribuyente->apellido_conyuge = $contribuyente->apellido_conyuge;
        $logs_contribuyente->dni_conyuge = $contribuyente->dni_conyuge;
        $logs_contribuyente->accion = $char;
        //$logs_contribuyente->usuario_id = $user->id; -> PORBAR CON USUARIO
        //$logs_tipo_dni->usuario_nombre = $user->usuario; -> IDEM ANTERIOR

        $logs_contribuyente->save();
        
        return 'guardado';
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
    public function update($contribuyente, $char)
    {
        $logs_contribuyente = new logs_contribuyente();
        $user = auth()->user();

        $logs_contribuyente->contribuyente_id = $contribuyente->id;
        $logs_contribuyente->tipo_dni_id = $contribuyente->tipo_dni_id;
        $logs_contribuyente->estado_civil_id = $contribuyente->estado_civil_id;
        $logs_contribuyente->cuit = $contribuyente->cuit;
        $logs_contribuyente->ingresos_brutos = $contribuyente->ingresos_brutos;
        $logs_contribuyente->nombre = $contribuyente->nombre;
        $logs_contribuyente->apellido = $contribuyente->apellido;
        $logs_contribuyente->dni = $contribuyente->dni;
        $logs_contribuyente->fecha_nacimiento = $contribuyente->fecha_nacimiento;
        $logs_contribuyente->telefono = $contribuyente->telefono;
        $logs_contribuyente->nombre_conyuge = $contribuyente->nombre_conyuge;
        $logs_contribuyente->apellido_conyuge = $contribuyente->apellido_conyuge;
        $logs_contribuyente->dni_conyuge = $contribuyente->dni_conyuge;
        $logs_contribuyente->accion = $char;
        //$logs_contribuyente->usuario_id = $user->id; -> PORBAR CON USUARIO
        //$logs_tipo_dni->usuario_nombre = $user->usuario; -> IDEM ANTERIOR

        $logs_contribuyente->save();
        
        return 'actualizado';
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
