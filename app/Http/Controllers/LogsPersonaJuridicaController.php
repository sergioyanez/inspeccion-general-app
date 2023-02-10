<?php

namespace App\Http\Controllers;

use App\Models\logs_persona_juridica;
use App\Http\Controllers\Controller;
use App\Http\Requests\Storelogs_persona_juridicaRequest;
use App\Http\Requests\Updatelogs_persona_juridicaRequest;

class LogsPersonaJuridicaController extends Controller {

    /**
     * Crea en la tabla logs las consultas realizadas 
     * sobre la tabla PersonaJuridica
     *
     * @return \Illuminate\Http\Response
     */
    public function store($persona_juridica, $char) {
        
        $logs_persona_juridica = new logs_persona_juridica();

        $user = auth()->user();

        $logs_persona_juridica->persona_juridica_id = $persona_juridica->id;
        $logs_persona_juridica->cuit = $persona_juridica->cuit;
        $logs_persona_juridica->nombre_representante = $persona_juridica->nombre_representante;
        $logs_persona_juridica->apellido_representante = $persona_juridica->apellido_representante;
        $logs_persona_juridica->dni_representante = $persona_juridica->dni_representante;
        $logs_persona_juridica->telefono = $persona_juridica->telefono;
        $logs_persona_juridica->accion = $char;
        $logs_persona_juridica->usuario_id = $user->id; 
        $logs_persona_juridica->usuario_nombre = $user->usuario; 

        $logs_persona_juridica->save();
        

        return 'guardado';
    }

}