<?php

namespace App\Http\Controllers;

use App\Models\Tipo_dni;
use App\Http\Requests\StoreTipo_dniRequest;
use App\Http\Requests\UpdateTipo_dniRequest;

class TipoDniController extends Controller
{

    /**
     * Crea un nuevo tipo DNI
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Tipo_dni $tipo_dni){

        $tipo_dni.save();
    }

    /**
     * Muestra los tipos de DNI
     *
     * @param  \App\Models\Tipo_dni  $tipo_dni
     * @return \Illuminate\Http\Response
     */
    public function show(){

        $tipo_dni = Tipo_dni::all();
        return $tipo_dni; // Si lo mostramos en vista, hay que pasarle el array (['tipos'=>$tipo_dni])
    }

    /**
     * Eición de un tipo de DNI
     *
     * @param  \App\Http\Requests\UpdateTipo_dniRequest  $request
     * @param  \App\Models\Tipo_dni  $tipo_dni
     * @return \Illuminate\Http\Response
     */
    public function update(Tipo_dni $tipo_dni){

       $tipo_dni.save();
    }

    /**
     * Elimina un tipo de DNI
     *
     * @param  \App\Models\Tipo_dni  $tipo_dni
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipo_dni $tipo_dni){

        $tipo_dni->delete();
    }
}
