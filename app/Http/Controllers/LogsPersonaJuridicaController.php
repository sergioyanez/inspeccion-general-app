<?php

namespace App\Http\Controllers;

use App\Models\logs_persona_juridica;
use App\Http\Controllers\Controller;
use App\Http\Requests\Storelogs_persona_juridicaRequest;
use App\Http\Requests\Updatelogs_persona_juridicaRequest;

/**
 * Controller de LogsPersonaJuridica: brinda acceso al servicio de guardado del historial de cambios realizados en la tabla correspondiente.
 *
 * @author  Sebastián Esains: sebaesains77@gmail.com
 *          Alexis Galván: alexisleogalvan12@gmail.com
 *          Elva Kheler: mekdy.20@gmail.com
 *          Héctor Liceaga: lice2187@gmail.com
 *          Eugenio Miller: eugeniomiller93@gmail.com
 *          Sergio Yañez: sergiomyanez02@gmail.com
 * @see logs_persona_juridica
 * @version 1.0
 * @since 11/12/2022
 */
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
        //$logs_persona_juridica->usuario_id = $user->id; -> PORBAR CON USUARIO
        //$logs_persona_juridica->usuario_nombre = $user->usuario; -> IDEM ANTERIOR

        $logs_persona_juridica->save();


        return 'guardado';
    }

}
