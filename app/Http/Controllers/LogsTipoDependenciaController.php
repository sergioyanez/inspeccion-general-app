<?php

namespace App\Http\Controllers;

use App\Models\logs_tipo_dependencia;
use App\Http\Controllers\Controller;
use App\Http\Requests\Storelogs_tipo_dependenciaRequest;
use App\Http\Requests\Updatelogs_tipo_dependenciaRequest;

/**
 * Controller de LogsTipoDependencia: brinda acceso al servicio de guardado del historial de cambios realizados en la tabla correspondiente.
 *
 * @author  Sebastián Esains: sebaesains77@gmail.com
 *          Alexis Galván: alexisleogalvan12@gmail.com
 *          Elva Kheler: mekdy.20@gmail.com
 *          Héctor Liceaga: lice2187@gmail.com
 *          Eugenio Miller: eugeniomiller93@gmail.com
 *          Sergio Yañez: sergiomyanez01@gmail.com
 * @see logs_tipo_dependencia
 * @version 1.0
 * @since 11/12/2022
 */
class LogsTipoDependenciaController extends Controller {


    /**
     * Crea en la tabla logs las consultas realizadas
     * sobre la tabla tipo_dependencias
     *
     * @return \Illuminate\Http\Response
     */
    public function store($tipo_dependencia, $char){

        $logs_tipo_dependencia = new logs_tipo_dependencia();
        $user = auth()->user();

        $logs_tipo_dependencia->tipo_dependencia_id = $tipo_dependencia->id;
        $logs_tipo_dependencia->nombre = $tipo_dependencia->nombre;
        $logs_tipo_dependencia->accion = $char;
        $logs_tipo_dependencia->usuario_id = $user->id;
        $logs_tipo_dependencia->usuario_nombre = $user->usuario;
        $logs_tipo_dependencia->save();
        return 'guardado';
    }

}
