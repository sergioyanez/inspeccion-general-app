<?php

namespace App\Http\Controllers;

use App\Models\logs_tipo_estados;
use App\Http\Controllers\Controller;
use App\Http\Requests\Storelogs_tipo_estadosRequest;
use App\Http\Requests\Updatelogs_tipo_estadosRequest;

class LogsTipoEstadosController extends Controller
{
    /**
     * Crea un nuevo registro de log Tipo_estado
     *@param tipo_estado
     *@param char
     */
    public function store($tipo_estado, $char) {

        $logs_tipo_estado = new logs_tipo_estados();
        $user = auth()->user();

        $logs_tipo_estado->tipo_estado_id = $tipo_estado->id;
        $logs_tipo_estado->descripcion = $tipo_estado->descripcion;
        $logs_tipo_estado->accion = $char;
        //$logs_tipo_estado->usuario_id = $user->id;
        //$logs_tipo_estado->usuario_nombre = $user->usuario;

        $logs_tipo_estado->save();

        //return 'log estado guardado';
    }
}
